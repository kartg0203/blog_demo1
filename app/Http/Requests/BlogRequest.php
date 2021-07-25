<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
        return [
            'title' => 'required|min:4|max:40',
            'category_id' => 'required|gt:0',
            'content' => 'required|min:10'
        ];
    }

    public function messages()
    {
        return [
            'category_id.gt' => '分類 必須選擇至少一個',
        ];
    }

    public function attributes()
    {
        return [
            'category_id' => '分類',
        ];
    }
}
