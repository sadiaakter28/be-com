<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories=Category::orderBy('id','desc')->get();
        return view('backend.categories.index', compact('categories'));
    }
    public function create()
    {
        $main_categories = Category::orderBy('name','desc')->where('parent_id', NULL);
        return view ('backend.categories.create', compact('main_categories'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:150',
            'description' => 'required',
            'image' => 'nullable|image',
        ]);
        try {
            $file_name='';
            if($request->file('image')!=null)
            {
                $photo = $request->file('image');
                $file_name = uniqid('image', true) . time() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('uploads/brands'), $file_name);
            }
            $data = [
                'image'         => '/uploads/brands/' . $file_name,
                'name'          => $request->input('name'),
                'description'   => $request->input('description'),
                'parent_id'     => $request->input('parent_id'),
            ];
            Category::create($data);
            return redirect()->route('admin.categories');
        }
        catch (\Exception $e)
        {
            return redirect()->back();
        }
    }
    public function edit($id)
    {
        $main_categories = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();
        $category = Category::find($id);
        return view('backend.categories.edit', compact('category','main_categories'));
    }
}
