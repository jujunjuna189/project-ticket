<?php

namespace App\Http\Controllers;

use App\Models\RuteModel;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index()
    {
        return view('pemesanan.index');
    }
}
