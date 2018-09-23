<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests\ArticleRequest;

class ArticlesController extends Controller
{
    //
    public function index(){
    	$articles = Article::latest()->get();
    	return view('articles.index', ['articles'=> $articles]);
    }

    public function show($id){
    	$article = Article::findOrFail($id);
    	return view('articles.show')->with('article', $article);
    }

    public function create(){
    	return view('articles.create');
    }

    public function store(ArticleRequest $request){
    	$article = new Article();
    	$article->login_id = $request->login_id;
    	$article->role = $request->role;
    	$article->name = $request->name;
    	$article->password = $request->password;
    	$article->mail = $request->mail;
    	$article->test_mail = $request->test_mail;
    	$article->updated_person = $request->updated_person;
    	$article->save();
    	return redirect('/');
    }

	public function edit($id){
		$article = Article::findOrFail($id);
		return view('articles.edit')->with('article', $article);
	}

	public function update(ArticleRequest $request, Article $article){
    	$article->login_id = $request->login_id;
    	$article->role = $request->role;
    	$article->name = $request->name;
    	$article->password = $request->password;
    	$article->mail = $request->mail;
    	$article->test_mail = $request->test_mail;
    	$article->updated_person = $request->updated_person;
    	$article->save();
    	return redirect('/');
    }

    public function destroy(Article $article){
    	$article->delete();
    	return redirect('/');
    }
}
