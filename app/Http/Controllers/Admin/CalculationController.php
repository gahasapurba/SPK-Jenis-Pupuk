<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CalculationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index(){
        $arrayCurahHujan = array();
        $arrayKandunganN = array();
        $arrayKandunganK = array();
        $arrayKandunganP = array();
        $arrayJenisTanah = array();
        $arrayHarga = array();

        $dataAlternatifCurahHujan = DB::table('alternatives')->select('rainfall')->orderBy("id", "asc")->get();
        $dataAlternatifJenisTanah = DB::table('alternatives')->select('soil_type')->orderBy("id", "asc")->get();
        $dataAlternatifKandunganN = DB::table('alternatives')->select('nitrogen')->orderBy("id", "asc")->get();
        $dataAlternatifKandunganP = DB::table('alternatives')->select('phosphor')->orderBy("id", "asc")->get();
        $dataAlternatifKandunganK = DB::table('alternatives')->select('kalium')->orderBy("id", "asc")->get();
        $dataAlternatifHarga = DB::table('alternatives')->select('price')->orderBy("id", "asc")->get();

        // fuzifikasi curah hujan
        for($i = 0; $i < count($dataAlternatifCurahHujan); $i++) {
            if($dataAlternatifCurahHujan[$i]->rainfall > 0.5 && $dataAlternatifCurahHujan[$i]->rainfall < 20){
                $arrayCurahHujan[$i] = 1;
            }else if($dataAlternatifCurahHujan[$i]->rainfall >= 20 && $dataAlternatifCurahHujan[$i]->rainfall < 50){
                $arrayCurahHujan[$i] = 2;
            }else if($dataAlternatifCurahHujan[$i]->rainfall >= 50 && $dataAlternatifCurahHujan[$i]->rainfall < 100){
                $arrayCurahHujan[$i] = 3;
            }else if($dataAlternatifCurahHujan[$i]->rainfall >= 100 && $dataAlternatifCurahHujan[$i]->rainfall <= 150){
                $arrayCurahHujan[$i] = 4;
            }else if($dataAlternatifCurahHujan[$i]->rainfall > 150){
                $arrayCurahHujan[$i] = 5;
            }
        }

        // fuzifikasi jenis tanah
        for($i = 0; $i < count($dataAlternatifJenisTanah); $i++){
            if($dataAlternatifJenisTanah[$i]->soil_type == "Basah"){
                $arrayJenisTanah[$i] = 2;
            }else if($dataAlternatifJenisTanah[$i]->soil_type == "Kering"){
                $arrayJenisTanah[$i] = 3;
            }else if($dataAlternatifJenisTanah[$i]->soil_type == "Lembab"){
                $arrayJenisTanah[$i] = 5;
            }
        }

        // fuzifikasi kandungan N
        for($i = 0; $i < count($dataAlternatifKandunganN); $i++){
            if($dataAlternatifKandunganN[$i]->nitrogen >= 0 && $dataAlternatifKandunganN[$i]->nitrogen < 1){
                $arrayKandunganN[$i] = 1;
            }else if($dataAlternatifKandunganN[$i]->nitrogen >= 1 && $dataAlternatifKandunganN[$i]->nitrogen < 10){
                $arrayKandunganN[$i] = 2;
            }else if($dataAlternatifKandunganN[$i]->nitrogen >= 10 && $dataAlternatifKandunganN[$i]->nitrogen < 25){
                $arrayKandunganN[$i] = 3;
            }else if($dataAlternatifKandunganN[$i]->nitrogen >= 25 && $dataAlternatifKandunganN[$i]->nitrogen < 45){
                $arrayKandunganN[$i] = 4;
            }else if($dataAlternatifKandunganN[$i]->nitrogen >= 45){
                $arrayKandunganN[$i] = 5;
            }
        }

        // fuzifikasi kandungan P
        for($i = 0; $i < count($dataAlternatifKandunganP); $i++){
            if($dataAlternatifKandunganP[$i]->phosphor < 6){
                $arrayKandunganP[$i] = 1;
            }else if($dataAlternatifKandunganP[$i]->phosphor >= 6 && $dataAlternatifKandunganP[$i]->phosphor <= 20){
                $arrayKandunganP[$i] = 2;
            }else if($dataAlternatifKandunganP[$i]->phosphor >= 21 && $dataAlternatifKandunganP[$i]->phosphor <= 30){
                $arrayKandunganP[$i] = 3;
            }else if($dataAlternatifKandunganP[$i]->phosphor >= 31 && $dataAlternatifKandunganP[$i]->phosphor <= 46){
                $arrayKandunganP[$i] = 4;
            }else if($dataAlternatifKandunganP[$i]->phosphor > 46){
                $arrayKandunganP[$i] = 5;
            }
        }

        // fuzifikasi kandungan K
        for($i = 0; $i < count($dataAlternatifKandunganK); $i++){
            if($dataAlternatifKandunganK[$i]->kalium == 0){
                $arrayKandunganK[$i] = 1;
            }else if($dataAlternatifKandunganK[$i]->kalium >= 1 && $dataAlternatifKandunganK[$i]->kalium <= 15){
                $arrayKandunganK[$i] = 2;
            }else if($dataAlternatifKandunganK[$i]->kalium >= 16 && $dataAlternatifKandunganK[$i]->kalium <= 30){
                $arrayKandunganK[$i] = 3;
            }else if($dataAlternatifKandunganK[$i]->kalium >= 31 && $dataAlternatifKandunganK[$i]->kalium <= 45){
                $arrayKandunganK[$i] = 4;
            }else if($dataAlternatifKandunganK[$i]->kalium > 45){
                $arrayKandunganK[$i] = 5;
            }
        }

        // fuzifikasi harga
        for($i = 0; $i < count($dataAlternatifHarga); $i++){
            if($dataAlternatifHarga[$i]->price < 2800){
                $arrayHarga[$i] = 1;
            }else if($dataAlternatifHarga[$i]->price >= 2800 && $dataAlternatifHarga[$i]->price < 7200){
                $arrayHarga[$i] = 2;
            }else if($dataAlternatifHarga[$i]->price >= 7200 && $dataAlternatifHarga[$i]->price < 11600){
                $arrayHarga[$i] = 3;
            }else if($dataAlternatifHarga[$i]->price >= 11600 && $dataAlternatifHarga[$i]->price <= 16000){
                $arrayHarga[$i] = 4;
            }else if($dataAlternatifHarga[$i]->price > 16000){
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
        $alternatif = DB::table('alternatives')->orderBy("id", "asc")->get();
        $criterias = DB::table('criterias')->orderBy("id", "asc")->get();

        foreach ($matrix as $row) {
            $totalTiapColom[] = array_sum($row);
        }

        $transpose = array_map(null, ...$matrix);

        // normalisasi matriks
        $normalisasiMatriks = array();
        for($i = 0; $i < count($alternatif); $i++) {
            for($j = 0; $j < 6; $j++){
                $hasil = $transpose[$i][$j]/$totalTiapColom[$j];
                $normalisasiMatriks[$i][$j] = number_format($hasil, 3, '.', '');
            }
        }

        // normalisasi matriks terbobot
        $normalisasiMatriksTerbobot = array();
        for($i = 0; $i < count($alternatif); $i++) {
            for($j = 0; $j < 6; $j++){
                $hasil = $normalisasiMatriks[$i][$j]*($criterias[$j]->weight);
                $normalisasiMatriksTerbobot[$i][$j] = number_format($hasil, 3, '.', '');
            }
        }


        $data = [
            "matrix" => $transpose,
            "alternatif" => $alternatif,
            "criterias" => $criterias,
            "totalTiapColom" => $totalTiapColom,
            "normalisasiMatriks" => $normalisasiMatriks,
        ];

        return view('pages.admin.calculation.index', $data);
    }
}
