<?php

namespace App\Http\Requests;

use App\Models\Taxonomy;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTaxonomyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('taxonomy_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'parent_id' => [
                'integer',
                'exists:taxonomies,id',
                'nullable',
            ],
        ];
    }
}
