<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlbumRequest extends FormRequest
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
            'name'=>'required|string|max:255',
            'avatar'=>'max:500',
        ];
    }
    public function messages()
    {
        return[
            'required'=>'This Field Is Required',
            'name.max'=>'This Field Must Be Smaller Than 255',
            'avatar.max'=>'This Field Must Be Smaller Than 500',
        ];
    }
}
