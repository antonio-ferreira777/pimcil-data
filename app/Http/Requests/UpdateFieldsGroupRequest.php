<?php

namespace App\Http\Requests;

use App\Models\FieldsGroup;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFieldsGroupRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('fields_group_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'group_order' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }
}
