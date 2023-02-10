<?php

namespace App\Http\Controllers;

use App\Models\RuteModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $navigation = '';
        if (session('user')->id_level === 3) {
            $navigation = $this->forUser($request);
        } else {
            $navigation = $this->forOperator();
        }
        return $navigation;
    }

    public function forUser(Request $request)
    {
        $rute = RuteModel::all();
        $choiceTicket = (object)[];
        if (isset($request->id_rute)) {
            $choiceTicket = RuteModel::where('id_rute', $request->id_rute)->first();
        }

        $data['rute'] = $rute;
        $data['choiceTicket'] = $choiceTicket;

        return view('dashboard.index', $data);
    }

    public function forOperator()
    {
        return view('dashboard.index_admin');
    }
}
