<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Comment;
class CommentsController extends Controller
{
    //
    public function store(Request $request, Article $articles){
    //  var_dump($request);
      //exit;
      $this->validate($request,[
        'body' => 'required'
      ]);
      $comment = new Comment(['body' => $request->body]);
      $articles->comments()->save($comment);
      return redirect()->action('ArticlesController@show',$comment);
    }
}
