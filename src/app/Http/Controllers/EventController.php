<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;

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
        //eventテーブルにあるデータを全取得
        $events = $this->event->allEventsData();
        return view('event.index', compact('events'));
    }

    public function register()
    {
        $categories = $this->category->allCategoriesData();
        return view('event.register', compact('categories'));
    }
}
