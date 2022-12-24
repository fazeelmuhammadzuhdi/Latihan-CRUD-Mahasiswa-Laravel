<?php

namespace App\Http\Controllers;

use App\Models\Data;

class DataController extends Controller
{
    public function index()
    {
        $data = Data::all();
        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('aksi', function ($data) {
                    $button = " <button class='edit btn  btn-danger' id='" . $data->id . "' >Edit</button>";
                    $button .= " <button class='hapus btn  btn-danger' id='" . $data->id . "' >Hapus</button>";
                    return $button;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
        return view('data.index');
    }
}
