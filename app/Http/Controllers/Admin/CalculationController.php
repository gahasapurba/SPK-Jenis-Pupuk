<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use App\Models\Subkriteria;
use App\Models\Kriteria;

class CalculationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->Alternatif = new Alternatif();
        $this->Kriteria = new Kriteria();
        $this->Subkriteria = new Subkriteria();
    }

    function prosesAmbildataSubkriteria(){
        $arrayCurahHujan = array();
        $arrayKandunganN = array();
        $arrayKandunganK = array();
        $arrayKandunganP = array();
        $arrayJenisTanah = array();
        $arrayHarga = array();

        $dataAlternatifCurahHujan = $this->Alternatif->dataAlternatif("curah_hujan");
        $dataAlternatifKandunganN = $this->Alternatif->dataAlternatif("kandungan_n");
        $dataAlternatifKandunganP = $this->Alternatif->dataAlternatif("kandungan_p");
        $dataAlternatifKandunganK = $this->Alternatif->dataAlternatif("kandungan_k");
        $dataAlternatifJenisTanah = $this->Alternatif->dataAlternatif("jenis_tanah");
        $dataAlternatifHarga = $this->Alternatif->dataAlternatif("harga");

        // fuzifikasi curah hujan
        for($i = 0; $i < count($dataAlternatifCurahHujan); $i++) {
            if($dataAlternatifCurahHujan[$i]->curah_hujan > 0.5 && $dataAlternatifCurahHujan[$i]->curah_hujan < 20){
                $arrayCurahHujan[$i] = 1;
            }else if($dataAlternatifCurahHujan[$i]->curah_hujan >= 20 && $dataAlternatifCurahHujan[$i]->curah_hujan < 50){
                $arrayCurahHujan[$i] = 2;
            }else if($dataAlternatifCurahHujan[$i]->curah_hujan >= 50 && $dataAlternatifCurahHujan[$i]->curah_hujan < 100){
                $arrayCurahHujan[$i] = 3;
            }else if($dataAlternatifCurahHujan[$i]->curah_hujan >= 100 && $dataAlternatifCurahHujan[$i]->curah_hujan <= 150){
                $arrayCurahHujan[$i] = 4;
            }else if($dataAlternatifCurahHujan[$i]->curah_hujan > 150){
                $arrayCurahHujan[$i] = 5;
            }
        }

        // fuzifikasi kandungan N
        for($i = 0; $i < count($dataAlternatifKandunganN); $i++){
            if($dataAlternatifKandunganN[$i]->kandungan_n >= 0 && $dataAlternatifKandunganN[$i]->kandungan_n < 1){
                $arrayKandunganN[$i] = 1;
            }else if($dataAlternatifKandunganN[$i]->kandungan_n >= 1 && $dataAlternatifKandunganN[$i]->kandungan_n < 10){
                $arrayKandunganN[$i] = 2;
            }else if($dataAlternatifKandunganN[$i]->kandungan_n >= 10 && $dataAlternatifKandunganN[$i]->kandungan_n < 25){
                $arrayKandunganN[$i] = 3;
            }else if($dataAlternatifKandunganN[$i]->kandungan_n >= 25 && $dataAlternatifKandunganN[$i]->kandungan_n < 45){
                $arrayKandunganN[$i] = 4;
            }else if($dataAlternatifKandunganN[$i]->kandungan_n >= 45){
                $arrayKandunganN[$i] = 5;
            }
        }

        // fuzifikasi kandungan P
        for($i = 0; $i < count($dataAlternatifKandunganP); $i++){
            if($dataAlternatifKandunganP[$i]->kandungan_p < 6){
                $arrayKandunganP[$i] = 1;
            }else if($dataAlternatifKandunganP[$i]->kandungan_p >= 6 && $dataAlternatifKandunganP[$i]->kandungan_p <= 20){
                $arrayKandunganP[$i] = 2;
            }else if($dataAlternatifKandunganP[$i]->kandungan_p >= 21 && $dataAlternatifKandunganP[$i]->kandungan_p <= 30){
                $arrayKandunganP[$i] = 3;
            }else if($dataAlternatifKandunganP[$i]->kandungan_p >= 31 && $dataAlternatifKandunganP[$i]->kandungan_p <= 46){
                $arrayKandunganP[$i] = 4;
            }else if($dataAlternatifKandunganP[$i]->kandungan_p > 46){
                $arrayKandunganP[$i] = 5;
            }
        }

        // fuzifikasi kandungan K
        for($i = 0; $i < count($dataAlternatifKandunganK); $i++){
            if($dataAlternatifKandunganK[$i]->kandungan_k == 0){
                $arrayKandunganK[$i] = 1;
            }else if($dataAlternatifKandunganK[$i]->kandungan_k >= 1 && $dataAlternatifKandunganK[$i]->kandungan_k <= 15){
                $arrayKandunganK[$i] = 2;
            }else if($dataAlternatifKandunganK[$i]->kandungan_k >= 16 && $dataAlternatifKandunganK[$i]->kandungan_k <= 30){
                $arrayKandunganK[$i] = 3;
            }else if($dataAlternatifKandunganK[$i]->kandungan_k >= 31 && $dataAlternatifKandunganK[$i]->kandungan_k <= 45){
                $arrayKandunganK[$i] = 4;
            }else if($dataAlternatifKandunganK[$i]->kandungan_k > 45){
                $arrayKandunganK[$i] = 5;
            }
        }

        // fuzifikasi jenis tanah
        for($i = 0; $i < count($dataAlternatifJenisTanah); $i++){
            if($dataAlternatifJenisTanah[$i]->jenis_tanah == "Basah"){
                $arrayJenisTanah[$i] = 2;
            }else if($dataAlternatifJenisTanah[$i]->jenis_tanah == "Kering"){
                $arrayJenisTanah[$i] = 3;
            }else if($dataAlternatifJenisTanah[$i]->jenis_tanah == "Lembab"){
                $arrayJenisTanah[$i] = 5;
            }
        }

        // fuzifikasi harga
        for($i = 0; $i < count($dataAlternatifHarga); $i++){
            if($dataAlternatifHarga[$i]->harga < 2800){
                $arrayHarga[$i] = 1;
            }else if($dataAlternatifHarga[$i]->harga >= 2800 && $dataAlternatifHarga[$i]->harga < 7200){
                $arrayHarga[$i] = 2;
            }else if($dataAlternatifHarga[$i]->harga >= 7200 && $dataAlternatifHarga[$i]->harga < 11600){
                $arrayHarga[$i] = 3;
            }else if($dataAlternatifHarga[$i]->harga >= 11600 && $dataAlternatifHarga[$i]->harga <= 16000){
                $arrayHarga[$i] = 4;
            }else if($dataAlternatifHarga[$i]->harga > 16000){
                $arrayHarga[$i] = 5;
            }
        }

        $matrix = array(); // array kosong untuk menampung matriks

        // menggabungkan array a, b, dan c menjadi matriks 2 dimensi
        array_push($matrix, $arrayCurahHujan);
        array_push($matrix, $arrayJenisTanah);
        array_push($matrix, $arrayKandunganN);
        array_push($matrix, $arrayKandunganP);
        array_push($matrix, $arrayKandunganK);
        array_push($matrix, $arrayHarga);

        $totalTiapColom = array();
        $alternatif = $this->Alternatif->getData();

        foreach ($matrix as $row) {
            $totalTiapColom[] = array_sum($row);
        }

        $transpose = array_map(null, ...$matrix);
        $data = [
            "matrix" => $transpose,
            "alternatif" => $alternatif,
            "totalTiapColom" => $totalTiapColom,
        ];

        return view('pages.admin.calculation.index', $data);
    }
}
