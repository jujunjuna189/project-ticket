<?php

namespace App\Http\Controllers;

use App\Models\TipeTransportasiModel;
use App\Models\TransportasiModel;
use Illuminate\Http\Request;

class TransportasiController extends Controller
{
    public function index()
    {
        $transportasi = TransportasiModel::all();

        $data['transportasi'] = $transportasi;

        return view('transportasi.index', $data);
    }

    public function create()
    {
        $tipe_transportasi = TipeTransportasiModel::all();

        $data['tipe_transportasi'] = $tipe_transportasi;

        return view('transportasi.form.tambah', $data);
    }

    public function store(Request $request)
    {
        $transportasi = new TransportasiModel();
        $transportasi->fill($request->except('id_transportasi'));
        $transportasi->save();
        return redirect()->route('transportasi');
    }

    public function update(Request $request)
    {
        $transportasi = TransportasiModel::where('id_transportasi', $request->id_transportasi)->first();
        $tipe_transportasi = TipeTransportasiModel::all();

        $data['transportasi'] = $transportasi;
        $data['tipe_transportasi'] = $tipe_transportasi;

        return view('transportasi.form.edit', $data);
    }

    public function updated(Request $request)
    {
        TransportasiModel::where('id_transportasi', $request->id_transportasi)->update($request->except('id_transportasi', '_token'));
        return redirect()->route('transportasi');
    }

    public function delete(Request $request)
    {
        TransportasiModel::where('id_transportasi', $request->id_transportasi)->delete();
        return redirect()->route('transportasi');
    }
}
