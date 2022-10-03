<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'user_id'=>'required',
            'date_work'=>'required',
            'start_at'=>'required',
            'stop_at'=>'required',
            'start_recored'=>'required',
            'stop_recored'=>'required',
            'start_break'=>'required',
            'stop_break'=>'required',
            'client_id'=>'required'
        ];
    }
}
