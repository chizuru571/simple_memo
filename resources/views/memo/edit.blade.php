@extends('layouts.memo')
@section('title', 'メモの編集')

@section('content')
    <div class="container">
            <div class="col-md-8 mx-auto" >
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="body">メモ内容</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="memo" rows="1">{{ $memo_form->memo }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <a href="{{ route('memo.create')}}">
                                 <input type="back" class="btn btn-success" value="戻る">
                            </a>
                            <input type="hidden" name="id" value="{{ $memo_form->id }}">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="修正">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection