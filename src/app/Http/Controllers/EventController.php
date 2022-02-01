<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function create(Request $request)
    {
        try{
            //トラザクション開始
            DB::beginTtansaction();
            //リクエストデータをもとにeventsテーブルにinsert
            $insertEvent = $this->event->insertEventData($request);
            //処理に成功したらコミット
            DB::commit();
        }catch(\Throwwable $e){
            //処理に失敗したらロールバック
            DB::rollback();
            //例外を投げる
            throw $e;
        }

        return redirect()->route('event.index');
    }
}
