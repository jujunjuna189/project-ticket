<?php

namespace App\Http\Controllers;

use App\Models\TipeTransportasiModel;
use Illuminate\Http\Request;

class TipeTransportasiController extends Controller
{
    public function index()
    {
        $tipe_transportasi = TipeTransportasiModel::all();

        $data['tipe_transportasi'] = $tipe_transportasi;

        return view('tipe_transportasi.index', $data);
    }

    public function create()
    {
        return view('tipe_transportasi.form.tambah');
    }

    public function store(Request $request)
    {
        $rute = new TipeTransportasiModel();
        $rute->fill($request->except('id_tipe_transportasi'));
        $rute->save();
        return redirect()->route('tipe-transportasi');
    }

    public function update(Request $request)
    {
        $tipe_transportasi = TipeTransportasiModel::where('id_tipe_transportasi', $request->id_tipe_transportasi)->first();

        $data['tipe_transportasi'] = $tipe_transportasi;

        return view('tipe_transportasi.form.edit', $data);
    }

    public function updated(Request $request)
    {
        TipeTransportasiModel::where('id_tipe_transportasi', $request->id_tipe_transportasi)->update($request->except('id_tipe_transportasi', '_token'));
        return redirect()->route('tipe-transportasi');
    }

    public function delete(Request $request)
    {
        TipeTransportasiModel::where('id_tipe_transportasi', $request->id_tipe_transportasi)->delete();
        return redirect()->route('tipe-transportasi');
    }
}
