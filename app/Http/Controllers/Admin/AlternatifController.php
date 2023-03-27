<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alternatif;
use Laravel\Ui\Presets\React;

class AlternatifController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->Alternatif = new Alternatif();
    }

    public function index()
    {
        $data = [
            'alternatif' => $this->Alternatif->getData(),
        ];

        return view('pages.admin.alternatif.index', $data);
    }

    public function pagesAddData()
    {
        return view('pages.admin.alternatif.add');
    }

    public function addData()
    {
        Request()->validate([
            'nama_alternatif' => 'required|min:4',
        ],[
            'nama_alternatif.required' => 'Nama Alternatif harus diisi',
            'nama_alternatif.min' => 'Minimal 4 karakter',
        ]);

        $data = [
            'nama_alternatif' => Request()->nama_alternatif,
        ];

        $this->Alternatif->addData($data);

        return redirect()->route('indexAlternatif')->with('success', 'Data Berhasil Disimpan!');
    }

    public function pagesEditAlternatif($id)
    {
        $data = [
            'alternatif' => $this->Alternatif->getDataEdit($id),
        ];

        return view('pages.admin.alternatif.edit', $data);
    }

    public function editData()
    {
        $alternatif = Alternatif::find(Request()->id);

        if(Request()->nama_alternatif == $alternatif->nama_alternatif){
            return redirect()->back()->with('warning', "Tidak ada data yang berubah");
        }

        Request()->validate([
            'nama_alternatif' => 'required|min:4',
        ],[
            'nama_alternatif.required' => 'Nama Alternatif harus diisi',
            'nama_alternatif.min' => 'Minimal 4 karakter',
        ]);

        $alternatif->nama_alternatif = Request()->nama_alternatif;
        $alternatif->save();

        return redirect()->route('indexAlternatif')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    public function delateData()
    {
        $this->Alternatif->deleteData(Request()->id);

        return redirect()->route('indexAlternatif')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
