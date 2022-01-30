<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //モデルと関連づけるテーブル
    protected $table = 'categories';

    //テーブルに関連づける主キー
    protected $primarykey = 'category_id';

    //登録、編集ができるカラム
    protected $fillable = [
        'category_name'
    ];

    /**
     * categoriesテーブルのレコード全件取得
     *
     *
     * @param void
     * @return Category categoriesテーブル
     */
    public function allcategoriesData()
    {
        return $this->get();
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'category_id', 'category_id');
    }

}
