<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('certificate.serial_number') ? 'invalid' : '' }}">
        <label class="form-label required" for="serial_number">{{ trans('cruds.certificate.fields.serial_number') }}</label>
        <input class="form-control" type="text" name="serial_number" id="serial_number" required wire:model.defer="certificate.serial_number">
        <div class="validation-message">
            {{ $errors->first('certificate.serial_number') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.certificate.fields.serial_number_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('certificate.issued') ? 'invalid' : '' }}">
        <label class="form-label required" for="issued">{{ trans('cruds.certificate.fields.issued') }}</label>
        <x-date-picker class="form-control" required wire:model="certificate.issued" id="issued" name="issued" picker="date" />
        <div class="validation-message">
            {{ $errors->first('certificate.issued') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.certificate.fields.issued_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('certificate.expairy') ? 'invalid' : '' }}">
        <label class="form-label required" for="expairy">{{ trans('cruds.certificate.fields.expairy') }}</label>
        <x-date-picker class="form-control" required wire:model="certificate.expairy" id="expairy" name="expairy" picker="date" />
        <div class="validation-message">
            {{ $errors->first('certificate.expairy') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.certificate.fields.expairy_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('certificate.for_rig_name_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="for_rig_name">{{ trans('cruds.certificate.fields.for_rig_name') }}</label>
        <x-select-list class="form-control" required id="for_rig_name" name="for_rig_name" :options="$this->listsForFields['for_rig_name']" wire:model="certificate.for_rig_name_id" />
        <div class="validation-message">
            {{ $errors->first('certificate.for_rig_name_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.certificate.fields.for_rig_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.certificate_certificate') ? 'invalid' : '' }}">
        <label class="form-label required" for="certificate">{{ trans('cruds.certificate.fields.certificate') }}</label>
        <x-dropzone id="certificate" name="certificate" action="{{ route('admin.certificates.storeMedia') }}" collection-name="certificate_certificate" max-file-size="5" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.certificate_certificate') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.certificate.fields.certificate_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.certificates.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>