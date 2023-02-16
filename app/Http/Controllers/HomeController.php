<?php

namespace App\Http\Controllers;
use App\Models\Qcmliste;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        return view('home', [
            $userId = Auth::id(),
            'listeqcm' => Qcmliste::where('user_id', $userId)->count()
            
        ]);
    }
    public function pdf(){
        return view('pdf');
    }
}
