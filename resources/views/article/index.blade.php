@extends('layouts.default')
@section('content')

<h1>ブログ一覧</h1>
<p><a href="/create" class="btn btn-primary">新規追加</a></p>
@forelse ($articles as $article)
<div class="card mb-2">
  <div class="card-body">
    <a href="{{ url('/view',$article->id) }}" class="card-title">{{ $article->title }}</a>
    <h6 class="card-subtitle mb-2 text-muted">{{ $article->updated_at }}</h6>
    <p class="card-text">{{ $article->body }}</p>
    <a href="/edit/{{ $article->id }}" class="card-link">修正</a>
    <a href="/delete/{{ $article->id }}" class="card-link">削除</a>
  </div>
</div>
@empty
empty
@endforelse
@endsection
