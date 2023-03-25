<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Subkriteria extends Model
{
    protected $table = 'subkriteria';

    protected $fillable =
    [
        'kriteria_id','nama_subkriteria','variabel','nilai'
    ];

    public function addData($data)
    {
        Subkriteria::create($data);
    }

    public function getData()
    {
        return DB::table('kriteria')
            ->join('subkriteria', 'kriteria.id', '=', 'subkriteria.kriteria_id')
            ->select(
                'kriteria.nama_kriteria as nama_kriteria',
                'subkriteria.id as id',
                'subkriteria.kriteria_id as kriteria_id',
                'subkriteria.nama_subkriteria as nama_subkriteria',
                'subkriteria.variabel as variabel',
                'subkriteria.nilai as nilai',
            )
            ->orderBy('subkriteria.nilai', 'ASC')
            ->get();
    }

    public function DeleteData($id)
    {
        $subkriteria = Subkriteria::find($id);
        $subkriteria->delete();
    }
}
