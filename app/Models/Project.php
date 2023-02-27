<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use App\Traits\Tenantable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes, Tenantable;

    public $table = 'projects';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'project_name',
        'project_location',
        'for_company_id',
        'workers_id',
    ];

    public $orderable = [
        'id',
        'project_name',
        'project_location',
        'for_company.company_name',
        'workers.name',
    ];

    public $filterable = [
        'id',
        'project_name',
        'project_location',
        'for_company.company_name',
        'workers.name',
    ];

    public const PROJECT_LOCATION_SELECT = [
        'kw'  => 'Kuwait',
        'bah' => 'Bahrain',
        'sa'  => 'Saudi Arabia',
        'ae'  => 'United Arab Emirates',
        'om'  => 'Oman',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getProjectLocationLabelAttribute($value)
    {
        return static::PROJECT_LOCATION_SELECT[$this->project_location] ?? null;
    }

    public function forCompany()
    {
        return $this->belongsTo(Company::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function workers()
    {
        return $this->belongsTo(Team::class);
    }

    public function getUpdatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getDeletedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
