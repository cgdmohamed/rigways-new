<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('rig.rig_name') ? 'invalid' : '' }}">
        <label class="form-label required" for="rig_name">{{ trans('cruds.rig.fields.rig_name') }}</label>
        <input class="form-control" type="text" name="rig_name" id="rig_name" required wire:model.defer="rig.rig_name">
        <div class="validation-message">
            {{ $errors->first('rig.rig_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.rig.fields.rig_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('rig.rig_type') ? 'invalid' : '' }}">
        <label class="form-label required">{{ trans('cruds.rig.fields.rig_type') }}</label>
        <select class="form-control" wire:model="rig.rig_type">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['rig_type'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('rig.rig_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.rig.fields.rig_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('rig.rig_status') ? 'invalid' : '' }}">
        <label class="form-label required">{{ trans('cruds.rig.fields.rig_status') }}</label>
        @foreach($this->listsForFields['rig_status'] as $key => $value)
            <label class="radio-label"><input type="radio" name="rig_status" wire:model="rig.rig_status" value="{{ $key }}">{{ $value }}</label>
        @endforeach
        <div class="validation-message">
            {{ $errors->first('rig.rig_status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.rig.fields.rig_status_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('rig.in_project_id') ? 'invalid' : '' }}">
        <label class="form-label" for="in_project">{{ trans('cruds.rig.fields.in_project') }}</label>
        <x-select-list class="form-control" id="in_project" name="in_project" :options="$this->listsForFields['in_project']" wire:model="rig.in_project_id" />
        <div class="validation-message">
            {{ $errors->first('rig.in_project_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.rig.fields.in_project_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('rig.workforce_id') ? 'invalid' : '' }}">
        <label class="form-label" for="workforce">{{ trans('cruds.rig.fields.workforce') }}</label>
        <x-select-list class="form-control" id="workforce" name="workforce" :options="$this->listsForFields['workforce']" wire:model="rig.workforce_id" />
        <div class="validation-message">
            {{ $errors->first('rig.workforce_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.rig.fields.workforce_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.rigs.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>