<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class rproposal extends Request
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
        'name' => 'required|min:4|max:20',
        'email' => 'required|unique:proposals',
        'company' => 'required|min:4',
        'phone' => 'required|numeric',
        'country' => 'required',
        'website' => 'required|url',
        'pin' => 'required|numeric|min:4',
        'description' => 'required',
        'proposal_type' => 'required',
        'time_frame' => 'required',
        'budget' => 'required',
        'proposal_file' => 'mimes:zip',

        ];
    }
}
