<?php

namespace App\Http\Controllers\Admin;

use Hashids\Hashids;
use App\Models\Criteria;
use App\Models\Alternative;
use App\Models\Subcriteria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Admin\StoreAssessmentRequest;
use App\Http\Requests\Admin\UpdateAssessmentRequest;

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
                ->addColumn('price', function (Alternative $alternative) {
                    return 'Rp'.number_format($alternative->price, 0, ',', '.').',00';
                })
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
    public function show($assessment)
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
    public function edit($assessment)
    {
        $hash = new Hashids('', 10);
        $item = Alternative::findOrFail($hash->decodeHex($assessment));
        $soil_type_criteria = Criteria::where('name', 'Jenis Tanah')->first();
        $soil_types = Subcriteria::where('criteria_criterias_id', $soil_type_criteria->id)->get();

        return view('pages.admin.assessment.edit', [
            'hash' => $hash,
            'item' => $item,
            'soil_types' => $soil_types,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAssessmentRequest $request, $assessment)
    {
        $hash = new Hashids('', 10);
        $item = Alternative::findOrFail($hash->decodeHex($assessment));

        $data = [
            'soil_type' => $request->soil_type,
            'nitrogen' => $request->nitrogen,
            'phosphor' => $request->phosphor,
            'kalium' => $request->kalium,
            'price' => $request->price,
        ];

        $item->update($data);

        return redirect()->route('admin.assessment.index')->with('success', 'Penilaian Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($assessment)
    {
        $hash = new Hashids('', 10);
        $item = Alternative::findOrFail($hash->decodeHex($assessment));
        $item->delete();

        return redirect()->route('admin.assessment.index')->with('success', 'Penilaian Berhasil Dihapus!');
    }

    public function trash()
    {
        return view('pages.admin.assessment.trash');
    }

    public function trashAssessment()
    {
        if(request()->ajax())
        {
            $queryAssessment = Alternative::onlyTrashed()->orderBy('deleted_at', 'desc');
            $hash = new Hashids('', 10);

            return DataTables::of($queryAssessment)
                ->addColumn('deleted_at', function (Alternative $assessment) {
                    return $assessment->deleted_at->isoFormat('dddd, D MMMM Y, HH:mm:ss');
                })
                ->addColumn('restore', function($item) use($hash) {
                    return '
                        <div class="action">
                            <a class="text-warning admin-assessment-restore mx-auto" href="'.route('admin.assessment.restore', $hash->encodeHex($item->id)).'">
                                <i class="lni lni-spinner-arrow"></i>
                            </a>
                        </div>
                    ';
                })
                ->addColumn('kill', function($item) use($hash) {
                    return '
                        <div class="action">
                            <form class="mx-auto" method="POST" action="'.route('admin.assessment.kill', $hash->encodeHex($item->id)).'">
                                <input type="hidden" name="_token" value="'.csrf_token().'" />
                                <input type="hidden" name="_method" value="delete">
                                <button type="submit" class="text-danger admin-assessment-kill">
                                    <i class="lni lni-trash-can"></i>
                                </button>
                            </form>
                        </div>
                    ';
                })
                ->addIndexColumn()
                ->rawColumns(['restore', 'kill'])
                ->make();
        }
    }

    public function restore($assessment)
    {
        $hash = new Hashids('', 10);
        $item = Alternative::onlyTrashed()->findOrFail($hash->decodeHex($assessment));
        $item->restore();

        return redirect()->route('admin.assessment.trash')->with('success', 'Penilaian Berhasil Direstore!');
    }

    public function kill($assessment)
    {
        $hash = new Hashids('', 10);
        $item = Alternative::onlyTrashed()->findOrFail($hash->decodeHex($assessment));
        $item->forceDelete();

        return redirect()->route('admin.assessment.trash')->with('success', 'Penilaian Berhasil Dihapus Permanen!');
    }
}