<?php

namespace App\Http\Requests;

use App\Models\Winemaker;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateWinemakerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('winemaker_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:winemakers,name,' . request()->route('winemaker')->id,
            ],
        ];
    }
}
