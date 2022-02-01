<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

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
     * eventsテーブルのレコード全権取得
     *
     * @param void
     * @return Event eventsテーブル
     */
    public function allEventsData()
    {
        return $this->get();
    }

    /**
     * カテゴリーカテゴリーリレーション
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    /**
     * 登録処理 eventsテーブルにinsert
     */
    public function insertEventData($request)
    {
        return $this->create([
            'category_id' => $request->category_id,
            'title'       => $request->title,
            'date'        => $request->date,
            'start_time'  => $request->start_time,
            'end_time'    => $request->end_time,
            'entry_fee'   => $request->entry_fee,
            'content'     => $request->content,
        ]);
    }
}
