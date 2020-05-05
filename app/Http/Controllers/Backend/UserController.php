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
