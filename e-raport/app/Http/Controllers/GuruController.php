<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::all();
        return view('pages.guru', compact('guru'));
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nip' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jabatan' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $data = new Guru();
        $data->nip = $request->nip;
        $data->nama = $request->nama;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->jabatan = $request->jabatan;
        $data->no_hp = $request->no_hp;
        $data->email = $request->email;
        $data->save();

        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }

    public function destroy(Request $request, $id)
    {
        try {
            $guru = Guru::findOrFail(decrypt($id));
            $guru->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }
}
