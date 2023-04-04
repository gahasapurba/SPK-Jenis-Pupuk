<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Criteria;
use App\Models\Subcriteria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Alternative;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_count = User::where('is_admin', false)->count();
        $criteria_count = Criteria::count();
        $subcriteria_count = Subcriteria::count();
        $alternative_count = Alternative::count();

        return view('pages.dashboard.dashboard',[
            'user_count' => $user_count,
            'criteria_count' => $criteria_count,
            'subcriteria_count' => $subcriteria_count,
            'alternative_count' => $alternative_count,
        ]);
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
