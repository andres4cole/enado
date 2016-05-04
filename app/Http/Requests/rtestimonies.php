<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class rtestimonies extends Request
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
            'firstname'=> 'required|min:3',
            'lastname'=> 'required|min:3',
            'email'=> 'required|email|unique:testimonies',
            'picture'=> 'required|image',
            'title' => 'required',
            'website' => 'required|max:30',
            'position'=> 'required|min:2',
            'company'=> 'required|min:2',
            'message'=> 'required',
        ];
    }
}
