<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class rdeveloper extends Request
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
            'country'=> 'required',
            'state' => 'required|min:4|max:20',
            'city' => 'required|min:4|max:20',
            'phone' => 'numeric|required|min:8',
            'position'=> 'required|min:2',
            'picture'=> 'required|image',
            'skills'=> 'required|min:5',
            'about'=> 'required|min:10',
            'gender'=> 'required',
            'userid' => 'required',
            'cover'=> 'required|image',

        ];
    }
}
