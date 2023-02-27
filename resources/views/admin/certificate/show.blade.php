@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.certificate.title_singular') }}:
                    {{ trans('cruds.certificate.fields.id') }}
                    {{ $certificate->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.certificate.fields.id') }}
                            </th>
                            <td>
                                {{ $certificate->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.certificate.fields.serial_number') }}
                            </th>
                            <td>
                                {{ $certificate->serial_number }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.certificate.fields.issued') }}
                            </th>
                            <td>
                                {{ $certificate->issued }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.certificate.fields.expairy') }}
                            </th>
                            <td>
                                {{ $certificate->expairy }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.certificate.fields.for_rig_name') }}
                            </th>
                            <td>
                                @if($certificate->forRigName)
                                    <span class="badge badge-relationship">{{ $certificate->forRigName->rig_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.certificate.fields.certificate') }}
                            </th>
                            <td>
                                @foreach($certificate->certificate as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('certificate_edit')
                    <a href="{{ route('admin.certificates.edit', $certificate) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.certificates.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection