<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EventRequest;

class EventController extends Controller
{
    public function __construct()
    {
        $this->event = new Event(); //Eventのデータを取得
        $this->category = new Category(); //Categoryのデータを取得
    }

    /**
     * イベント一覧取得
     */
    public function index()
    {
        //eventテーブルにあるデータをeventsモデルから全取得
        $events = $this->event->allEventsData();
        return view('event.index', compact('events'));
    }

    public function register()
    {
        //categoriesテーブルにあるデータをcategoriesモデルから全取得
        $categories = $this->category->allCategoriesData();
        return view('event.register', compact('categories'));
    }

    /**
     * もくもく会登録処理
     */
    public function create(EventRequest $request)
    {
        try{
            //トラザクション開始
            DB::beginTransaction();
            //リクエストデータをもとにeventsテーブルにinsert
            $insertEvent = $this->event->insertEventData($request);
            //処理に成功したらコミット
            DB::commit();
            //登録成功時にリダイレクト
            return redirect()->route('event.index')->with('success', 'もくもく会の登録に成功しました');
        }catch(\Throwable $e){
            //処理に失敗したらロールバック
            DB::rollback();
            //例外を投げる
            \Log::error($e);
            //登録失敗時にリダイレクト
            return redirect()->route('event.index')->with('error', 'もくもく会の登録に失敗しました');
        }
    }

    /**
     * 詳細画面
     */
    public function show($id)
    {
        // $id(event_id)をもとに、eventsテーブルの特定のレコードに絞り込む
        $event = $this->event->findEventByEventId($id);

        //指定の日付を▲▲/xxに変換する
        $date = date('m/d', strtotime($event->date));
        //指定の曜日を取得する
        $getWeek = date('w', strtotime($event->date));
        //配列を使用して、要素順に設定する
        $week = [
            '日', //0
            '月', //1
            '火', //2
            '水', //3
            '木', //4
            '金', //5
            '土', //6
        ];

        $start_time = substr($event->start_time, 0, -3);
        $end_time = substr($event->end_time, 0, -3);

        return view('event.show', compact('event', 'date', 'getWeek', 'week', 'start_time', 'end_time'));
    }

    /**
     * 編集画面
     */
    public function edit(Request $request, $id)
    {
        //カテゴリー一覧取得
        $categories = $this->category->allCategoriesData();

        //IDをもとに編集画面に表示するもくもく会のデータを1件取得
        $event = $this->event->findEventByEventId($id);

        return view('event.edit', compact('categories', 'event'));
    }

    public function update(EventRequest $request)
    {
        // イベントIDを取得
        $eventId = $request->event_id;

        // イベントIDをもとに更新対象のレコードを1件取得
        $event = $this->event->findEventByEventId($eventId);

        // 更新対象のレコードの更新処理を実行
        $isUpdated = $this->event->updatedEventData($request, $event);

        return redirect()->route('event.index')->with('success', 'もくもく会の更新に成功しました');
    }

    public function delete($id)
    {
        //更新対象のレコードの削除処理
        $isDeleted = $this->event->deletedEventData($id);
        return redirect()->route('event.delete')->with('success', 'もくもく会の削除に成功しました');
    }
}
