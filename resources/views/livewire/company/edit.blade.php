<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('company.company_name') ? 'invalid' : '' }}">
        <label class="form-label" for="company_name">{{ trans('cruds.company.fields.company_name') }}</label>
        <input class="form-control" type="text" name="company_name" id="company_name" wire:model.defer="company.company_name">
        <div class="validation-message">
            {{ $errors->first('company.company_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.company.fields.company_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('company.company_address') ? 'invalid' : '' }}">
        <label class="form-label required" for="company_address">{{ trans('cruds.company.fields.company_address') }}</label>
        <textarea class="form-control" name="company_address" id="company_address" required wire:model.defer="company.company_address" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('company.company_address') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.company.fields.company_address_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('company.company_phone') ? 'invalid' : '' }}">
        <label class="form-label required" for="company_phone">{{ trans('cruds.company.fields.company_phone') }}</label>
        <input class="form-control" type="text" name="company_phone" id="company_phone" required wire:model.defer="company.company_phone">
        <div class="validation-message">
            {{ $errors->first('company.company_phone') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.company.fields.company_phone_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('company.company_email') ? 'invalid' : '' }}">
        <label class="form-label" for="company_email">{{ trans('cruds.company.fields.company_email') }}</label>
        <input class="form-control" type="email" name="company_email" id="company_email" wire:model.defer="company.company_email">
        <div class="validation-message">
            {{ $errors->first('company.company_email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.company.fields.company_email_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('company.company_description') ? 'invalid' : '' }}">
        <label class="form-label" for="company_description">{{ trans('cruds.company.fields.company_description') }}</label>
        <textarea class="form-control" name="company_description" id="company_description" wire:model.defer="company.company_description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('company.company_description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.company.fields.company_description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.companies.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>