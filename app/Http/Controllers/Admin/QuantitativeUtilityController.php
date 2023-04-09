<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\QuantitativeUtility;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class QuantitativeUtilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.quantitative_utility.index');
    }

    public function listQuantitativeUtility()
    {
        if(request()->ajax())
        {
            $queryQuantitativeUtility = QuantitativeUtility::orderByDesc('result');

            return DataTables::of($queryQuantitativeUtility)
                ->addColumn('alternative_alternatives_id', function (QuantitativeUtility $quantitative_utility) {
                    return $quantitative_utility->alternative->name;
                })
                ->addIndexColumn()
                ->make();
        }
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
    public function show(QuantitativeUtility $quantitativeUtility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QuantitativeUtility $quantitativeUtility)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QuantitativeUtility $quantitativeUtility)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QuantitativeUtility $quantitativeUtility)
    {
        //
    }
}
