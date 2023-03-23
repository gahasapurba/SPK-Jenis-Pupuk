<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataKriteriaController extends Controller
{
    public function index()
    {
        return view('pages.admin.dataKriteria.index');
    }

    public function addDataKriteria()
    {
        return view('pages.admin.dataKriteria.add');
    }

    public function editDataKriteria()
    {
        return view('pages.admin.dataKriteria.edit');
    }

    public function ProsesTambahDataKriteria()
    {
        return redirect()->route('indexDataKriteria')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function ProsesEditDataKriteria()
    {
        return redirect()->route('indexDataKriteria')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    public function hapusData()
    {
        return redirect()->route('indexDataKriteria')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
