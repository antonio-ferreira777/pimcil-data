<?php

namespace App\Http\Requests;

use App\Models\Field;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class UpdateFieldRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('field_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'type' => [
                'nullable',
                'in:' . implode(',', Arr::pluck(Field::TYPE_SELECT, 'value')),
            ],
            'table_link' => [
                'string',
                'nullable',
            ],
            'nullable' => [
                'boolean',
            ],
            'field_group_id' => [
                'integer',
                'exists:fields_groups,id',
                'nullable',
            ],
        ];
    }
}
