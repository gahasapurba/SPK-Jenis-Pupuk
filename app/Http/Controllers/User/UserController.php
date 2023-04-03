<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Hashids\Hashids;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\UserRequest;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hash = new Hashids('', 10);
        $item = Auth::user();

        return view('pages.dashboard.user.index', [
            'hash' => $hash,
            'item' => $item,
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
    public function update(UserRequest $request, string $id)
    {
        $hash = new Hashids('', 10);
        $item = User::all()->where('id', Auth::user()->id)->findOrFail($hash->decodeHex($id));

        if ($request->hasFile('avatar')) {
            $data = [
                'name' => $request->name,
                'avatar' => $request->file('avatar')->store('upload/user_avatar','public'),
            ];
            Storage::delete('public/'.$item->avatar);
        } else {
            $data = [
                'name' => $request->name,
            ];
        }

        $item->update($data);

        return redirect()->route('dashboard.user.index')->with('success', 'Profil Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
