{{-- layouts/memo.blade.phpを読み込む --}}
@extends('layouts.memo')
{{-- memo.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'メモ一覧・新規登録')

{{-- memo.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form action="{{ route('memo.create') }}" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-md-2">新規登録</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="memo" rows="1">{{ old('memo') }}</textarea>
                        </div>
                    @if (count($errors) > 0)
                            @foreach($errors->all() as $e)
                                {{ $e }}
                            @endforeach
                    @endif
                    </div>
                    @csrf
                    <input type="submit" class="btn btn-primary" value="登録">
                </form>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="list-memo col-md-10 mx-auto">
                <div class="row">
                    <table class="table table-light">
                        <thead>
                            <tr>
                                <th width="5%">No.</th>
                                <th width="19%">メモ内容</th>
                                <th width="19%">作成日時</th>
                                <th width="19%">更新日時</th>
                                <th width="19%">編集</th>
                                <th width="19%">削除</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $memo)
                                <tr>
                                    <th>{{ $memo->id }}</th>
                                    <td>{{ Str::limit($memo->memo, 100) }}</td>
                                    <td>{{ $memo->created_at->format('Y年m月d日') }}</td>
                                    <td>{{ $memo->updated_at->format('Y年m月d日') }}</td>
                                    <td><div>
                                            <a href="{{ route('memo.edit', ['id' => $memo->id]) }}">
                                                <input type="edit" class="btn btn-success" value="編集">
                                            </a>
                                        </div>
                                    </td>
                                    <td><div>
                                            <a href="{{ route('memo.delete', ['id' => $memo->id]) }}">
                                                <input type="delete" class="btn btn-danger" value="削除" onclick='return confirm("本当に削除してよろしいですか？")'>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
