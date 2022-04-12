<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tra;

class TraController extends Controller
{
    //
    public function add()
 {
     return view('admin.tra.create');
 }
 public function create(Request $request)
 {
   // 以下を追記
     // Varidationを行う
     $this->validate($request, Tra::$rules);

     $tra = new Tra;
     $form = $request->all();

     // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
     if (isset($form['image'])) {
       $path = $request->file('image')->store('public/image');
       $tra->image_path = basename($path);
     } else {
         $tra->image_path = null;
     }

     // フォームから送信されてきた_tokenを削除する
     unset($form['_token']);
     // フォームから送信されてきたimageを削除する
     unset($form['image']);

     // データベースに保存する
     $tra->fill($form);
     $tra->save();

     // admin/news/createにリダイレクトする
     return redirect('admin/tra/create');
 }

 // 以下を追記

 public function index(Request $request)
 {
     $cond_title = $request->cond_title;
     if ($cond_title != '') {
         // 検索されたら検索結果を取得する
         $posts = Tra::where('menu', $cond_title)->get();
     } else {
         // それ以外はすべてのニュースを取得する
         $posts = Tra::all();
     }
     return view('admin.tra.index', ['posts' => $posts, 'cond_title' => $cond_title]);
 }


 public function edit(Request $request)
   {
       // News Modelからデータを取得する
       $tra = Tra::find($request->id);
       if (empty($tra)) {
         abort(404);
       }
       return view('admin.tra.edit', ['tra_form' => $tra]);
   }


   public function update(Request $request)
   {
       // Validationをかける
       $this->validate($request, Tra::$rules);
       // News Modelからデータを取得する
       $tra = Tra::find($request->id);
       // 送信されてきたフォームデータを格納する
       $tra_form = $request->all();
       if ($request->remove == 'true') {
        $tra_form['image_path'] = null;
    } elseif ($request->file('image')) {
        $path = $request->file('image')->store('public/image');
        $tra_form['image_path'] = basename($path);
    } else {
        $tra_form['image_path'] = $tra->image_path;
    }

    unset($tra_form['image']);
    unset($tra_form['remove']);
    unset($tra_form['_token']);


       // 該当するデータを上書きして保存する
       $tra->fill($tra_form)->save();

       return redirect('admin/tra');
   }


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


}
