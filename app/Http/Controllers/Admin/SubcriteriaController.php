<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Hashids\Hashids;
use App\Models\Subcriteria;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Admin\StoreSubcriteriaRequest;
use App\Http\Requests\Admin\UpdateSubcriteriaRequest;
use App\Models\Criteria;

class SubcriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.subcriteria.index');
    }

    public function listSubcriteria()
    {
        if(request()->ajax())
        {
            $querySubcriteria = Subcriteria::latest();
            $hash = new Hashids('', 10);

            return DataTables::of($querySubcriteria)
                ->addColumn('show', function($item) use($hash) {
                    return '
                        <div class="action">
                            <a class="text-info admin-subcriteria-show mx-auto" href="'.route('admin.subcriteria.show', $hash->encodeHex($item->id)).'">
                                <i class="lni lni-eye"></i>
                            </a>
                        </div>
                    ';
                })
                ->addColumn('edit', function($item) use($hash) {
                    return '
                        <div class="action">
                            <a class="text-warning admin-subcriteria-edit mx-auto" href="'.route('admin.subcriteria.edit', $hash->encodeHex($item->id)).'">
                                <i class="lni lni-cog"></i>
                            </a>
                        </div>
                    ';
                })
                ->addColumn('delete', function($item) use($hash) {
                    return '
                        <div class="action">
                            <form class="mx-auto" method="POST" action="'.route('admin.subcriteria.destroy', $hash->encodeHex($item->id)).'">
                                <input type="hidden" name="_token" value="'.csrf_token().'" />
                                <input type="hidden" name="_method" value="delete">
                                <button type="submit" class="text-danger admin-subcriteria-destroy">
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
        $hash = new Hashids('', 10);
        $criterias = Criteria::all();

        return view('pages.admin.subcriteria.create',[
            'hash' => $hash,
            'criterias' => $criterias,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubcriteriaRequest $request)
    {
        $hash = new Hashids('', 10);

        $data = [
            'criteria_criterias_id' => $hash->decodeHex($request->criteria_criterias_id),
            'name' => $request->name,
            'variable' => $request->variable,
            'value' => $request->value,
        ];

        Subcriteria::create($data);

        return redirect()->route('admin.subcriteria.index')->with('success', 'Subkriteria Berhasil Dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show($subcriteria)
    {
        $hash = new Hashids('', 10);
        $item = Subcriteria::findOrFail($hash->decodeHex($subcriteria));

        return view('pages.admin.subcriteria.show', [
            'item' => $item,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($subcriteria)
    {
        $hash = new Hashids('', 10);
        $item = Subcriteria::findOrFail($hash->decodeHex($subcriteria));
        $criterias = Criteria::all();

        return view('pages.admin.subcriteria.edit', [
            'hash' => $hash,
            'item' => $item,
            'criterias' => $criterias,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubcriteriaRequest $request, $subcriteria)
    {
        $hash = new Hashids('', 10);
        $item = Subcriteria::findOrFail($hash->decodeHex($subcriteria));

        $data = [
            'name' => $request->name,
            'variable' => $request->variable,
            'value' => $request->value,
        ];

        $item->update($data);

        return redirect()->route('admin.subcriteria.index')->with('success', 'Subkriteria Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($subcriteria)
    {
        $hash = new Hashids('', 10);
        $item = Subcriteria::findOrFail($hash->decodeHex($subcriteria));
        $item->delete();

        return redirect()->route('admin.subcriteria.index')->with('success', 'Subkriteria Berhasil Dihapus!');
    }

    public function trash()
    {
        return view('pages.admin.subcriteria.trash');
    }

    public function trashSubcriteria()
    {
        if(request()->ajax())
        {
            $querySubcriteria = Subcriteria::onlyTrashed()->orderBy('deleted_at', 'desc');
            $hash = new Hashids('', 10);

            return DataTables::of($querySubcriteria)
                ->addColumn('deleted_at', function (Subcriteria $subcriteria) {
                    return $subcriteria->deleted_at->isoFormat('dddd, D MMMM Y, HH:mm:ss');
                })
                ->addColumn('restore', function($item) use($hash) {
                    return '
                        <div class="action">
                            <a class="text-warning admin-subcriteria-restore mx-auto" href="'.route('admin.subcriteria.restore', $hash->encodeHex($item->id)).'">
                                <i class="lni lni-spinner-arrow"></i>
                            </a>
                        </div>
                    ';
                })
                ->addColumn('kill', function($item) use($hash) {
                    return '
                        <div class="action">
                            <form class="mx-auto" method="POST" action="'.route('admin.subcriteria.kill', $hash->encodeHex($item->id)).'">
                                <input type="hidden" name="_token" value="'.csrf_token().'" />
                                <input type="hidden" name="_method" value="delete">
                                <button type="submit" class="text-danger admin-subcriteria-kill">
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

    public function restore($subcriteria)
    {
        $hash = new Hashids('', 10);
        $item = Subcriteria::onlyTrashed()->findOrFail($hash->decodeHex($subcriteria));
        $item->restore();

        return redirect()->route('admin.subcriteria.trash')->with('success', 'Subkriteria Berhasil Direstore!');
    }

    public function kill($subcriteria)
    {
        $hash = new Hashids('', 10);
        $item = Subcriteria::onlyTrashed()->findOrFail($hash->decodeHex($subcriteria));
        $item->forceDelete();

        return redirect()->route('admin.subcriteria.trash')->with('success', 'Subkriteria Berhasil Dihapus Permanen!');
    }
}