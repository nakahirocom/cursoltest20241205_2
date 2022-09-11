<?php

namespace App\Http\Requests\Santaku;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'question' => 'required|max:10',
            'answer' => 'required|max:3',
            'comment' => 'required|max:20',

        ];

    }
    // Requestクラスのuser関数で今自分がログインしているユーザーが取得できる。
    public function userId(): int
    {
        return $this->user()->id;
    }



    public function question(): string
    {
        return $this->input('question');
    }

    public function answer(): string
    {
        return $this->input('answer');
    }

    public function comment(): string
    {
        return $this->input('comment');
    }


}
