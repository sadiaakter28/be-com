<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use File;
use Symfony\Component\Console\Input\Input;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('id','desc')->get();
        return view('backend.brand.index',compact('brands'));
    }

    public function create()
    {
        return view('backend.brand.create');
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
                'image' => '/uploads/brands/' . $file_name,
                'name' => $request->input('name'),
                'description' => $request->input('description'),
            ];
            Brand::create($data);
            return redirect()->route('admin.brands.index');
        }
        catch (\Exception $e)
        {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        if (!is_null($brand))
        {
            return view('backend.brand.edit', compact('brand'));
        }
        else
        {
            return redirect()->route('admin.brands.index');
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:150',
            'description' => 'required',
            'image' => 'nullable|image',
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
                $photo->move(public_path('uploads/brands'), $file_name);
                $data = [
                    'image' => '/uploads/brands/' . $file_name,
                    'name' => $request->input('name'),
                    'description' => $request->input('description'),
                ];
                Brand::where('id', $id)->update($data);
                return redirect()->route('admin.brands.index');
            }
            else {
                $data = [
                    'name' => $request->input('name'),
                    'description' => $request->input('description')
                ];
                Brand::where('id', $id)->update($data);
                return redirect()->route('admin.brands.index');
            }

        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $brand = Brand::find($id);
        if (!is_null($brand))
        {
            //Delete Brand image
            if (File::exists('/uploads/brands/' . $brand->image))
            {
                File::delete('/uploads/brands/' . $brand->image);
            }
            $brand->delete();
        }

        return back();
    }
}
