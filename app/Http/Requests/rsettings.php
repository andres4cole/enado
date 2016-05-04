<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class rsettings extends Request
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
        'name' => 'required|max:20',
        'title' => 'required|max:40',
        'address' => 'required|max:100',
        'description' => 'required|max:100',
        'type' => 'required',
        'logo' => 'required|image',
        'background' => 'required|image',
        'email' => 'required|email',
        'fax' => 'required|numeric',
        'phone' => 'required|numeric',
        'twitter' => 'required',
        'facebook' => 'required',
        'google' => 'required',
        ];
    }
}
