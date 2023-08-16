<?php

namespace App\Http\Controllers;

use App\Models\Keterangan;
use App\Models\Pasien;
use Illuminate\Http\Request;
use App\Http\Requests\StoreKeteranganRequest;
use App\Http\Requests\UpdateKeteranganRequest;
use Carbon\Carbon;

class KeteranganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.keterangan.tambah_keterangan');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($rek_medis)
    {
        $pasiens= Pasien::where('rek_medis', $rek_medis) -> first();
        $tanggal = Carbon::now();
        return view('dashboard.keterangan.tambah_keterangan', [
            'pasiens' => $pasiens,
            'tanggal' => $tanggal]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rek_m = $request->input('rek_m');
        
        $validatedData = $request -> validate([
            'rek_m' => '',
            'keluhan' => 'required',
            'tindakan' => 'required',
            'tanggal' => 'required'
        ]);

        Keterangan::create($validatedData);

        return redirect()->route('datapasien.show', ['rek_medis' => $rek_m])->with('success', 'Pasien baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Keterangan $keterangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Keterangan $keterangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKeteranganRequest $request, Keterangan $keterangan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $keterangans = Keterangan::findOrFail($id);
        $keterangans->delete();

        return back()->with('hapus', 'Data berhasil dihapus');
    }
}
