<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRigRequest;
use App\Http\Requests\UpdateRigRequest;
use App\Http\Resources\Admin\RigResource;
use App\Models\Rig;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RigApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('rig_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RigResource(Rig::with(['inProject', 'workforce', 'team'])->get());
    }

    public function store(StoreRigRequest $request)
    {
        $rig = Rig::create($request->validated());

        return (new RigResource($rig))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Rig $rig)
    {
        abort_if(Gate::denies('rig_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RigResource($rig->load(['inProject', 'workforce', 'team']));
    }

    public function update(UpdateRigRequest $request, Rig $rig)
    {
        $rig->update($request->validated());

        return (new RigResource($rig))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Rig $rig)
    {
        abort_if(Gate::denies('rig_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rig->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
