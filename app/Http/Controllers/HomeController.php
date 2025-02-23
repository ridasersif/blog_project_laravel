<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $articles=Article::paginate(6);
        return view('home.index',compact('articles'));
    }
}
