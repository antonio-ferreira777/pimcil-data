<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFieldRequest;
use App\Http\Requests\UpdateFieldRequest;
use App\Http\Resources\Admin\FieldResource;
use App\Models\Field;
use App\Models\FieldsGroup;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FieldsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('field_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FieldResource(Field::with(['fieldGroup'])->advancedFilter());
    }

    public function store(StoreFieldRequest $request)
    {
        $field = Field::create($request->validated());

        return (new FieldResource($field))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('field_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'field_group' => FieldsGroup::get(['id', 'name']),
                'type'        => Field::TYPE_SELECT,
            ],
        ]);
    }

    public function show(Field $field)
    {
        abort_if(Gate::denies('field_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FieldResource($field->load(['fieldGroup']));
    }

    public function update(UpdateFieldRequest $request, Field $field)
    {
        $field->update($request->validated());

        return (new FieldResource($field))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Field $field)
    {
        abort_if(Gate::denies('field_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new FieldResource($field->load(['fieldGroup'])),
            'meta' => [
                'field_group' => FieldsGroup::get(['id', 'name']),
                'type'        => Field::TYPE_SELECT,
            ],
        ]);
    }

    public function destroy(Field $field)
    {
        abort_if(Gate::denies('field_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $field->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
