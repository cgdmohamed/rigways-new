<?php

namespace App\Http\Requests;

use App\Models\Company;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCompanyRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('company_edit'),
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
            'company_name' => [
                'string',
                'nullable',
            ],
            'company_address' => [
                'string',
                'required',
            ],
            'company_phone' => [
                'string',
                'required',
                'unique:companies,company_phone,' . request()->route('company')->id,
            ],
            'company_email' => [
                'email:rfc',
                'nullable',
            ],
            'company_description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
