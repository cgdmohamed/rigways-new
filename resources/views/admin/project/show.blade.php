@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.project.title_singular') }}:
                    {{ trans('cruds.project.fields.id') }}
                    {{ $project->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.project.fields.id') }}
                            </th>
                            <td>
                                {{ $project->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.project.fields.project_name') }}
                            </th>
                            <td>
                                {{ $project->project_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.project.fields.project_location') }}
                            </th>
                            <td>
                                {{ $project->project_location_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.project.fields.for_company') }}
                            </th>
                            <td>
                                @if($project->forCompany)
                                    <span class="badge badge-relationship">{{ $project->forCompany->company_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.project.fields.created_at') }}
                            </th>
                            <td>
                                {{ $project->created_at }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.project.fields.workers') }}
                            </th>
                            <td>
                                @if($project->workers)
                                    <span class="badge badge-relationship">{{ $project->workers->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('project_edit')
                    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection