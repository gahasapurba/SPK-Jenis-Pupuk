<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Criteria extends Model
{
    use HasFactory, SoftDeletes, CascadeSoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'weight',
        'type',
    ];

    protected $cascadeDeletes = [
        'subcriteria',
    ];

    public function subcriteria()
    {
        return $this->hasMany(Subcriteria::class, 'criteria_criterias_id');
    }
}
