<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Memo;

class MemoController extends Controller
{
    // 以下を追記
    public function add()
    {
        return view('memo.create');
    }
    public function create(Request $request)
    {   // Validationを行う
        $this->validate($request,Memo::$rules);

        $memo = new Memo;
        $form = $request->all();

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        
        // データベースに保存する
        $memo->fill($form);
        $memo->save();
        
        // リダイレクトする
        return redirect('memo/create');
    }
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = Memo::where('title', $cond_title)->get();
        } else {
            // それ以外はすべてのニュースを取得する
            $posts = Memo::all();
        }
        return view('memo.create', ['posts' => $posts]);
    }
    public function edit(Request $request)
    {
        // Memo Modelからデータを取得する
        $memo = Memo::find($request->id);
        if (empty($memo)) {
            abort(404);
        }
        return view('memo.edit', ['memo_form' => $memo]);
    }

    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Memo::$rules);
        // News Modelからデータを取得する
        $memo = Memo::find($request->id);
        // 送信されてきたフォームデータを格納する
        $memo_form = $request->all();
        unset($memo_form['_token']);

        // 該当するデータを上書きして保存する
        $memo->fill($memo_form)->save();

        return redirect('memo/create');
    }
    
    public function delete(Request $request)
    {
        // 該当するmemo Modelを取得
        $memo = Memo::find($request->id);

        // 削除する
        $memo->delete();

        return redirect('memo/create');
    }
}