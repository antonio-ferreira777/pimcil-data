<?php

namespace App\Http\Requests;

use App\Models\Grape;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class UpdateGrapeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('grape_edit');
    }

    public function rules()
    {
        return [
            'grapes' => [
                'string',
                'required',
                'unique:grapes,grapes,' . request()->route('grape')->id,
            ],
            'synonyms' => [
                'string',
                'nullable',
            ],
            'color' => [
                'required',
                'in:' . implode(',', Arr::pluck(Grape::COLOR_SELECT, 'value')),
            ],
        ];
    }
}
