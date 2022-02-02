{{-- フラッシュメッセージ --}}
{{-- 成功した時 --}}
@if(session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif
{{-- 失敗した時 --}}
@if(session('error'))
    <div class="alert alert-danger text-center">
        {{ session('error')}}
    </div>
@endif

@extends('layout.app')

@section('content')
<style>
    #mokumoku-lists {
        filter:drop-shadow(2px 4px 6px #000);
    }
    .content-filed {
        width: 60%;
    }
</style>

{{-- もくもく会開催一覧リスト --}}
@foreach($events as $event)
<div class="card container text-center mb-5" id="mokumoku-lists">
    <div class="card-header font-weight-bold bg-white">
        <a href="">{{ $event->title }}</a>
    </div>
    <div class="card-body">
        <div class="category text-left d-flex">
            <label for="category-label"><span class="badge bg-primary p-2 mb-2">{{ $event->category->category_name }}</span></label>
        </div>
        <div class="entry-fee-wrapper d-flex">
            <label for="entry-fee"><span class="badge bg-success p-2">{{ '参加費' }}</span></label>
            <p class="text-danger font-weight-bold p-1 h5">{{ $event->entry_fee.'円' }}</p>
        </div>
        <div class="content-wrapper d-flex justify-content-between">
            <div class="content-filed">
                <p class="card-text text-start">
                    {{ mb_substr($event->content, 0, 100, 'UTF-8'), '...' }}
                    <!-- mb-substr(文字列指定, 開始位置, 終了位置, 文字のエンコード) -->
                    <!-- 100文字超えたら「...」 -->
                </p>
            </div>
            <div class="btn-filed ml-auto">
                <button class="btn btn-primary me-3">{{ '詳細' }}</button>
                <button class="btn btn-info me-3">{{ '編集' }}</button>
                <button class="btn btn-danger me-3">{{ '削除' }}</button>
            </div>
        </div>
    </div>
    @php
        //指定の日付を▲▲/■■に変換する
        $date = date("m/d", strtotime($event->date));
        //date関数の使い方
        //date(表示形式, strtotime(日付指定));


        //指定日の曜日を取得する
        $getWeek = date('w', strtotime($event->date));
        //date関数の使い方
        //date(表示形式, strtotime(日付指定))// 11/7なら0,11/8なら1,11/9なら2が返って来る

        //配列を使用し、要素順に（日:0〜土:6）を設定する
        $week = [
            '日',  //0
            '月',  //1
            '火',  //2
            '水',  //3
            '木',  //4
            '金',  //5
            '土'   //6
            ];
            //$week[0]なら日
            //$week[1]なら月


            //開始時間を15:00:00→15:00に変換。秒部分を切り捨て
            $start_time = substr($event->start_time, 0, -3);

            //終わり時間を15:00:00→15:00に変換。秒部分を切り捨て
            $end_time = substr($event->end_time, 0, -3);

            //substrの基本的な使い方
            //substrは文字列を切り取って返す関数
            //substr(文字列指定, 開始位置, 終了位置)
    @endphp
    <div class="card-footer text-left font-weight-bold bg-white">
        {{ '開催日時:'.  $event->date . '(' . $week[$getWeek] . ')'. ' ' . $start_time . ' - ' . $end_time }}
    </div>
</div>
@endforeach
@endsection