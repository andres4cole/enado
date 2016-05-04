<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class rcontacts extends Request
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
            'firstname'=> 'required|min:4',
            'lastname' => 'required|min:4',
            'email' => 'required|email',
            'subject' => 'required|min:4',
            'message'=> 'required|min:10',
        ];
    }
}
