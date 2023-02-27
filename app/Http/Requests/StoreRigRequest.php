<?php

namespace App\Http\Requests;

use App\Models\Rig;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRigRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('rig_create'),
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
            'rig_name' => [
                'string',
                'required',
            ],
            'rig_type' => [
                'required',
                'in:' . implode(',', array_keys(Rig::RIG_TYPE_SELECT)),
            ],
            'rig_status' => [
                'required',
                'in:' . implode(',', array_keys(Rig::RIG_STATUS_RADIO)),
            ],
            'in_project_id' => [
                'integer',
                'exists:projects,id',
                'nullable',
            ],
            'workforce_id' => [
                'integer',
                'exists:teams,id',
                'nullable',
            ],
        ];
    }
}
