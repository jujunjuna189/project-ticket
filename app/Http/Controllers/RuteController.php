<?php

namespace App\Http\Controllers;

use App\Models\RuteModel;
use App\Models\TransportasiModel;
use Illuminate\Http\Request;

class RuteController extends Controller
{
    public function index()
    {
        $rute = RuteModel::all();

        $data['rute'] = $rute;

        return view('rute.index', $data);
    }

    public function create()
    {
        $transportasi = TransportasiModel::all();

        $data['transportasi'] = $transportasi;

        return view('rute.form.tambah', $data);
    }

    public function store(Request $request)
    {
        $rute = new RuteModel();
        $rute->fill($request->except('id_rute'));
        $rute->save();
        return redirect()->route('rute');
    }

    public function update(Request $request)
    {
        $rute = RuteModel::where('id_rute', $request->id_rute)->first();
        $transportasi = TransportasiModel::all();

        $data['rute'] = $rute;
        $data['transportasi'] = $transportasi;

        return view('rute.form.edit', $data);
    }

    public function updated(Request $request)
    {
        RuteModel::where('id_rute', $request->id_rute)->update($request->except('id_rute', '_token'));
        return redirect()->route('rute');
    }

    public function delete(Request $request)
    {
        RuteModel::where('id_rute', $request->id_rute)->delete();
        return redirect()->route('rute');
    }
}
