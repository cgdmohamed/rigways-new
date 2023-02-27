<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('project.project_name') ? 'invalid' : '' }}">
        <label class="form-label required" for="project_name">{{ trans('cruds.project.fields.project_name') }}</label>
        <input class="form-control" type="text" name="project_name" id="project_name" required wire:model.defer="project.project_name">
        <div class="validation-message">
            {{ $errors->first('project.project_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.project_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('project.project_location') ? 'invalid' : '' }}">
        <label class="form-label required">{{ trans('cruds.project.fields.project_location') }}</label>
        <select class="form-control" wire:model="project.project_location">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['project_location'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('project.project_location') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.project_location_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('project.for_company_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="for_company">{{ trans('cruds.project.fields.for_company') }}</label>
        <x-select-list class="form-control" required id="for_company" name="for_company" :options="$this->listsForFields['for_company']" wire:model="project.for_company_id" />
        <div class="validation-message">
            {{ $errors->first('project.for_company_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.for_company_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('project.workers_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="workers">{{ trans('cruds.project.fields.workers') }}</label>
        <x-select-list class="form-control" required id="workers" name="workers" :options="$this->listsForFields['workers']" wire:model="project.workers_id" />
        <div class="validation-message">
            {{ $errors->first('project.workers_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.workers_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>