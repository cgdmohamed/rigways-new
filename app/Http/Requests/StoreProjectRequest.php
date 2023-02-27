<?php

namespace App\Http\Requests;

use App\Models\Project;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProjectRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('project_create'),
            response()->json(
                ['message' => 'This action is unauthorized.'],
                Response::HTTP_FORBIDDEN
            ),
        );

        return true;
    }

    public function rules(): array
    {
        return [
            'project_name' => [
                'string',
                'required',
                'unique:projects,project_name',
            ],
            'project_location' => [
                'required',
                'in:' . implode(',', array_keys(Project::PROJECT_LOCATION_SELECT)),
            ],
            'for_company_id' => [
                'integer',
                'exists:companies,id',
                'required',
            ],
            'workers_id' => [
                'integer',
                'exists:teams,id',
                'required',
            ],
        ];
    }
}
