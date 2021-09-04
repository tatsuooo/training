<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TraController extends Controller
{
    //
    public function cal()
 {

     return view('admin.tra.calender')->with(['title' =>'calender画面']);
 }

 public function kata()
{

  return view('admin.tra.katamenu')->with(['title' =>'肩トレ画面']);
}
public function mune()
{

 return view('admin.tra.munemenu')->with(['title' =>'胸トレ画面']);
}

public function hara()
{

 return view('admin.tra.haramenu')->with(['title' =>'腹筋画面']);
}
public function siri()
{

 return view('admin.tra.sirimenu')->with(['title' =>'尻トレ画面']);
}
public function ashi()
{

 return view('admin.tra.ashimenu')->with(['title' =>'足トレ画面']);
}




 // 以下を追記
 public function create(Request $request)
 {
     // admin/news/createにリダイレクトする
     return redirect('admin/news/create');
 }
}
