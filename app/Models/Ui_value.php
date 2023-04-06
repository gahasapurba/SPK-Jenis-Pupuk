<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;

class Ui_value extends Model
{
    use HasFactory, SoftDeletes, CascadeSoftDeletes;

    protected $table = 'ui_value';

    protected $fillable = [
        'id_alternatives',
        'spk_results',
    ];

    public function criteria()
    {
        return $this->belongsTo(Alternative::class, 'id_alternatives')->withTrashed();
    }
}
