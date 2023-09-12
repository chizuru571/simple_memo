<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemoController extends Controller
{
    // 以下を追記
    public function add()
    {
        return view('memo.create');
    }
    public function create()
    {
        return redirect('memo/create');
    }

    public function edit()
    {
        return view('memo.edit');
    }

    public function update()
    {
        return redirect('memo/edit');
    }
}