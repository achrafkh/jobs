<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidFormRequest extends FormRequest
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
        $arrayV = [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'email|required',
            'region' => 'required',
            //'message' => 'required',
            'post' => 'required',
        ];

        if ('developer' == $this->type) {
            $arrayV['salery'] = 'required';
            $arrayV['disp'] = 'required';
        }
        if ($this->has('file')) {
            foreach ($this->file as $i => $f) {
                $arrayV['file'][$i] = 'max:10240';
            }
        }

        return $arrayV;
    }
}
