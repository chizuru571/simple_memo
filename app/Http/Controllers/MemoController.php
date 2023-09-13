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