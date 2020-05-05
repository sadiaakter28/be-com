<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('frontend.auth.registration');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:64|regex:/^[a-zA-Z]+(([\',. -][a-zA-Z ])?[a-zA-Z]*)*$/',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:5',
            'number' => 'required|max:16|unique:users,number|regex:/^\+?(88)?0?1[3456789][0-9]{8}\b/',
            'image' => 'nullable',
        ]);
        try {
            $file_name = '';
            if ($request->file('image') != null) {
                $photo = $request->file('image');
                $file_name = uniqid('image', true) . time() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('uploads/users'), $file_name);
            }
            $data = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => app('hash')->make($request->input('password')),
                'number' => $request->input('number'),
                'image' => '/uploads/users/' . $file_name,
                'role' => 'customer',
            ];
            $user = User::create($data);
            return redirect()->route('home', compact('user'));
        }
        catch (\Exception $e) {
            return redirect()->back();
        }
    }
}
