<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    //モデルを関連づけるテーブル
    protected $table = "events";

    //テーブルに関連づける主キー
    protected $primarykey = 'event_id';

    //登録、編集ができるカラム
    protected $fillable = [
        'category_id',
        'title',
        'date',
        'start_time',
        'end_time',
        'content',
        'entry_fee',
    ];

    /**
     * eventテーブルのレコード全権取得
     * 
     * @param void
     * @return Event eventテーブル
     */
    public function allEventsData()
    {
        return $this->get();
    }
}
