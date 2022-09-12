<?php

namespace App\Http\Controllers;

use App\Models\Aktiva;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $aktiva = Aktiva::count();
        $inventaris = Inventaris::count();
        return view(
            'home',
            [
                'aktiva' => $aktiva,
                'inventaris' => $inventaris
            ]
        );
    }
}
