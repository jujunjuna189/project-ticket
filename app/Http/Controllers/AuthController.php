<?php

namespace App\Http\Controllers;

use App\Models\PenumpangModel;
use App\Models\PetugasModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function auth(Request $request)
    {
        $user = (object)[];
        if ($petugas = PetugasModel::where('username', $request->username)->first()) {
            $user = $petugas;
        } else if ($penumpang = PenumpangModel::where('username', $request->username)->first()) {
            $user = $penumpang;
        }

        $redirectTo = $this->redirectTo($user, $request);
        return $redirectTo;
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:penumpang|unique:petugas'
        ]);

        $penumpang = new PenumpangModel();
        $penumpang->fill($request->except('id_penupang', 'password'));
        $penumpang->password = Hash::make($request->password);
        $penumpang->save();

        $redirectTo = $this->redirectTo($penumpang, $request);
        return $redirectTo;
    }

    private function redirectTo($data, $request)
    {
        if (isset($data->password) && isset($request->password)) {
            if (Hash::check($request->password, $data->password)) {
                $sessionData = (object)[];
                if (isset($data->id_level)) {
                    $sessionData = (object)[
                        'id' => $data->id_petugas,
                        'nama_lengkap' => $data->nama_petugas,
                        'username' => $data->username,
                        'alamat' => '',
                        'tgl_lahir' => '',
                        'jenis_kelamin' => '',
                        'telepon' => '',
                        'id_level' => $data->id_level,
                    ];
                } else {
                    $sessionData = (object)[
                        'id' => $data->id_penumpang,
                        'nama_lengkap' => $data->nama_penumpang,
                        'username' => $data->username,
                        'alamat' => $data->alamat_penumpang,
                        'tgl_lahir' => $data->tanggal_lahir,
                        'jenis_kelamin' => $data->jenis_kelamin,
                        'telepon' => $data->telepon,
                        'id_level' => 3,
                    ];
                }
                session(['user' => $sessionData]);
                return redirect()->route('dashboard');
            }
        }

        return redirect()->route('login')->with('failed', 'Gagal Login');
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('login');
    }
}
