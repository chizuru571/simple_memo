@extends('layouts.memo')
@section('title', 'メモの編集')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-8 mx-auto" >
                <div class ="row">
                    <div class="col-12 d-flex justify-content-center">
                      <h2>No.{{ $memo_form->id }}メモ編集</h2>                        
                    </div>
                </div>
                <form action="{{ route('memo.edit') }}" method="post" enctype="multipart/form-data">
                    <div class="form-group row mt-3">
                        <div class="col-md-12">
                            <textarea class="form-control" name="memo" rows="1">{{ $memo_form->memo }}</textarea>
                </div>
                            @if (count($errors) > 0)
                            @foreach($errors->all() as $e)
                                {{ $e }}
                            @endforeach
                    @endif
                    <div class ="row">
                    <div class="col-12 d-flex justify-content-center">
                    <div class="row mt-3">
                        <div class="col-md-5">
                            <a href="{{ route('memo.create')}}">
                            <input type="submit" class="btn btn-success" value="戻る">
                            </a>
                        </div>
                        <div class="col-md-2">　</div>
                        <div class="col-md-5">
                            <input type="hidden" name="id" value="{{ $memo_form->id }}">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="修正">
                        </div>
                        </div>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection