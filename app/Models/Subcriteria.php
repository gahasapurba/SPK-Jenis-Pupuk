<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subcriteria extends Model
{
    use HasFactory, SoftDeletes, CascadeSoftDeletes;

    protected $fillable = [
        'criteria_criterias_id',
        'name',
        'variable',
        'value',
    ];

    public function criteria()
    {
        return $this->belongsTo(Criteria::class, 'criteria_criterias_id')->withTrashed();
    }
}
