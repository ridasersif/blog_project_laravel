<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Category;
use Illuminate\Http\Request;



class ArticleController extends Controller
{
     
    public function index()
    {
        $articles=Article::paginate(4);
      
        return view('article.index',compact('articles'));
    }
    public function create()
    {
        $article=new Article;
        $categories= Category::all();
        $isUpdate=false;
        return view('article.form',compact('article','isUpdate','categories'));
    }

    public function store(ArticleRequest $request)
    {
        $formFieds=$request->validated();
        if($request->hasFile('image')){
            $formFieds['image']=$request->file('image')->store('article','public');
        }
      
        Article::create($formFieds);
        return to_route('articles.index')->with('success','article created successfully');
    }

    public function toggleStatus($id){
    $article = Article::findOrFail($id);
    $article->status = !$article->status; 
    $article->save();
    return response()->json([
        'status' => 'success',
        'newStatus' => $article->status
    ]);
 }


    public function show(Article $article)
    {
        
    }
    public function edit(Article $article)
    {
        $isUpdate=true;
        $categories= Category::all();
        return view('article.form',compact('article','isUpdate','categories'));
    }
    public function update(ArticleRequest $request, Article $article)
    {
        $formFields=$request->validated();
        $article->fill($formFields)->save();
        return to_route('articles.index')->with('success','article updated successfully');
    }
    public function destroy(Article $article)
    {
        $article->delete();
        return to_route('articles.index')->with('success','article deleted successfully');
       
    }
}
