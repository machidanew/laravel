<html lang="ja">
  <head>
    <title>Laravelチュートリアル</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body class="p-3">
    <h1>記事一覧</h1>
<p><a href="/" class="btn btn-primary">ホームへ戻る</a></p>
    <div class="card mb-2">
      <div class="card-body">
        <h4 class="card-title">{{ $article->title }}</h4>
        <h6 class="card-subtitle mb-2 text-muted">{{ $article->updated_at }}</h6>
        <p class="card-text">{{ $article->body }}</p>
      </div>
    </div>
    <section>
      <h2>タグ</h2>
    <ul>
      @forelse ($article->tags as $tag)
      <li>{{ $tag->title }}</li>
      @empty
    　　空だよん
      @endforelse
    </ul>
  </section>
  
    <h2>コメント</h2>
    <ul>
      @forelse ($article->comments as $comment)

      <li>{{ $comment->body }}
      <form method="post" action="{{ action('CommentsController@destroy',[$article,
      $comment]) }}" id="form_{{ $comment->id }}">
      <button type="submit" class="del" data-id="{{ $comment->id }}">削除</button>

      {{ csrf_field() }}
      {{ method_field('delete') }}
    </form>
  </li>
      @empty
      empty
      @endforelse
    </ul>

    <form method="post" action="{{ action("CommentsController@store", $article)}}">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="titleInput">タイトル</label>
        <input type="text" class="form-control" id="titleInput" name="body" value="{{old('body')}}">
        @if($errors->has('body'))
        <p>{{ $errors->first('body') }}</p>
        @endif
      </div>
      <button type="submit" class="btn btn-primary">コメントする</button>
    </form>
    <script src="/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
