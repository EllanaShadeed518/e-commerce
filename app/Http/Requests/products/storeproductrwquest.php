<?php

namespace App\Http\Requests\products;

use Illuminate\Foundation\Http\FormRequest;

class storeproductrwquest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' =>'required',
            'description' =>'required',
            'quantity' =>'required',
            'price' => 'required',
           'image' => 'required|image|mimes:png,jpg,gif',
        ];
    }
   /* public function messages(){
        return[
            'name.required'=>'tttt',
        ];
    }*/
}
