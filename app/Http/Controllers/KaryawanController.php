<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KaryawanController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;

        $data_existing = Biodata::where('user_id', $id)->get();

        if (count($data_existing) > 0) {
            return view('biodata.update_form', compact('id', 'data_existing'));
        } else {
            return view('biodata.create', compact('id'));
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'posisi_dilamar' => 'required',
        ]);

        try {
            $biodata = new Biodata;

            $biodata->user_id = $request->user_id;
            $biodata->nama_lengkap = $request->nama_lengkap;
            $biodata->tempat_lahir = $request->tempat_lahir;
            $biodata->tanggal_lahir = $request->tanggal_lahir;
            $biodata->posisi_dilamar = $request->posisi_dilamar;

            $biodata->save();
        } catch (Throwable $e) {
            report($e);

            return false;
        }

        return redirect()->route('karyawan.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'posisi_dilamar' => 'required',
        ]);

        try {
            $biodata = Biodata::findOrFail($id);

            $biodata->nama_lengkap = $request->nama_lengkap;
            $biodata->tempat_lahir = $request->tempat_lahir;
            $biodata->tanggal_lahir = $request->tanggal_lahir;
            $biodata->posisi_dilamar = $request->posisi_dilamar;

            $biodata->save();
        } catch (Throwable $e) {
            report($e);

            return false;
        }

        return redirect()->route('karyawan.index');
    }
}
