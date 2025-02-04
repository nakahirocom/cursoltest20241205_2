<?php

namespace App\Http\Requests\Santaku;

use Illuminate\Foundation\Http\FormRequest;

class AnswerResultRequest extends FormRequest
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
            //
        ];
    }

    // Requestクラスのuser関数で今自分がログインしているユーザーが取得できる。
    public function userId(): int
    {
        return $this->user()->id;
    }
}
