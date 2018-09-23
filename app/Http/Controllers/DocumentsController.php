<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Document;

class DocumentsController extends Controller
{
    //
    public function store(Request $request, Article $article){
    	$this->validate($request, [
    		'mobile' => 'required',
    		'published_at' => 'required',
    		'body' => 'required'
    	]);
    	$document = new Document(['mobile' => $request->mobile, 'published_at'=>$request->published_at, 'body'=>$request->body]);
    	$article->documents()->save($document);
    	return redirect()->action('ArticlesController@show', $article);
    }

    public function destroy(Article $article, Document $document){
    	$document->delete();
    	return redirect()->back();
    }
}
