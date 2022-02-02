@extends('layout.app')

@section('content')
<div class="container">
    <form action="{{ route('event.create') }}" method="post">
        @csrf
            {{-- タイトルフォーム --}}
            <div class="form-grou mt-1 mb-4">
                <label for="title">{{ 'タイトル' }}<span class="badge bg-danger ms-2 mb-1">{{ '必須' }}</span></label>
                <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }} mt-1" name="title" id="title" value="{{ old('title') }}">
                @if($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('title')}}
                    </span>
                @endif
            </div>
            {{-- カテゴリープルダウン --}}
            <div class="form-group w-50 mb-4">
                <label for="category_id">{{ 'カテゴリー' }}<span class="badge bg-danger ms-2 mb-1">{{ '必須' }}</span></label>
                <select name="category_id" id="category_id" class="form-control mt-1">
                    @foreach($categories as $category)
                    <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
            {{-- 開催日をカレンダーで選択 --}}
            <div class="form-group w-25 mb-4">
                <label for="date">{{ '開催日' }}<span class="badge bg-danger ms-2 mb-1">{{ '必須' }}</span></label>
                <input type="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }} mt-1" name="date" id="date">
                @if($errors->has('date'))
                <span class="invalid-feedback" role="alert">
                    {{ $errors->first('date') }}
                </span>
                @endif
            </div>
            {{-- もくもく会開催時間 --}}
            <div class="form-group w-50 mb-2">
                <div class="row">
                    {{-- 開始時間 --}}
                    <div class="col">
                        <label for="start_time">{{ '開始時間' }}<span class="badge bg-danger ms-2">{{ '必須' }}</span></label>
                        <input type="time" class="form-control{{ $errors->has('start_time') ? ' is-invalid' : '' }} mt-2 mb-2" name="start_time" id="start_time">
                        @if($errors->has('start_time'))
                            <span class="invalid-feedback" role="alert">
                                {{ $errors->first('start_time') }}
                            </span>
                        @endif
                    </div>
                    {{-- 終了時間 --}}
                    <div class="col">
                        <label for="end_time">{{ '終了時間' }}<span class="badge bg-danger ms-2">{{ '必須' }}</span></label>
                        <input type="time" class="form-control{{ $errors->has('end_time') ? ' is-invalid' : '' }} mt-2 mb-2" name="end_time" id="end_time">
                        @if($errors->has('end_time'))
                            <spna class="invalid-feedback" role="alert">
                                {{ $errors->first('end_time') }}
                            </spna>
                        @endif
                    </div>
                </div>
            </div>
            {{-- 参加費フォーム --}}
            <div class="form-group w-25">
                <label for="entry-fee">{{ '参加費' }}<span class="badge bg-danger ms-2 mb-1">{{ '必須' }}</span></label>
                <input type="text" class="form-control{{ $errors->has('entry_fee') ? ' is-invalid' : '' }}" name="entry_fee" id="entry-fee">
                @if($errors->has('entry_fee'))
                    <span class="invalid-feedback" role0="alert">
                        {{ $errors->first('entry_fee') }}
                    </span>
                @endif
            </div>
            {{-- もくもく会詳細 --}}
            <div class="form-group">
                <label for="content">{{ '詳細' }}<span class="badge bg-danger ms-2 mb-1 mt-3">{{ '必須' }}</span></label>
                <textarea class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" id="content" rows="10" placeholder="もくもく会の詳細を記載してください"></textarea>
                @if($errors->has('content'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('content') }}
                    </span>
                @endif
            </div>
            <button type="submit" class="btn btn-success w-100 mt-3 mb-3">
                {{ 'もくもく会を開催する' }}
            </button>
    </form>
</div>
@endsection