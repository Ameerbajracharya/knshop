<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductValidation extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'productName' => 'required',
            // 'code' => 'required',
            // 'qrCode' => 'required',
            // 'barCode' => 'required',
            'categoryid' => 'required',
            'brandid' => 'required',
            'typeid' => 'required',
            'unitid' => 'required',
            'schemeid' => 'required',
            'wholeSalePrice' => 'required',
            'markedPrice' => 'required',
            'sellingPrice' => 'required',
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
