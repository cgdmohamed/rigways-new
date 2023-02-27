<?php

namespace App\Http\Requests;

use App\Models\Certificate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCertificateRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('certificate_edit'),
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
            'serial_number' => [
                'string',
                'required',
                'unique:certificates,serial_number,' . request()->route('certificate')->id,
            ],
            'issued' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'expairy' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'for_rig_name_id' => [
                'integer',
                'exists:rigs,id',
                'required',
            ],
        ];
    }
}
