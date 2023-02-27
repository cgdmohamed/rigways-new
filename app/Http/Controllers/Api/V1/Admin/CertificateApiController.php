<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;
use App\Http\Resources\Admin\CertificateResource;
use App\Models\Certificate;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CertificateApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('certificate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CertificateResource(Certificate::with(['forRigName', 'team'])->get());
    }

    public function store(StoreCertificateRequest $request)
    {
        $certificate = Certificate::create($request->validated());

        if ($request->input('certificate_certificate', false)) {
            $certificate->addMedia(storage_path('tmp/uploads/' . basename($request->input('certificate_certificate'))))->toMediaCollection('certificate_certificate');
        }

        return (new CertificateResource($certificate))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Certificate $certificate)
    {
        abort_if(Gate::denies('certificate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CertificateResource($certificate->load(['forRigName', 'team']));
    }

    public function update(UpdateCertificateRequest $request, Certificate $certificate)
    {
        $certificate->update($request->validated());

        if ($request->input('certificate_certificate', false)) {
            if (! $certificate->certificate_certificate || $request->input('certificate_certificate') !== $certificate->certificate_certificate->file_name) {
                if ($certificate->certificate_certificate) {
                    $certificate->certificate_certificate->delete();
                }
                $certificate->addMedia(storage_path('tmp/uploads/' . basename($request->input('certificate_certificate'))))->toMediaCollection('certificate_certificate');
            }
        } elseif ($certificate->certificate_certificate) {
            $certificate->certificate_certificate->delete();
        }

        return (new CertificateResource($certificate))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Certificate $certificate)
    {
        abort_if(Gate::denies('certificate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $certificate->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
