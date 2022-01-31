<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct()
    {
        $this->event = new Event();
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
        return view('event.register');
    }
}
