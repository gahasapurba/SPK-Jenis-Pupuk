<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alternative;
use App\Http\Requests\StoreAlternativeRequest;
use App\Http\Requests\UpdateAlternativeRequest;
use Hashids\Hashids;
use Yajra\DataTables\Facades\DataTables;

class AlternativeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.alternative.index');
    }

    public function listAlternative()
    {
        if(request()->ajax())
        {
            $queryAlternative = Alternative::latest();
            $hash = new Hashids('', 10);

            return DataTables::of($queryAlternative)
                ->addColumn('show', function($item) use($hash) {
                    return '
                        <div class="action">
                            <a class="text-info admin-alternative-show mx-auto" href="'.route('admin.alternative.show', $hash->encodeHex($item->id)).'">
                                <i class="lni lni-eye"></i>
                            </a>
                        </div>
                    ';
                })
                ->addColumn('edit', function($item) use($hash) {
                    return '
                        <div class="action">
                            <a class="text-warning admin-alternative-edit mx-auto" href="'.route('admin.alternative.edit', $hash->encodeHex($item->id)).'">
                                <i class="lni lni-cog"></i>
                            </a>
                        </div>
                    ';
                })
                ->addColumn('delete', function($item) use($hash) {
                    return '
                        <div class="action">
                            <form class="mx-auto" method="POST" action="'.route('admin.alternative.destroy', $hash->encodeHex($item->id)).'">
                                <input type="hidden" name="_token" value="'.csrf_token().'" />
                                <input type="hidden" name="_method" value="delete">
                                <button type="submit" class="text-danger admin-alternative-destroy">
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
        return view('pages.admin.alternative.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlternativeRequest $request)
    {
        $data = [
            'name' => $request->name,
        ];

        Alternative::create($data);

        return redirect()->route('admin.alternative.index')->with('success', 'Alternatif Berhasil Dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alternative $alternative)
    {
        $hash = new Hashids('', 10);
        $item = Alternative::findOrFail($hash->decodeHex($alternative));

        return view('pages.admin.alternative.show', [
            'item' => $item,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alternative $alternative)
    {
        $hash = new Hashids('', 10);
        $item = Alternative::findOrFail($hash->decodeHex($alternative));

        return view('pages.admin.alternative.edit', [
            'hash' => $hash,
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlternativeRequest $request, Alternative $alternative)
    {
        $hash = new Hashids('', 10);
        $item = Alternative::findOrFail($hash->decodeHex($alternative));

        $data = [
            'name' => $request->name,
        ];

        $item->update($data);

        return redirect()->route('admin.alternative.index')->with('success', 'Alternatif Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alternative $alternative)
    {
        $hash = new Hashids('', 10);
        $item = Alternative::findOrFail($hash->decodeHex($alternative));
        $item->delete();

        return redirect()->route('admin.alternative.index')->with('success', 'Alternatif Berhasil Dihapus!');
    }

    public function trash()
    {
        return view('pages.admin.alternative.trash');
    }

    public function trashAlternative()
    {
        if(request()->ajax())
        {
            $queryAlternative = Alternative::onlyTrashed()->orderBy('deleted_at', 'desc');
            $hash = new Hashids('', 10);

            return DataTables::of($queryAlternative)
                ->addColumn('deleted_at', function (Alternative $alternative) {
                    return $alternative->deleted_at->isoFormat('dddd, D MMMM Y, HH:mm:ss');
                })
                ->addColumn('restore', function($item) use($hash) {
                    return '
                        <div class="action">
                            <a class="text-warning admin-alternative-restore mx-auto" href="'.route('admin.alternative.restore', $hash->encodeHex($item->id)).'">
                                <i class="lni lni-spinner-arrow"></i>
                            </a>
                        </div>
                    ';
                })
                ->addColumn('kill', function($item) use($hash) {
                    return '
                        <div class="action">
                            <form class="mx-auto" method="POST" action="'.route('admin.alternative.kill', $hash->encodeHex($item->id)).'">
                                <input type="hidden" name="_token" value="'.csrf_token().'" />
                                <input type="hidden" name="_method" value="delete">
                                <button type="submit" class="text-danger admin-alternative-kill">
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

    public function restore($alternative)
    {
        $hash = new Hashids('', 10);
        $item = Alternative::onlyTrashed()->findOrFail($hash->decodeHex($alternative));
        $item->restore();

        return redirect()->route('admin.alternative.trash')->with('success', 'Alternatif Berhasil Direstore!');
    }

    public function kill($alternative)
    {
        $hash = new Hashids('', 10);
        $item = Alternative::onlyTrashed()->findOrFail($hash->decodeHex($alternative));
        $item->forceDelete();

        return redirect()->route('admin.alternative.trash')->with('success', 'Alternatif Berhasil Dihapus Permanen!');
    }
}