<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use App\Traits\Tenantable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rig extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes, Tenantable;

    public $table = 'rigs';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'rig_name',
        'rig_type',
        'rig_status',
        'in_project_id',
        'workforce_id',
    ];

    public const RIG_STATUS_RADIO = [
        'relocate'  => 'Relocate',
        'migration' => 'Migration',
        'deployed'  => 'Deployed',
    ];

    public $orderable = [
        'id',
        'rig_name',
        'rig_type',
        'rig_status',
        'in_project.project_name',
        'workforce.name',
    ];

    public $filterable = [
        'id',
        'rig_name',
        'rig_type',
        'rig_status',
        'in_project.project_name',
        'workforce.name',
    ];

    public const RIG_TYPE_SELECT = [
        'drill' => 'Drill Ship Rig',
        'land'  => 'Land Rig',
        'sub'   => 'Submersible Rig',
        'jack'  => 'Jack-up Rig',
        'plat'  => 'Platform Rig',
        'semi'  => 'Semi-submersible Rig',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getRigTypeLabelAttribute($value)
    {
        return static::RIG_TYPE_SELECT[$this->rig_type] ?? null;
    }

    public function getRigStatusLabelAttribute($value)
    {
        return static::RIG_STATUS_RADIO[$this->rig_status] ?? null;
    }

    public function inProject()
    {
        return $this->belongsTo(Project::class);
    }

    public function workforce()
    {
        return $this->belongsTo(Team::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
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
