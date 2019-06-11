<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
  public function getSignin(){

    return view('user.signin');
  }

  public function postSignin(Request $request){
  /*  $this->validation($request,[
      'email' => 'email|required',
      'password' => 'required|min:4'
    ]);*/
    if(Auth::attempt([
      'email' => $request->input('email'),
      'password' => $request->input('password')])){
       return redirect()->route('user.profile');
    }
    return redirect()->back();
  }
    //

}
