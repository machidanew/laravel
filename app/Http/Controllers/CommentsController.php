<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Comment;
class CommentsController extends Controller
{
    //
    public function store(Request $request, Article $article){
      //↑$articleにはurlから受け取ったidが格納される

      $this->validate($request,[
        'body' => 'required'
      ]);

      $comment = new Comment(['body' => $request->body]);
      //$request->bodyにコメントしたものが入っている。
      //$articleに、Articleの記事の内容とforeignkeyが、comments.article_idになっている。
      $article->comments()->save($comment);
      //comments()はArticleモデルのcomments()メソッド。そこでアソシエーションしている。
      return redirect('/view/'.$article->id);
  //  return redirect()->action('ArticlesController@view',$article->id);
    }

    public function destroy(Article $article, Comment $comment ){
      $comment->delete();
      return redirect()->back();
    }


  /*  public function destroy(Article $article, Comment $comment){
      $comment->delete();
      return redirect()->back();
    }*/
}
