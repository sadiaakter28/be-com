<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use File;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id','desc')->get();
        return view('backend.user.index',compact('users'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'      => 'required|max:64|regex:/^[a-zA-Z]+(([\',. -][a-zA-Z ])?[a-zA-Z]*)*$/',
            'email'     => 'required|unique:users,email|email',
            'password'  => 'required|min:5',
            'number'    => 'required|max:16|unique:users,number|regex:/^\+?(88)?0?1[3456789][0-9]{8}\b/',
            'image'     => 'nullable',
        ]);

        try {
            $file_name = '';
            if($request->file('image')!=null)
            {
//                $brandsImage = public_path("uploads/brands/{$data->image}"); // get previous image from folder
//                if (File::exists($brandsImage)) { // unlink or remove previous image from folder
//                    unlink($brandsImage);
//                }
                $photo = $request->file('image');
                $file_name = uniqid('image', true) . time() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('uploads/users'), $file_name);
                $data = [
                    'name'      => $request->input('name'),
                    'email'     => $request->input('email'),
                    'password'  => app('hash')->make($request->input('password')),
                    'number'    => $request->input('number'),
                    'image'     => '/uploads/users/' . $file_name,
                    'role'      => 'customer',
                ];
                User::where('id', $id)->update($data);
                return redirect()->route('admin.users');
            }
            else {
                $data = [
                    'name'      => $request->input('name'),
                    'email'     => $request->input('email'),
                    'password'  => app('hash')->make($request->input('password')),
                    'number'    => $request->input('number'),
                    'image'     => '/uploads/users/' . $file_name,
                    'role'      => 'customer',
                ];
                User::where('id', $id)->update($data);
                return redirect()->route('admin.users');
            }

        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $users = User::find($id);
        if (!is_null($users))
        {
            //Delete Brand image
            if (File::exists('/uploads/users/' . $users->image))
            {
                File::delete('/uploads/users/' . $users->image);
            }
            $users->delete();
        }

        return back();
    }
}
