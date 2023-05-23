<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MenuStoreRequest;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menus.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.menus.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuStoreRequest $request)
    {
      $image = $request->file('image')->store('public/menus');
      $menus=Menu::create([
        'name'=>$request->name,
        'description'=>$request->description,
        'price'=>$request->price,
        'image'=>$image,
      ]);
       if($request->has('categories')){
        $menus->categories()->sync($request->categories);
       }

      return to_route('admin.menus.index',compact('menus'))->with('success','Item Added Successfully');
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
    public function edit(string $id)
    {
        $categories = Category::all();
        $menus = Menu::findorFail($id);
        return view('admin.menus.edit',compact('menus','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'image'=>'required',
            'description'=>'required',

        ]);
        $menus = Menu::findorFail($id);
        $image = $menus->image;
        if($request->hasFile('image')){
            Storage::delete($menus->image);
            $image=$request->file('image')->store('public/categories');
        }
        $menus->update([
            'name'=>$request->name,
            'image'=>$image,
            'price'=>$request->price,
            'description'=>$request->description,
            'categories'=>$request->categories
        ]);
        if($request->has('categories')){
            $menus->categories()->sync($request->categories);
           }

        return to_route('admin.menus.index')->with('success','Item Updated Successfully');

}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $menus = Menu::find($id);
        // Storage::delete($menus->image);
        // $menus->delete();
        // return to_route('admin.menus.index');
        Storage::delete($menus->image);
        $menus->categories()->detach();
        $menus->delete();
        return to_route('admin.menus.index')->with('danger','Item Deleted Successfully');
    }
}