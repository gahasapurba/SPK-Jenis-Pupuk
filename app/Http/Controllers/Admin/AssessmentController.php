<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Hashids\Hashids;
use App\Models\Alternative;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreAlternativeRequest;
use App\Http\Requests\UpdateAlternativeRequest;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.assessment.index');
    }

    public function listAssessment()
    {
        if(request()->ajax())
        {
            $queryAssessment = Alternative::latest();
            $hash = new Hashids('', 10);

            return DataTables::of($queryAssessment)
                ->addColumn('show', function($item) use($hash) {
                    return '
                        <div class="action">
                            <a class="text-info admin-assessment-show mx-auto" href="'.route('admin.assessment.show', $hash->encodeHex($item->id)).'">
                                <i class="lni lni-eye"></i>
                            </a>
                        </div>
                    ';
                })
                ->addColumn('edit', function($item) use($hash) {
                    return '
                        <div class="action">
                            <a class="text-warning admin-assessment-edit mx-auto" href="'.route('admin.assessment.edit', $hash->encodeHex($item->id)).'">
                                <i class="lni lni-cog"></i>
                            </a>
                        </div>
                    ';
                })
                ->addColumn('delete', function($item) use($hash) {
                    return '
                        <div class="action">
                            <form class="mx-auto" method="POST" action="'.route('admin.assessment.destroy', $hash->encodeHex($item->id)).'">
                                <input type="hidden" name="_token" value="'.csrf_token().'" />
                                <input type="hidden" name="_method" value="delete">
                                <button type="submit" class="text-danger admin-assessment-destroy">
                                    <i class="lni lni-trash-can"></i>
                                </button>
                            </form>
                        </div>
                    ';
                })
                ->addIndexColumn()
                ->rawColumns(['show', 'edit', 'delete'])
                ->make();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.assessment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlternativeRequest $request)
    {
        $data = [
            'rainfall' => $request->rainfall,
            'soil_type' => $request->soil_type,
            'nitrogen' => $request->nitrogen,
            'phospor' => $request->phospor,
            'kalium' => $request->kalium,
            'price' => $request->price,
        ];

        Alternative::create($data);

        return redirect()->route('admin.assessment.index')->with('success', 'Penilaian Berhasil Dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alternative $assessment)
    {
        $hash = new Hashids('', 10);
        $item = Alternative::findOrFail($hash->decodeHex($assessment));

        return view('pages.admin.assessment.show', [
            'item' => $item,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alternative $assessment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlternativeRequest $request, Alternative $assessment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alternative $assessment)
    {
        //
    }

    public function trash()
    {
        //
    }

    public function trashAssessment()
    {
        //
    }

    public function restore($assessment)
    {
        //
    }

    public function kill($assessment)
    {
        //
    }
}