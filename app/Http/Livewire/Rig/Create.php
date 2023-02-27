<?php

namespace App\Http\Livewire\Rig;

use App\Models\Project;
use App\Models\Rig;
use App\Models\Team;
use Livewire\Component;

class Create extends Component
{
    public Rig $rig;

    public array $listsForFields = [];

    public function mount(Rig $rig)
    {
        $this->rig = $rig;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.rig.create');
    }

    public function submit()
    {
        $this->validate();

        $this->rig->save();

        return redirect()->route('admin.rigs.index');
    }

    protected function rules(): array
    {
        return [
            'rig.rig_name' => [
                'string',
                'required',
            ],
            'rig.rig_type' => [
                'required',
                'in:' . implode(',', array_keys($this->listsForFields['rig_type'])),
            ],
            'rig.rig_status' => [
                'required',
                'in:' . implode(',', array_keys($this->listsForFields['rig_status'])),
            ],
            'rig.in_project_id' => [
                'integer',
                'exists:projects,id',
                'nullable',
            ],
            'rig.workforce_id' => [
                'integer',
                'exists:teams,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['rig_type']   = $this->rig::RIG_TYPE_SELECT;
        $this->listsForFields['rig_status'] = $this->rig::RIG_STATUS_RADIO;
        $this->listsForFields['in_project'] = Project::pluck('project_name', 'id')->toArray();
        $this->listsForFields['workforce']  = Team::pluck('name', 'id')->toArray();
    }
}
