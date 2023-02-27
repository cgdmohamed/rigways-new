<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rig;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RigController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('rig_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.rig.index');
    }

    public function create()
    {
        abort_if(Gate::denies('rig_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.rig.create');
    }

    public function edit(Rig $rig)
    {
        abort_if(Gate::denies('rig_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.rig.edit', compact('rig'));
    }

    public function show(Rig $rig)
    {
        abort_if(Gate::denies('rig_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rig->load('inProject', 'workforce', 'team');

        return view('admin.rig.show', compact('rig'));
    }
}
