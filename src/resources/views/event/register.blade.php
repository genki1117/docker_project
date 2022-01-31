@extends('layout.app')

@section('content')
<p>もくもく会登録画面</p>
<div class="container">
    <form action="" method="">
        @scrf
            {{-- タイトルフォーム --}}
            <div class="form-group">
                <label for="title">{{ 'タイトル' }}<spna class="badge badge-danger ml-2">{{ '必須' }}</span></label>
                <input type="text" class="form-control" name="title" id="title">
            </div>
            {{-- カテゴリープルダウン --}}
            <div class="form-group w-50">
                <label for="category_id">{{ 'カテゴリー' }}<span class="badge badge-danger ml-2">{{ '必須' }}</span></label>
                <select name="category_id" id="category_id" class="form-control">
                    <option value="1">Laravel</option>
                    <option value="2">Java</option>
                </select>
            </div>
            {{-- 開催日をカレンダーで選択 --}}
            <div class="form-group w-25">
                <label for="date">{{ '開催日' }}<span class="badge badge-danger ml-2">{{ '必須' }}</span></label>
                <input type="date" class="form-control" name="date" id="date">
            </div>
            {{--- もくもく会開催時間 --}}
            <div class="form-control w-50">
                <div class="row">
                    {{ '開始時間' }}
                    <div class="col">
                        <label for="start_time">{{ '開始時間' }}<span class="badge badege-danger ml-2">{{ '必須' }}</span></label>
                        <input type="time" class="form-control" name="start_time" id="start_time">
                    </div>
                    {{ '終了時間' }}
                    <div class="col">
                        <label for="end_time">{{ '終了時間' }}<span class="badge badge-danger ml-2">{{ '必須' }}</span></label>
                        <input type="time" class="dorm-control" name="end_time" id="end_time">
                    </div>
                </div>
            </div>
            {{ '参加費フォーム' }}
            <div class="form-group w-25">
                <label for="entry-fee">{{ '参加費' }}<span class="badge badge-danger ml-2">{{ '必須' }}</span></label>
                <input type="text" class="form-control" name="z" id="entry-fee">
            </div>
    </form>
</div>
@endsection