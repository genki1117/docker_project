<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validate = [];

        $validate += [
            //タイトル必須
            'title' => [
                'required',
                'max:50'
            ],
            //日付必須
            'date' => [
                'required'
            ],
            //開始時間必須
            'start_time' => [
                'required'
            ],
            //終了時間必須
            'end_time' => [
                'required'
            ],
            //参加費必須
            'entry_fee' => [
                'required'
            ],
            //詳細必須
            'content' => [
                'required'
            ]
        ];

        return $validate;
    }
}
