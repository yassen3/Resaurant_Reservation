<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu;

class CategoryController extends Controller
{
    public function index()
   {
    $categories = Category::all();
    return view('categories.index',compact('categories'));
   }

   public function show(Category $category)
   {

    return view('categories.show',compact('category'));
   }
}