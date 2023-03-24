<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kriteria extends Model
{
    protected $table = 'kriteria';

    protected $fillable =
    [
        'cd_kriteria','nama_kriteria','bobot','jenis'
    ];

    public function addData($data)
    {
        Kriteria::create($data);
    }

    public function getData()
    {
        return DB::table('kriteria')->orderBy('updated_at', 'DESC')->get();
    }

    public function getEditData($id)
    {
        return DB::table('kriteria')->where('id', $id)->get();
    }

    public function deleteData($id)
    {
        $kriteria = Kriteria::find($id);
        $kriteria->delete();
    }
}
