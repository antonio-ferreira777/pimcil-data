<?php

namespace App\Http\Requests;

use App\Models\Food;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFoodRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('food_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:foods,name,' . request()->route('food')->id,
            ],
        ];
    }
}
