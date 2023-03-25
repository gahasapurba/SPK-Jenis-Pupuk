<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use App\Models\Subkriteria;

class SubkriteriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->Kriteria = new Kriteria();
        $this->Subkriteria = new Subkriteria();
    }

    public function index()
    {
        $data = [
            'kriteria' => $this->Kriteria->getData(),
            'subkriteria' => $this->Subkriteria->getData(),

        ];

        return view('pages.admin.subKriteria.index', $data);
    }

    public function prosesAddData()
    {
        Request()->validate([
            'nama_subkriteria' => 'required|max:25',
            'variabel' => 'required',
            'nilai' => 'required',
        ],[
            'nama_subkriteria.required' => "Nama Subkriteria harus diisi",
            'nama_subkriteria.max' => 'Maxsimal 25 karakter',
            'variabel.required' => 'Variabel harus di isi',
            'nilai.required' => "Nilai harus di isi",
        ]);

        $data =[
            'kriteria_id' => Request()->id_kriteria,
            'nama_subkriteria' => Request()->nama_subkriteria,
            'variabel' => Request()->variabel,
            'nilai' => Request()->nilai,
        ];

        $this->Subkriteria->addData($data);

        return redirect()->route('indexSubkriteria')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function editSubkriteria()
    {
        $subkriteria = Subkriteria::find(Request()->id);

        if(Request()->nama_subkriteria == $subkriteria->nama_subkriteria &&
        Request()->variabel == $subkriteria->variabel && Request()->nilai == $subkriteria->nilai){
            return redirect()->back()->with('warning', "Tidak ada data yang berubah");
        }

        Request()->validate([
            'nama_subkriteria' => 'required|max:25',
            'variabel' => 'required',
            'nilai' => 'required',
        ],[
            'nama_subkriteria.required' => "Nama Subkriteria harus diisi",
            'nama_subkriteria.max' => 'Maxsimal 25 karakter',
            'variabel.required' => 'Variabel harus di isi',
            'nilai.required' => "Nilai harus di isi",
        ]);

        $subkriteria->nama_subkriteria = Request()->nama_subkriteria;
        $subkriteria->variabel = Request()->variabel;
        $subkriteria->nilai = Request()->nilai;
        $subkriteria->save();

        return redirect()->route('indexSubkriteria')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    public function hapusSubkriteria(){
        $this->Subkriteria->DeleteData(Request()->id);

        return redirect()->route('indexSubkriteria')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
