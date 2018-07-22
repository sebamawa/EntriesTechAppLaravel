<?php

namespace App\Http\Requests;

use Dotenv\Validator;
use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
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
        //return [
        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:categories,slug'
        ];

        //imagen de la categoria opcional. Si se selecciona imagen lo agrego al array $rules
        //if ($this->get('file')) //no funciona con get
        if ($this->has('image_path'))
            $rules = array_merge($rules, ['image_path'=>'mimes:jpg,jpeg,png|max:100']);

        return $rules;
    }

/*    public function messages()
    {
        return [
            'name.required' => 'El nombre de categoría es requerido'
        ];
    }*/
}
