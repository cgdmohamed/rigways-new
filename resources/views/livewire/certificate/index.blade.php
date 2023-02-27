<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('certificate_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Certificate" format="csv" />
                <livewire:excel-export model="Certificate" format="xlsx" />
                <livewire:excel-export model="Certificate" format="pdf" />
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
                            {{ trans('cruds.certificate.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.certificate.fields.serial_number') }}
                            @include('components.table.sort', ['field' => 'serial_number'])
                        </th>
                        <th>
                            {{ trans('cruds.certificate.fields.issued') }}
                            @include('components.table.sort', ['field' => 'issued'])
                        </th>
                        <th>
                            {{ trans('cruds.certificate.fields.expairy') }}
                            @include('components.table.sort', ['field' => 'expairy'])
                        </th>
                        <th>
                            {{ trans('cruds.certificate.fields.for_rig_name') }}
                            @include('components.table.sort', ['field' => 'for_rig_name.rig_name'])
                        </th>
                        <th>
                            {{ trans('cruds.certificate.fields.certificate') }}
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($certificates as $certificate)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $certificate->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $certificate->id }}
                            </td>
                            <td>
                                {{ $certificate->serial_number }}
                            </td>
                            <td>
                                {{ $certificate->issued }}
                            </td>
                            <td>
                                {{ $certificate->expairy }}
                            </td>
                            <td>
                                @if($certificate->forRigName)
                                    <span class="badge badge-relationship">{{ $certificate->forRigName->rig_name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @foreach($certificate->certificate as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('certificate_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.certificates.show', $certificate) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('certificate_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.certificates.edit', $certificate) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('certificate_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $certificate->id }})" wire:loading.attr="disabled">
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
            {{ $certificates->links() }}
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