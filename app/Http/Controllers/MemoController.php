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
}
/*

    public function edit()
    {
        return view('memo.edit');
    }

    public function update()
    {
        return redirect('memo/edit');
    }
*/