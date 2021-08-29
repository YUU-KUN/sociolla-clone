<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'brand_id' => 'required | integer',
            'title' => 'required | max:100',
            'name' => 'required | max:100',
            'description' => 'required',
            'price' => 'required | integer',
            'variant' => 'required',
            'stock' => 'required | integer | min:0',
            'image' => 'required',
            // 'isPreOrder' => 'max:1',
            // 'hasVoucher' => 'max:1',
            // 'rating' => 'required | integer | min:1 | max:5',
            // 'totalRating' => 'required | integer',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'brand_id.required' => 'Id brand harus diisi',
    //         'brand_id.integer' => 'Id brand harus berupa angka nih'
    //     ];
    // }
}
