@extends('layouts.memo')
@section('title', 'メモの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>メモ編集</h2>
                <form action="{{ route('memo.edit') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="body">メモの編集</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="memo" rows="1">{{ $memo_form->memo }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $memo_form->id }}">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="編集">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection