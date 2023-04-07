<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuantitativeUtility extends Model
{
    use HasFactory, SoftDeletes, CascadeSoftDeletes;

    protected $fillable = [
        'alternative_alternatives_id',
        'result',
    ];

    public function alternative()
    {
        return $this->belongsTo(Alternative::class, 'alternative_alternatives_id')->withTrashed();
    }
}
