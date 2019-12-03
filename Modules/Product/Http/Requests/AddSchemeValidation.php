<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSchemeValidation extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|unique:schemes',
            'description'=>'required',
            'startdate'=>'required',
            'enddate'=>'required',
            'caption'=>'required',
            'keyword'=>'required',
            'metaTags'=>'required',
            'metaDescription'=>'required',
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
