<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\ModelMhs;
use Illuminate\Http\Request;

class Mhs extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->query('cari');

        if (!empty($cari)) {
            $dataMahasiswa = ModelMhs::sortable()
                ->where('mahasiswa.mhsnim', 'like', '%' . $cari . '%')
                ->orWhere('mahasiswa.mhsnama', 'like', '%' . $cari . '%')
                ->paginate(5)->onEachside(1)->fragment('mahasiswa');
        } else {
            $dataMahasiswa = ModelMhs::sortable()->paginate(5)->onEachSide(1)->fragment('mahasiswa');
        }
        // $data = [
        //     'dataMhs' => ModelMhs::sortable()->paginate(5)->onEachSide(1)->fragment('mahasiswa')
        // ];
        return view('mahasiswa.data')->with([
            'dataMhs' => $dataMahasiswa,
            'cari' => $cari
        ]);
    }

    public function add()
    {
        return view('mahasiswa.tambah');
    }

    public function save(Request $r)
    {
        $nim = $r->nim;
        $nama = $r->nama;
        $telp = $r->telp;
        $alamat = $r->alamat;



        $validateData = $r->validate(
            [
                'nim' => 'required|unique:mahasiswa,mhsnim',
                'nama' => 'required',
                'telp' => 'required|numeric',
                'alamat' => 'required',
            ],
            [
                'nim.required' => 'NIM tidak Boleh Kosong',
                'nim.unique' => 'NIM Sudah Ada',
                'nama.required' => 'Nama Mahasiswa Tidak Boleh Kosong',
                'telp.required' => 'Telpon Tidak Boleh Kosong',
                'telp.numeric' => 'Telpon Harus Dalam Angka',
                'alamat.required' => 'alamat Tidak Boleh Kosong'
            ]
        );

        $mhs = new ModelMhs;
        $mhs->mhsnim = $nim;
        $mhs->mhsnama = $nama;
        $mhs->mhstelp = $telp;
        $mhs->mhsalamat = $alamat;
        $mhs->save();
        // echo 'Data Berhasil Di Simpan';


        $r->session()->flash('msg', "Data Dengan $nama Berhasil Di Simpan");
        return redirect('/mhs/tambah');
    }

    public function edit($nim)
    {
        // Pertama deklarasikan variabel untuk mengambil semua field yang ada di database
        $mhs = ModelMhs::find($nim);
        $data = [
            'nim' => $nim,
            'nama' => $mhs->mhsnama,
            'telp' =>  $mhs->mhstelp,
            'alamat' => $mhs->mhsalamat,
        ];

        return view('mahasiswa.edit', $data);
    }

    public function update(Request $r)
    {
        $nim = $r->nim;
        $nama = $r->nama;
        $telp = $r->telp;
        $alamat = $r->alamat;

        try {
            $mhs =  ModelMhs::find($nim);
            $mhs->mhsnama = $nama;
            $mhs->mhstelp = $telp;
            $mhs->mhsalamat = $alamat;
            $mhs->save();
            // echo 'Data Berhasil Di Simpan';


            $r->session()->flash('msg', "Data Dengan $nama Berhasil Di Update");
            return redirect('/mhs/index');
        } catch (Throwable $e) {
            echo $e;
        }
    }

    public function hapus($nim)
    {
        ModelMhs::find($nim)->delete();
        return redirect()->back();
    }

    public function datasoft()
    {
        $data = [
            'dataMhs' => ModelMhs::onlyTrashed()->get()
        ];
        return view('mahasiswa.datasoft', $data);
    }

    public function restore($nim)
    {
        ModelMhs::withTrashed()->find($nim)->restore();

        return redirect()->back();
    }

    public function forceDelete($nim)
    {
        ModelMhs::onlyTrashed()->find($nim)->forceDelete();
        return redirect()->back();
    }
}
