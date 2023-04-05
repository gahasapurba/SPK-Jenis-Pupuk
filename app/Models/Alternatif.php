<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Alternatif extends Model
{
    protected $table = 'alternatif';

    protected $fillable =
    [
        'nama_alternatif','curah_hujan','jenis_tanah','kandungan_n','kandungan_p','kandungan_k','harga'
    ];

    public function addData($data)
    {
        Alternatif::create($data);
    }

    public function getData()
    {
        return DB::table('alternatif')->orderBy('created_at', 'DESC')->get();
    }

    public function getDataEdit($id)
    {
        return DB::table('alternatif')->where('id', $id)->get();
    }

    public function deleteData($id)
    {
        $alternatif = Alternatif::find($id);
        $alternatif->delete();
    }

    // data penilaian
    public function pagesPenilaian($id)
    {
        return DB::table('alternatif')->where('id', $id)->get();
    }

    // ambil data alternatif setiap kriteria
    // --------------------------------
    // ambil data alternatif curah hujan
    public function dataAlternatif($alternatif)
    {
        return DB::table('alternatif')->select($alternatif)->orderBy('created_at', 'DESC')->get();
    }
}
