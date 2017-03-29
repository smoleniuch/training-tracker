<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class UpdateUserProfile extends FormRequest
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
          'Full_name' => 'String|max:50|nullable',
          'location' => 'String|max:50|nullable',
          'age' => 'numeric|between:1,150|nullable',
          'about_me' => 'String|max:1000|nullable'
        ];
    }


}
