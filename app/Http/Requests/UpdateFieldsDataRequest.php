<?php

namespace App\Http\Requests;

use App\Models\FieldsData;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFieldsDataRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('fields_data_edit');
    }

    public function rules()
    {
        return [
            'product_id' => [
                'integer',
                'exists:products,id',
                'required',
            ],
            'field_id' => [
                'integer',
                'exists:fields,id',
                'required',
            ],
            'field_order' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }
}
