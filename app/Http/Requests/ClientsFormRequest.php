<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ClientsFormRequest extends Request
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
            'client_name' => 'required|min:2',
            'client_email' => 'required|min:3',
            'client_phone_number' => 'required|min:2',
            'client_address' => 'required|min:2',
            'client_logo' => 'required'
        ];
    }
}
