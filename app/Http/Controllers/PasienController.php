<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorepasienRequest;
use App\Http\Requests\UpdatepasienRequest;
use App\Models\Pasien;
use App\Models\Keterangan;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pasiens = Pasien::query();
        $pasiens_selected = $request->input('nama_pasien');
        $medis_selected = $request->input('rek_medis');
        if ($pasiens_selected) {
            $pasiens->where('nama_pasien', $pasiens_selected);
        }
        if ($medis_selected) {
            $pasiens->where('rek_medis', $medis_selected);
        }
        $pasiens = $pasiens->paginate(10)->withQueryString();

        return view('dashboard.data_pasien.dpasien', [
            'pasiens' => $pasiens,
            'pasiens_selected' => $pasiens_selected,
            'medis_selected' => $medis_selected
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.data_pasien.tambah_pasiens', ['pasiens' => Pasien::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request -> validate([
            'rek_medis' => 'required|unique:pasiens',
            'nama_pasien' => 'required',
            'alamat' => 'required',
        ]);

        Pasien::create($validatedData);

        return redirect('/datapasien')->with('success', 'Pasien baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($rek_medis)
    {
        $pasiens= Pasien::where('rek_medis', $rek_medis) -> first();
        $keterangans = Keterangan::query();
        $keterangans -> where('rek_m', $rek_medis);

        $keterangans = $keterangans->paginate(10)->withQueryString();

        return view('dashboard.keterangan.keterangan_p', [
            'keterangans' => $keterangans,
            'pasiens' => $pasiens
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pasiens= Pasien::where('id', $id) -> first();
        return view('dashboard.data_pasien.edit', [
            'pasiens' => $pasiens,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rule = [
            'rek_medis' => 'required',
            'nama_pasien' => 'required',
            'alamat' => 'required',
        ];

        $validatedData = $request->validate($rule);

        Pasien::where('id', $id) ->update($validatedData);
        return redirect('/datapasien')->with('ubah', 'Data mahasiswa berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pasiens = Pasien::findOrFail($id);
        $pasiens->delete();

        return redirect('/datapasien')->with('hapus', 'Data mahasiswa berhasil dihapus');
    }
    
    public function tambahketerangan($rek_medis)
    {
        $keterangan= Keterangan::where('rek_m', $rek_medis) -> first();
        return view('dashboard.keterangan.tambah_keterangan', ['keterangans' => $keterangan]);
    }
}
