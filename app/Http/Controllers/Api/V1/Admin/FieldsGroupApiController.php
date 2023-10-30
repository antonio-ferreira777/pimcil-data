<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFieldsGroupRequest;
use App\Http\Requests\UpdateFieldsGroupRequest;
use App\Http\Resources\Admin\FieldsGroupResource;
use App\Models\FieldsGroup;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FieldsGroupApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('fields_group_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FieldsGroupResource(FieldsGroup::advancedFilter());
    }

    public function store(StoreFieldsGroupRequest $request)
    {
        $fieldsGroup = FieldsGroup::create($request->validated());

        return (new FieldsGroupResource($fieldsGroup))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('fields_group_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [],
        ]);
    }

    public function show(FieldsGroup $fieldsGroup)
    {
        abort_if(Gate::denies('fields_group_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FieldsGroupResource($fieldsGroup);
    }

    public function update(UpdateFieldsGroupRequest $request, FieldsGroup $fieldsGroup)
    {
        $fieldsGroup->update($request->validated());

        return (new FieldsGroupResource($fieldsGroup))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(FieldsGroup $fieldsGroup)
    {
        abort_if(Gate::denies('fields_group_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new FieldsGroupResource($fieldsGroup),
            'meta' => [],
        ]);
    }

    public function destroy(FieldsGroup $fieldsGroup)
    {
        abort_if(Gate::denies('fields_group_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fieldsGroup->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
