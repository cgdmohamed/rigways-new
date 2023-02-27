<?php

namespace App\Http\Livewire\Certificate;

use App\Models\Certificate;
use App\Models\Rig;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public Certificate $certificate;

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
                ->update(['model_id' => $this->certificate->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(Certificate $certificate)
    {
        $this->certificate = $certificate;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.certificate.create');
    }

    public function submit()
    {
        $this->validate();

        $this->certificate->save();
        $this->syncMedia();

        return redirect()->route('admin.certificates.index');
    }

    protected function rules(): array
    {
        return [
            'certificate.serial_number' => [
                'string',
                'required',
                'unique:certificates,serial_number',
            ],
            'certificate.issued' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'certificate.expairy' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'certificate.for_rig_name_id' => [
                'integer',
                'exists:rigs,id',
                'required',
            ],
            'mediaCollections.certificate_certificate' => [
                'array',
                'required',
            ],
            'mediaCollections.certificate_certificate.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['for_rig_name'] = Rig::pluck('rig_name', 'id')->toArray();
    }
}
