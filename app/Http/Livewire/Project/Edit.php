<?php

namespace App\Http\Livewire\Project;

use App\Models\Company;
use App\Models\Project;
use App\Models\Team;
use Livewire\Component;

class Edit extends Component
{
    public Project $project;

    public array $listsForFields = [];

    public function mount(Project $project)
    {
        $this->project = $project;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.project.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->project->save();

        return redirect()->route('admin.projects.index');
    }

    protected function rules(): array
    {
        return [
            'project.project_name' => [
                'string',
                'required',
                'unique:projects,project_name,' . $this->project->id,
            ],
            'project.project_location' => [
                'required',
                'in:' . implode(',', array_keys($this->listsForFields['project_location'])),
            ],
            'project.for_company_id' => [
                'integer',
                'exists:companies,id',
                'required',
            ],
            'project.workers_id' => [
                'integer',
                'exists:teams,id',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['project_location'] = $this->project::PROJECT_LOCATION_SELECT;
        $this->listsForFields['for_company']      = Company::pluck('company_name', 'id')->toArray();
        $this->listsForFields['workers']          = Team::pluck('name', 'id')->toArray();
    }
}
