<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Hashids\Hashids;
use App\Models\Criteria;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreCriteriaRequest;
use App\Http\Requests\UpdateCriteriaRequest;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.criteria.index');
    }

    public function listCriteria()
    {
        if(request()->ajax())
        {
            $queryCriteria = Criteria::latest();
            $hash = new Hashids('', 10);

            return DataTables::of($queryCriteria)
                ->addColumn('show', function($item) use($hash) {
                    return '
                        <div class="action">
                            <a class="text-info admin-criteria-show mx-auto" href="'.route('admin.criteria.show', $hash->encodeHex($item->id)).'">
                                <i class="lni lni-eye"></i>
                            </a>
                        </div>
                    ';
                })
                ->addColumn('edit', function($item) use($hash) {
                    return '
                        <div class="action">
                            <a class="text-warning admin-criteria-edit mx-auto" href="'.route('admin.criteria.edit', $hash->encodeHex($item->id)).'">
                                <i class="lni lni-cog"></i>
                            </a>
                        </div>
                    ';
                })
                ->addColumn('delete', function($item) use($hash) {
                    return '
                        <div class="action">
                            <form class="mx-auto" method="POST" action="'.route('admin.criteria.destroy', $hash->encodeHex($item->id)).'">
                                <input type="hidden" name="_token" value="'.csrf_token().'" />
                                <input type="hidden" name="_method" value="delete">
                                <button type="submit" class="text-danger admin-criteria-destroy">
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
        return view('pages.admin.criteria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCriteriaRequest $request)
    {
        $data = [
            'code' => $request->code,
            'name' => $request->name,
            'weight' => $request->weight,
            'type' => $request->type,
        ];

        Criteria::create($data);

        return redirect()->route('admin.criteria.index')->with('success', 'Kriteria Berhasil Dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Criteria $criteria)
    {
        $hash = new Hashids('', 10);
        $item = Criteria::findOrFail($hash->decodeHex($criteria));

        return view('pages.admin.criteria.show', [
            'item' => $item,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Criteria $criteria)
    {
        $hash = new Hashids('', 10);
        $item = Criteria::findOrFail($hash->decodeHex($criteria));

        return view('pages.admin.criteria.edit', [
            'hash' => $hash,
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCriteriaRequest $request, Criteria $criteria)
    {
        $hash = new Hashids('', 10);
        $item = Criteria::findOrFail($hash->decodeHex($criteria));

        $data = [
            'code' => $request->code,
            'name' => $request->name,
            'weight' => $request->weight,
            'type' => $request->type,
        ];

        $item->update($data);

        return redirect()->route('admin.criteria.index')->with('success', 'Kriteria Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Criteria $criteria)
    {
        $hash = new Hashids('', 10);
        $item = Criteria::findOrFail($hash->decodeHex($criteria));
        $item->delete();

        return redirect()->route('admin.criteria.index')->with('success', 'Kriteria Berhasil Dihapus!');
    }

    public function trash()
    {
        return view('pages.admin.criteria.trash');
    }

    public function trashCriteria()
    {
        if(request()->ajax())
        {
            $queryCriteria = Criteria::onlyTrashed()->orderBy('deleted_at', 'desc');
            $hash = new Hashids('', 10);

            return DataTables::of($queryCriteria)
                ->addColumn('deleted_at', function (Criteria $criteria) {
                    return $criteria->deleted_at->isoFormat('dddd, D MMMM Y, HH:mm:ss');
                })
                ->addColumn('restore', function($item) use($hash) {
                    return '
                        <div class="action">
                            <a class="text-warning admin-criteria-restore mx-auto" href="'.route('admin.criteria.restore', $hash->encodeHex($item->id)).'">
                                <i class="lni lni-spinner-arrow"></i>
                            </a>
                        </div>
                    ';
                })
                ->addColumn('kill', function($item) use($hash) {
                    return '
                        <div class="action">
                            <form class="mx-auto" method="POST" action="'.route('admin.criteria.kill', $hash->encodeHex($item->id)).'">
                                <input type="hidden" name="_token" value="'.csrf_token().'" />
                                <input type="hidden" name="_method" value="delete">
                                <button type="submit" class="text-danger admin-criteria-kill">
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

    public function restore($criteria)
    {
        $hash = new Hashids('', 10);
        $item = Criteria::onlyTrashed()->findOrFail($hash->decodeHex($criteria));
        $item->restore();

        return redirect()->route('admin.criteria.trash')->with('success', 'Kriteria Berhasil Direstore!');
    }

    public function kill($criteria)
    {
        $hash = new Hashids('', 10);
        $item = Criteria::onlyTrashed()->findOrFail($hash->decodeHex($criteria));
        $item->forceDelete();

        return redirect()->route('admin.criteria.trash')->with('success', 'Kriteria Berhasil Dihapus Permanen!');
    }
}