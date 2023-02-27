@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.rig.title_singular') }}:
                    {{ trans('cruds.rig.fields.id') }}
                    {{ $rig->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.rig.fields.id') }}
                            </th>
                            <td>
                                {{ $rig->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.rig.fields.rig_name') }}
                            </th>
                            <td>
                                {{ $rig->rig_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.rig.fields.rig_type') }}
                            </th>
                            <td>
                                {{ $rig->rig_type_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.rig.fields.rig_status') }}
                            </th>
                            <td>
                                {{ $rig->rig_status_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.rig.fields.in_project') }}
                            </th>
                            <td>
                                @if($rig->inProject)
                                    <span class="badge badge-relationship">{{ $rig->inProject->project_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.rig.fields.workforce') }}
                            </th>
                            <td>
                                @if($rig->workforce)
                                    <span class="badge badge-relationship">{{ $rig->workforce->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.rig.fields.created_at') }}
                            </th>
                            <td>
                                {{ $rig->created_at }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('rig_edit')
                    <a href="{{ route('admin.rigs.edit', $rig) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.rigs.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection