<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Subkriteria;

class PenilaianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->Alternatif = new Alternatif();
        $this->Kriteria = new Kriteria();
        $this->Subkriteria = new Subkriteria();
    }

    public function index()
    {
        $data = [
            'kriteria' => $this->Kriteria->getData(),
            'alternatif' => $this->Alternatif->getData(),
        ];
        return view('pages.admin.dataPenilaian.index', $data);
    }

    public function pagesAddPenilaian($id)
    {
        $data = [
            'alternatif' => $this->Alternatif->pagesPenilaian($id),
            'jenis_tanah' => $this->Subkriteria->getJenisTanah(),
        ];

        return view('pages.admin.dataPenilaian.add', $data);
    }

    public function addPenilaian()
    {
        $penilaian = Alternatif::find(Request()->id);

        Request()->validate([
            'curah_hujan' => 'required',
            'kandungan_p' => 'required',
            'kandungan_k' => 'required',
            'kandungan_n' => 'required',
            'jenis_tanah' => 'required',
            'harga' => 'required',
        ], [
            'curah_hujan.required' => 'Curah hujan harus diisi',
            'kandungan_p.required' => 'Kandungan P harus diisi',
            'kandungan_n.required' => 'Kandungan N harus diisi',
            'kandungan_k.required' => 'Kandungan K harus diisi',
            'jenis_tanah.required' => 'Jenis tanah harus diisi',
            'harga.required' => 'Harga harus diisi',
        ]);

        $penilaian->curah_hujan = Request()->curah_hujan;
        $penilaian->kandungan_n = Request()->kandungan_n;
        $penilaian->kandungan_p = Request()->kandungan_p;
        $penilaian->kandungan_k = Request()->kandungan_k;
        $penilaian->jenis_tanah = Request()->jenis_tanah;
        $penilaian->harga = Request()->harga;
        $penilaian->save();

        return redirect()->route('indexPenilaian')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function pagesEditPenilaian($id)
    {
        $data = [
            'alternatif' => $this->Alternatif->pagesPenilaian($id),
            'jenis_tanah' => $this->Subkriteria->getJenisTanah(),
        ];

        return view('pages.admin.dataPenilaian.edit', $data);
    }
}
