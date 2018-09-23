<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            //
            'login_id' => 'required|min:3',
            'role' => 'required|min:2',
            'name' => 'required|min:2',
            'password' => 'required',
            'mail' => 'required',
            'test_mail' => 'required',
            'updated_person' => 'required|min:3'
        ];
    }
}
