<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests\PostRequest;
use App\Models\Comment;

class ArticleController extends Controller
{
    public function index(){
      $articles = Article::all();//Articlesテーブルからデータを取り出している
      return view('article.index',['articles' => $articles]);
      //viewに$articlesを渡している
    }

    public function view($id){
      $articles = Article::findOrFail($id);
      return view('article.view',['articles' => $articles]);
    }

    public function create(){//createメソッドはview新規追加のフォームを表示しているだけ
      return view('article.create');
    }

    public function store(PostRequest $request){
      //storeメソッドはフォームから送られたデータを変数$requestで受け取る

      $article = new Article;
      $article->title = $request->title;
      $article->body = $request->body;
      $article->save();

      return view('article.store');
    }

    public function edit(Request $request, $id){

      $article = Article::find($id);

      return view('article.edit',['article' => $article]);
    }

    public function update(PostRequest $request){
      $article = Article::find($request->id);
      //createの時はnewしたが、今回は編集したデータを持ってくるためrequestされたものを使う
      $article->title = $request->title;//editで編集したデータを入れている
      $article->body = $request->body;
      $article->save();

      return view('article.update');
    }

    public function show(Request $request,$id){
      $article = Article::find($id);
      return view('article.show',['article' => $article]);
    }

    public function delete(Request $request){
      Article::destroy($request->id);
      return view('article.delete');
    }

}
