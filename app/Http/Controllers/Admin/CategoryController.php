<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\CategoryRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::paginate(4);
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category=new Category;
        $isUpdate=false;
        return view('category.form',compact('category','isUpdate'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());
        return to_route('categories.index')->with('success','Ctegory created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $articles=$category->article()->get();
        return view('category.show',compact('category','articles'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $isUpdate=true;
        return view('category.form',compact('category','isUpdate'));
    }
    public function update(CategoryRequest $request, Category $category)
    {
        $formFields=$request->validated();
        $category->fill($formFields)->save();
        return to_route('categories.index')->with('success','category updated successfully');
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return to_route('categories.index')->with('success','category deleted successfully');
       
    }
}


