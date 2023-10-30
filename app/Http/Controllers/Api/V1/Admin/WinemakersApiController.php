<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWinemakerRequest;
use App\Http\Requests\UpdateWinemakerRequest;
use App\Http\Resources\Admin\WinemakerResource;
use App\Models\Winemaker;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WinemakersApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('winemaker_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new WinemakerResource(Winemaker::advancedFilter());
    }

    public function store(StoreWinemakerRequest $request)
    {
        $winemaker = Winemaker::create($request->validated());

        return (new WinemakerResource($winemaker))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('winemaker_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [],
        ]);
    }

    public function show(Winemaker $winemaker)
    {
        abort_if(Gate::denies('winemaker_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new WinemakerResource($winemaker);
    }

    public function update(UpdateWinemakerRequest $request, Winemaker $winemaker)
    {
        $winemaker->update($request->validated());

        return (new WinemakerResource($winemaker))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Winemaker $winemaker)
    {
        abort_if(Gate::denies('winemaker_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new WinemakerResource($winemaker),
            'meta' => [],
        ]);
    }

    public function destroy(Winemaker $winemaker)
    {
        abort_if(Gate::denies('winemaker_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $winemaker->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
