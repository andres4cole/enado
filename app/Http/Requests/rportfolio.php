<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class rportfolio extends Request
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
         'name' => 'required|min:4',
         'client' => 'required|min:4',
         'budget' => 'required|min:2',
         'title' => 'required|min:4',
         'cost' => 'required|numeric',
         'technologies' => 'required|min:4',
         'website' => 'required|url',
         'description' => 'required|min:10',
         'picture' => 'required|image',
         'start_time' => 'required|date',
         'end_time' => 'required|date',
        ];
    }
}
