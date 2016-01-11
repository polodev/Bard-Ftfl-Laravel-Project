<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SliderRequest extends Request
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
            'heading_text' => 'required|min:5',
            'paragraph_text' => 'required|min:15',
            'button_text' => 'required|min:2',
            'button_url' => 'required|min:8',
            'slider_image' => 'required'

        ];
    }
}
