<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kriteria;

class DataKriteriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->Kriteria = new Kriteria();
    }

    public function index()
    {
        $data = [
            'kriteria' => $this->Kriteria->getData(),
        ];

        return view('pages.admin.dataKriteria.index', $data);
    }

    public function addDataKriteria()
    {
        return view('pages.admin.dataKriteria.add');
    }

    public function editDataKriteria($id)
    {
        $data = [
            'kriteriaId' => $this->Kriteria->getEditData($id),
        ];

        return view('pages.admin.dataKriteria.edit', $data);
    }

    public function ProsesTambahDataKriteria()
    {
        Request()->validate([
            'cd_kriteria' => 'required|min:2|max:4|unique:kriteria',
            'nama_kriteria' => 'required|min:4|max:20',
            'bobot' => 'required',
            'jenis' => 'required|not_in:0',
        ],[
            'cd_kriteria.required' => 'Kriteria harus diisi',
            'cd_kriteria.min' => "Minimal 2 karakter",
            'cd_kriteria.max' => "Maximal 4 karakter",
            'cd_kriteria.unique' => 'Kode ini sudah digunakan',
            'nama_kriteria.required' => 'Nama kriteria harus diisi',
            'nama_kriteria.min' => "Minimal 4 karakter",
            'nama_kriteria.max' => "Maximal 20 karakter",
            'bobot.required' => 'Bobot harus diisi',
            'jenis.required' => 'Jenis harus diisi',
            'jenis.not_in' => 'Herus memilih jenis',
        ]);

        $data = [
            'cd_kriteria' => Request()->cd_kriteria,
            'nama_kriteria' => Request()->nama_kriteria,
            'bobot' => Request()->bobot,
            'jenis' => Request()->jenis,
        ];

        $this->Kriteria->addData($data);

        return redirect()->route('indexDataKriteria')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function ProsesEditDataKriteria()
    {
        $kriteria = Kriteria::find(Request()->id);

        if(Request()->nama_kriteria == $kriteria->nama_kriteria &&
        Request()->bobot == $kriteria->bobot && Request()->jenis == $kriteria->jenis){
            return redirect()->back()->with('warning', "Tidak ada data yang berubah");
        }

        Request()->validate([
            'nama_kriteria' => 'required|min:4|max:20',
            'bobot' => 'required',
            'jenis' => 'required|not_in:0',
        ],[
            'nama_kriteria.required' => 'Nama kriteria harus diisi',
            'nama_kriteria.min' => "Minimal 4 karakter",
            'nama_kriteria.max' => "Maximal 20 karakter",
            'bobot.required' => 'Bobot harus diisi',
            'jenis.required' => 'Jenis harus diisi',
            'jenis.not_in' => 'Herus memilih jenis',
        ]);

        $kriteria->cd_kriteria = Request()->cd_kriteria;
        $kriteria->nama_kriteria = Request()->nama_kriteria;
        $kriteria->bobot = Request()->bobot;
        $kriteria->jenis = Request()->jenis;
        $kriteria->save();

        return redirect()->route('indexDataKriteria')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    public function hapusData()
    {
        $this->Kriteria->deleteData(Request()->id);

        return redirect()->route('indexDataKriteria')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
