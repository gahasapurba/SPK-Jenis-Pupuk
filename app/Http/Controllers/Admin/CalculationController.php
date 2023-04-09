<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\QuantitativeUtility;

class CalculationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $arrayCurahHujan = array();
        $arrayJenisTanah = array();
        $arrayKandunganN = array();
        $arrayKandunganP = array();
        $arrayKandunganK = array();
        $arrayHarga = array();

        $dataAlternatifCurahHujan = DB::table('alternatives')->select('rainfall')->orderBy("id", "asc")->get();
        $dataAlternatifJenisTanah = DB::table('alternatives')->select('soil_type')->orderBy("id", "asc")->get();
        $dataAlternatifKandunganN = DB::table('alternatives')->select('nitrogen')->orderBy("id", "asc")->get();
        $dataAlternatifKandunganP = DB::table('alternatives')->select('phosphor')->orderBy("id", "asc")->get();
        $dataAlternatifKandunganK = DB::table('alternatives')->select('kalium')->orderBy("id", "asc")->get();
        $dataAlternatifHarga = DB::table('alternatives')->select('price')->orderBy("id", "asc")->get();

        // Fuzifikasi Curah Hujan
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

        // Fuzifikasi Jenis Tanah
        for($i = 0; $i < count($dataAlternatifJenisTanah); $i++){
            if($dataAlternatifJenisTanah[$i]->soil_type == "Basah"){
                $arrayJenisTanah[$i] = 2;
            }else if($dataAlternatifJenisTanah[$i]->soil_type == "Kering"){
                $arrayJenisTanah[$i] = 3;
            }else if($dataAlternatifJenisTanah[$i]->soil_type == "Lembab"){
                $arrayJenisTanah[$i] = 5;
            }
        }

        // Fuzifikasi Kandungan N
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

        // Fuzifikasi Kandungan P
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

        // Fuzifikasi Kandungan K
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

        // Fuzifikasi Harga
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

        $matrix = array(); // Array Kosong Untuk Menampung Matriks

        // Menggabungkan Array a, b, dan c Menjadi Matriks 2 Dimensi
        array_push($matrix, $arrayCurahHujan);
        array_push($matrix, $arrayJenisTanah);
        array_push($matrix, $arrayKandunganN);
        array_push($matrix, $arrayKandunganP);
        array_push($matrix, $arrayKandunganK);
        array_push($matrix, $arrayHarga);

        $totalTiapKolom = array();
        $alternatives = DB::table('alternatives')->orderBy("id", "asc")->get();
        $criterias = DB::table('criterias')->orderBy("id", "asc")->get();

        foreach ($matrix as $row) {
            $totalTiapKolom[] = array_sum($row);
        }

        $transpose = array_map(null, ...$matrix);

        // Normalisasi Matriks
        $normalisasiMatriks = array();
        for($i = 0; $i < count($alternatives); $i++) {
            for($j = 0; $j < 6; $j++){
                $hasil = $transpose[$i][$j]/$totalTiapKolom[$j];
                $normalisasiMatriks[$i][$j] = $hasil;
            }
        }

        // Normalisasi Matriks Terbobot
        $normalisasiMatriksTerbobot = array();
        for($i = 0; $i < count($alternatives); $i++) {
            for($j = 0; $j < 6; $j++){
                $hasil = $normalisasiMatriks[$i][$j]*($criterias[$j]->weight);
                $normalisasiMatriksTerbobot[$i][$j] = $hasil;
            }
        }

        // Hitung Nilai Memaksimalkan S+
        $totalSPlus = array();
        for ($i = 0; $i < count($normalisasiMatriksTerbobot); $i++) {
            $sum = 0;
            for ($j = 0; $j < 5; $j++) {
                $sum += $normalisasiMatriksTerbobot[$i][$j];
            }
            $totalSPlus [] = $sum;
        }

        // Hitung Nilai Minimal S-
        $totalSNegatif = array();
        for ($i = 0; $i < count($normalisasiMatriksTerbobot); $i++) {
            $sum = 0;
            for ($j = 5; $j < 6; $j++) {
                $sum += $normalisasiMatriksTerbobot[$i][$j];
            }
            $totalSNegatif [] = $sum;
        }

        // Menghitung Bobot Relatif
        // Tahap 1
        $tahap1 = array();
        $jumlah1SMin = 0;
        for($i = 0; $i < count($totalSNegatif); $i++){
            $tahap1[$i] = 1/$totalSNegatif[$i];
            $jumlah1SMin += (1/$totalSNegatif[$i]);
        }

        // Tahap 2
        $tahap2 = array();
        $jumlahSMin = 0;
        for($i = 0; $i < count($totalSNegatif); $i++){
            $tahap2[$i] = $jumlah1SMin*$normalisasiMatriksTerbobot[$i][5];
            $jumlahSMin += $normalisasiMatriksTerbobot[$i][5];
        }

        // Tahap 3
        $tahap3 = array();
        for($i = 0; $i < count($tahap2); $i++){
            $tahap3[$i] = $jumlahSMin/$tahap2[$i];
        }

        // Tahap 4
        $tahap4 = array();
        for($i = 0; $i < count($tahap3); $i++){
            $tahap4[$i] = $totalSPlus[$i]+$tahap3[$i];
        }

        $Qmax = max($tahap4);

        // Menghitung Utilitas Kuantitatif
        $quantitative_utility = array();
        for($i = 0; $i < count($tahap4); $i++){
            $quantitative_utility[$i] = ($tahap4[$i]/$Qmax)*100;
        }
        // dd($quantitative_utility);
        DB::table('quantitative_utilities')->truncate();
        for($i = 0; $i < count($tahap4); $i++){
            $data = [
                'alternative_alternatives_id' => $alternatives[$i]->id,
                'result' => $quantitative_utility[$i],
            ];

            QuantitativeUtility::create($data);
        }

        $utilitas_kuantitatif = DB::table('alternatives')
            ->join('quantitative_utilities', 'quantitative_utilities.alternative_alternatives_id', '=', 'alternatives.id')
            ->select(
                'alternatives.name as name',
                'quantitative_utilities.result as result',
            )
            ->orderBy('quantitative_utilities.result', 'DESC')
            ->get();

        $data = [
            "matrix" => $transpose,
            "alternatives" => $alternatives,
            "criterias" => $criterias,
            "totalTiapKolom" => $totalTiapKolom,
            "normalisasiMatriks" => $normalisasiMatriks,
            "normalisasiMatriksTerbobot" => $normalisasiMatriksTerbobot,
            "totalSPlus" => $totalSPlus,
            "totalSNegatif" => $totalSNegatif,

            // Penghitungan Bobot Relatif
            "tahap1" => $tahap1,
            "tahap2" => $tahap2,
            "tahap3" => $tahap3,
            "tahap4" => $tahap4,
            "jumlah1SMin" => $jumlah1SMin,
            "Qmax" => $Qmax,
            "quantitative_utility" => $quantitative_utility,
            "utilitas_kuantitatif" => $utilitas_kuantitatif,
        ];

        return view('pages.admin.calculation.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
