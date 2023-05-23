<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        $image= $request->file('image')->store('public/categories');

      $categories= Category::create([
            'name'=>$request->name,
            'image'=>$image,
            'description'=>$request->description,
        ]);
        return to_route('admin.category.index',compact('categories'))->with('success','Category Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category= Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
        ]);

        $category = Category::findorFail($id);
        $image = $category->image;
        if($request->hasFile('image')){
            Storage::delete($category->image);
            $image=$request->file('image')->store('public/categories');
        }
        $category->update([
            'name'=>$request->name,
            'image'=>$image,
            'description'=>$request->description
        ]);
        return to_route('admin.category.index')->with('success','Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category =Category::find($id);
        Storage::delete($category->image);
        $category->menus()->detach();
        $category->delete();
        return to_route('admin.category.index')->with('danger','Category Deleted Successfully');
    }

}