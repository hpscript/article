@extends('layouts.default')

@section('title', $article->login_id)

@section('content')
<h1>
	<a href="{{ action('ArticlesController@edit', $article->id)}}" class="register">編集</a>
	<a href="/">登録情報</a>
</h1>
	<h3>{{ $article->name}}</h3>
		<p>{{$article->login_id}}</p>
		<p>{{$article->name}}</p>
		<p>{{$article->role}}</p>
		<p>{{$article->password}}</p>

<h2>Documents</h2>
<ul>
		@forelse ($article->documents as $document)
		<li>{{ $document->body }} <a href="#" class="del" data-id="{{ $document->id }}">[x]</a>
		<form method="post" action="{{ action('DocumentsController@destroy', [$article, $document]) }}" id="form_{{ $document->id }}">
      {{ csrf_field() }}
      {{ method_field('delete') }}
    </form></li>
		@empty
		<li>No document yet</li>
		@endforelse
</ul>
<form method="post" action="{{ action('DocumentsController@store', $article) }}">
		{{ csrf_field()}}
	<p>
		<input type="text" name="mobile" placeholder="iphone/android" value="{{ old('mobile') }}">
		@if($errors->has('mobile'))
		<span class="error">{{ $errors->first('mobile') }}</span>
		@endif
	</p>
	<p>
		<input type="text" name="published_at" placeholder="配信日" value="{{ old('published_at') }}">
		@if($errors->has('published_at'))
		<span class="error">{{ $errors->first('published_at') }}</span>
		@endif
	</p>
	<p>
		<input type="text" name="body" placeholder="原稿" value="{{ old('body') }}">
		@if($errors->has('body'))
		<span class="error">{{ $errors->first('body') }}</span>
		@endif
	</p>
	<p>
		<input type="submit" value="登録">
	</p>
	</form>
	<script src="/js/main.js"></script>
@endsection

