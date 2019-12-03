<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductValidation extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'mrp'=>'required',
            // 'code'=>'required ',
            'discount'=>'required',
            'description'=>'required',
            'brand_id'=> 'required',
            'category_id'=> 'required',
            'producttype_id'=> 'required',
            //'mainimage' => 'required|mimes:jpg,gif,png,jpeg',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
