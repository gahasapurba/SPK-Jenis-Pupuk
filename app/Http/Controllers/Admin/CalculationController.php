<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ui_value;
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
                // $normalisasiMatriks[$i][$j] = number_format($hasil, 3, '.', '');
                $normalisasiMatriks[$i][$j] = $hasil;
            }
        }

        // normalisasi matriks terbobot
        $normalisasiMatriksTerbobot = array();
        for($i = 0; $i < count($alternatif); $i++) {
            for($j = 0; $j < 6; $j++){
                $hasil = $normalisasiMatriks[$i][$j]*($criterias[$j]->weight);
                // $normalisasiMatriksTerbobot[$i][$j] = number_format($hasil, 3, '.', '');
                $normalisasiMatriksTerbobot[$i][$j] = $hasil;
            }
        }

        // Hitung Nilai Memaksimalkan S+
        $totolSPlus = array();
        for ($i = 0; $i < count($normalisasiMatriksTerbobot); $i++) {
            $sum = 0;
            for ($j = 0; $j < 5; $j++) {
                $sum += $normalisasiMatriksTerbobot[$i][$j];
            }
            // $totolSPlus [] = number_format($sum, 3, '.', '');
            $totolSPlus [] = $sum;
        }

        // Hitung Nilai Minimal S-
        $totolSNegartif = array();
        for ($i = 0; $i < count($normalisasiMatriksTerbobot); $i++) {
            $sum = 0;
            for ($j = 5; $j < 6; $j++) {
                $sum += $normalisasiMatriksTerbobot[$i][$j];
            }
            // $totolSNegartif [] = number_format($sum, 3, '.', '');
            $totolSNegartif [] = $sum;
        }

        // hitung bobot relatif
        // tahap 1 1/S-i
        $tahap1 = array();
        $jumlah1SMin = 0;
        for($i = 0; $i < count($totolSNegartif); $i++){
            $tahap1[$i] = 1/$totolSNegartif[$i];
            $jumlah1SMin += (1/$totolSNegartif[$i]);
        }

        // tahap dua
        $tahap2 = array();
        $jumlahSMin = 0;
        for($i = 0; $i < count($totolSNegartif); $i++){
            $tahap2[$i] = $jumlah1SMin*$normalisasiMatriksTerbobot[$i][5];
            $jumlahSMin += $normalisasiMatriksTerbobot[$i][5];
        }

        // tahap 3
        $tahap3 = array();
        for($i = 0; $i < count($tahap2); $i++){
            $tahap3[$i] = $jumlahSMin/$tahap2[$i];
        }

        // tahap 4
        $tahap4 = array();
        for($i = 0; $i < count($tahap3); $i++){
            $tahap4[$i] = $totolSPlus[$i]+$tahap3[$i];
        }

        $Qmax = max($tahap4);

         // HITUNG UTILITAS KUANTITATIF
        $ui = array();
        for($i = 0; $i < count($tahap4); $i++){
            $ui[$i] = ($tahap4[$i]*$Qmax);
        }

        DB::table('ui_value')->truncate();
        for($i = 0; $i < count($tahap4); $i++){
            $data = [
                'id_alternatives' => $alternatif[$i]->id,
                'spk_results' => $ui[$i],
            ];

            Ui_value::create($data);
        }

        $utilital_kuanti = DB::table('alternatives')
            ->join('ui_value', 'ui_value.id_alternatives', '=', 'alternatives.id')
            ->select(
                'alternatives.name as name',
                'ui_value.spk_results as spk_results',
            )
            ->orderBy('ui_value.spk_results', 'DESC')
            ->get();

        $data = [
            "matrix" => $transpose,
            "alternatif" => $alternatif,
            "criterias" => $criterias,
            "totalTiapColom" => $totalTiapColom,
            "normalisasiMatriks" => $normalisasiMatriks,
            "normalisasiMatriksTerbobot" => $normalisasiMatriksTerbobot,
            "totolSPlus" => $totolSPlus,
            "totolSNegartif" => $totolSNegartif,

            // hitung bobot relatif
            "tahap1" => $tahap1,
            "jumlah1SMin" => $jumlah1SMin,
            "tahap2" => $tahap2,
            "tahap3" => $tahap3,
            "tahap4" => $tahap4,
            "Qmax" => $Qmax,
            "ui" => $ui,
            "utilital_kuanti" => $utilital_kuanti,
        ];

        return view('pages.admin.calculation.index', $data);
    }
}
