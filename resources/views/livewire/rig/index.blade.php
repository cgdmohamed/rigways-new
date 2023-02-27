<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('rig_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Rig" format="csv" />
                <livewire:excel-export model="Rig" format="xlsx" />
                <livewire:excel-export model="Rig" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.rig.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.rig.fields.rig_name') }}
                            @include('components.table.sort', ['field' => 'rig_name'])
                        </th>
                        <th>
                            {{ trans('cruds.rig.fields.rig_type') }}
                            @include('components.table.sort', ['field' => 'rig_type'])
                        </th>
                        <th>
                            {{ trans('cruds.rig.fields.rig_status') }}
                            @include('components.table.sort', ['field' => 'rig_status'])
                        </th>
                        <th>
                            {{ trans('cruds.rig.fields.in_project') }}
                            @include('components.table.sort', ['field' => 'in_project.project_name'])
                        </th>
                        <th>
                            {{ trans('cruds.rig.fields.workforce') }}
                            @include('components.table.sort', ['field' => 'workforce.name'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rigs as $rig)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $rig->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $rig->id }}
                            </td>
                            <td>
                                {{ $rig->rig_name }}
                            </td>
                            <td>
                                {{ $rig->rig_type_label }}
                            </td>
                            <td>
                                {{ $rig->rig_status_label }}
                            </td>
                            <td>
                                @if($rig->inProject)
                                    <span class="badge badge-relationship">{{ $rig->inProject->project_name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($rig->workforce)
                                    <span class="badge badge-relationship">{{ $rig->workforce->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('rig_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.rigs.show', $rig) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('rig_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.rigs.edit', $rig) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('rig_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $rig->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $rigs->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush