@extends('layouts.default')

@section('title', 'Blog Posts')

@section('content')
<h1>
	<a href="{{ url('/articles/create')}}" class="register">管理者登録</a>
	原稿管理システム
</h1>
	<h3>管理者一覧</h3>
	<ul>
		@foreach ($articles as $article)
		<li>{{$article->login_id}}  <a href="{{ action('ArticlesController@show', $article->id) }}">{{ $article->name}}</a><a href="{{ action('ArticlesController@edit', $article->id)}}" class="register">編集</a> 
		<a href="#" class="del" data-id="{{ $article->id }}">[x]</a>
		<form method="post" action="{{ url('/articles', $article->id) }}" id="form_{{ $article->id }}">
      {{ csrf_field() }}
      {{ method_field('delete') }}
    </form>
		</li>
		@endforeach
	</ul>
	<script src="/js/main.js"></script>
@endsection