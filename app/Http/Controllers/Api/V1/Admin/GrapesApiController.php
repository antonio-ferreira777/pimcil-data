<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGrapeRequest;
use App\Http\Requests\UpdateGrapeRequest;
use App\Http\Resources\Admin\GrapeResource;
use App\Models\Grape;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GrapesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('grape_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GrapeResource(Grape::advancedFilter());
    }

    public function store(StoreGrapeRequest $request)
    {
        $grape = Grape::create($request->validated());

        return (new GrapeResource($grape))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('grape_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [],
        ]);
    }

    public function show(Grape $grape)
    {
        abort_if(Gate::denies('grape_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GrapeResource($grape);
    }

    public function update(UpdateGrapeRequest $request, Grape $grape)
    {
        $grape->update($request->validated());

        return (new GrapeResource($grape))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Grape $grape)
    {
        abort_if(Gate::denies('grape_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new GrapeResource($grape),
            'meta' => [],
        ]);
    }

    public function destroy(Grape $grape)
    {
        abort_if(Gate::denies('grape_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $grape->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
