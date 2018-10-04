<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PembayaranPajak;

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

    
    public function index()
    {
        return view('my-dasbor', [
            'title'     => 'Dasbor',
            'active'    => 'dasbor',
            'jmlNPWP'=>PembayaranPajak::count(),
            'jmlBelumBayar'=>PembayaranPajak::where('status','Belum bayar')->count(),
            'jmlSudahBayar'=>PembayaranPajak::where('status','Sudah bayar')->count(),
            'jmlSebagian'=>PembayaranPajak::where('status','Bayar sebagian')->count(),
            'createLink'=>false,
            'npwp'=>[
                PembayaranPajak::whereMonth('created_at', '1')->count(),
                PembayaranPajak::whereMonth('created_at', '2')->count(),
                PembayaranPajak::whereMonth('created_at', '3')->count(),
                PembayaranPajak::whereMonth('created_at', '4')->count(),
                PembayaranPajak::whereMonth('created_at', '5')->count(),
                PembayaranPajak::whereMonth('created_at', '6')->count(),
                PembayaranPajak::whereMonth('created_at', '7')->count(),
                PembayaranPajak::whereMonth('created_at', '8')->count(),
                PembayaranPajak::whereMonth('created_at', '9')->count(),
                PembayaranPajak::whereMonth('created_at', '10')->count(),
                PembayaranPajak::whereMonth('created_at', '11')->count(),
                PembayaranPajak::whereMonth('created_at', '12')->count(),
                PembayaranPajak::whereMonth('created_at', '13')->count(),
            ],
            'belumBayar'=>[
                PembayaranPajak::where('status', 'Belum bayar')->whereMonth('created_at', '1')->count(),
                PembayaranPajak::where('status', 'Belum bayar')->whereMonth('created_at', '2')->count(),
                PembayaranPajak::where('status', 'Belum bayar')->whereMonth('created_at', '3')->count(),
                PembayaranPajak::where('status', 'Belum bayar')->whereMonth('created_at', '4')->count(),
                PembayaranPajak::where('status', 'Belum bayar')->whereMonth('created_at', '5')->count(),
                PembayaranPajak::where('status', 'Belum bayar')->whereMonth('created_at', '6')->count(),
                PembayaranPajak::where('status', 'Belum bayar')->whereMonth('created_at', '7')->count(),
                PembayaranPajak::where('status', 'Belum bayar')->whereMonth('created_at', '8')->count(),
                PembayaranPajak::where('status', 'Belum bayar')->whereMonth('created_at', '9')->count(),
                PembayaranPajak::where('status', 'Belum bayar')->whereMonth('created_at', '10')->count(),
                PembayaranPajak::where('status', 'Belum bayar')->whereMonth('created_at', '11')->count(),
                PembayaranPajak::where('status', 'Belum bayar')->whereMonth('created_at', '12')->count(),
                PembayaranPajak::where('status', 'Belum bayar')->whereMonth('created_at', '13')->count(),
            ],
            'sebagian'=>[
                PembayaranPajak::where('status', 'Bayar sebagian')->whereMonth('created_at', '1')->count(),
                PembayaranPajak::where('status', 'Bayar sebagian')->whereMonth('created_at', '2')->count(),
                PembayaranPajak::where('status', 'Bayar sebagian')->whereMonth('created_at', '3')->count(),
                PembayaranPajak::where('status', 'Bayar sebagian')->whereMonth('created_at', '4')->count(),
                PembayaranPajak::where('status', 'Bayar sebagian')->whereMonth('created_at', '5')->count(),
                PembayaranPajak::where('status', 'Bayar sebagian')->whereMonth('created_at', '6')->count(),
                PembayaranPajak::where('status', 'Bayar sebagian')->whereMonth('created_at', '7')->count(),
                PembayaranPajak::where('status', 'Bayar sebagian')->whereMonth('created_at', '8')->count(),
                PembayaranPajak::where('status', 'Bayar sebagian')->whereMonth('created_at', '9')->count(),
                PembayaranPajak::where('status', 'Bayar sebagian')->whereMonth('created_at', '10')->count(),
                PembayaranPajak::where('status', 'Bayar sebagian')->whereMonth('created_at', '11')->count(),
                PembayaranPajak::where('status', 'Bayar sebagian')->whereMonth('created_at', '12')->count(),
                PembayaranPajak::where('status', 'Bayar sebagian')->whereMonth('created_at', '13')->count(),
            ],

            'sudahBayar'=>[
                PembayaranPajak::where('status', 'Sudah bayar')->whereMonth('created_at', '1')->count(),
                PembayaranPajak::where('status', 'Sudah bayar')->whereMonth('created_at', '2')->count(),
                PembayaranPajak::where('status', 'Sudah bayar')->whereMonth('created_at', '3')->count(),
                PembayaranPajak::where('status', 'Sudah bayar')->whereMonth('created_at', '4')->count(),
                PembayaranPajak::where('status', 'Sudah bayar')->whereMonth('created_at', '5')->count(),
                PembayaranPajak::where('status', 'Sudah bayar')->whereMonth('created_at', '6')->count(),
                PembayaranPajak::where('status', 'Sudah bayar')->whereMonth('created_at', '7')->count(),
                PembayaranPajak::where('status', 'Sudah bayar')->whereMonth('created_at', '8')->count(),
                PembayaranPajak::where('status', 'Sudah bayar')->whereMonth('created_at', '9')->count(),
                PembayaranPajak::where('status', 'Sudah bayar')->whereMonth('created_at', '10')->count(),
                PembayaranPajak::where('status', 'Sudah bayar')->whereMonth('created_at', '11')->count(),
                PembayaranPajak::where('status', 'Sudah bayar')->whereMonth('created_at', '12')->count(),
                PembayaranPajak::where('status', 'Sudah bayar')->whereMonth('created_at', '13')->count(),
            ],
        ]);
    }
}
