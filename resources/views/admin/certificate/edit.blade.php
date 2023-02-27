@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.certificate.title_singular') }}:
                    {{ trans('cruds.certificate.fields.id') }}
                    {{ $certificate->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('certificate.edit', [$certificate])
        </div>
    </div>
</div>
@endsection