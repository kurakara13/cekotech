<?php

namespace App\Http\Controllers;

use App\PembayaranPajak;
use Illuminate\Http\Request;
use DB;
use Excel;
use Storage;
use File;
Use Maatwebsite\Excel\Collections\SheetCollection;
use Rap2hpoutre\FastExcel\FastExcel;

class PembayaranPajakController extends Controller
{
	public function __construct()
	{
		$this->middleware('myrole:superadmin')->except('index','show');
	}

	private function getListStatus()
	{
		return [
			['text'=>'--- Pilih Status Wajib Pajak ---','value'=>''],
			// ['text'=>'Belum bayar','value'=>'Belum bayar'],
			// ['text'=>'Bayar sebagian','value'=>'Bayar sebagian'],
			// ['text'=>'Sudah bayar','value'=>'Sudah bayar'],
      ['text'=>'Normal','value'=>'Normal'],
      ['text'=>'Non Efektif','value'=>'Non Efektif'],
    ];
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $r)
  {
		// dd(Auth::user());
		$data 							= new PembayaranPajak;
    $npwp               = $r->query('npwp');
    $nama_wajib_pajak   = $r->query('nama_wajib_pajak');
    $klu                = $r->query('klu');
    // $status             = $r->query('status');
    $alamat             = $r->query('alamat');
    $no_telepon             = $r->query('no_telepon');
    $kelurahan             = $r->query('kelurahan');
    $no_id_ktp             = $r->query('no_id_ktp');

		if($klu){
			$data = $data->where('klu', 'LIKE', '%'.$klu.'%');
		}

		if($kelurahan){
			$data = $data->where('kelurahan', 'LIKE', '%'.$kelurahan.'%');
		}

		if($npwp){
			$data = $data->where('npwp', 'LIKE', '%'.$npwp.'%');
		}

		if($nama_wajib_pajak){
			$data = $data->where('nama_wajib_pajak', 'LIKE', '%'.$nama_wajib_pajak.'%');
		}

		if($alamat){
			$data = $data->where('alamat', 'LIKE', '%'.$alamat.'%');
		}

		if($no_telepon){
			$data = $data->where('no_telepon', 'LIKE', '%'.$no_telepon.'%');
		}

		if($no_id_ktp){
			$data = $data->where('no_id_ktp', 'LIKE', '%'.$no_id_ktp.'%');
		}

		$data = $data->latest()
		->paginate(200);
		// dd($data);
    return view('wajib-pajak.index', [
      'data'      => $data,
      'title'     => 'Wajib Pajak',
      'active'    => 'wajib-pajak.index',
      'createLink'=>route('wajib-pajak.create'),
      'role'=>'superadmin',
      // 'listStatus'=>$this->getListStatus(),
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
  	return view('wajib-pajak.tambah', [
  		'title'         => 'Tambah Wajib Pajak',
  		'modul_link'    => route('wajib-pajak.index'),
  		'modul'         => 'PembayaranPajak',
  		'action'        => route('wajib-pajak.store'),
  		'active'        => 'wajib-pajak.index',
  		'listStatus'=>$this->getListStatus(),
  	]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
  	$request->validate([
  		'npwp'=>'required|max:15',
  		'nama_wajib_pajak'=>'required',
  		'alamat'=>'required',
  		'rt'=>'required|numeric|max:999',
  		'no_id_ktp'=>'required|numeric',
  		'klu'=>'required',
  		'no'=>'required|numeric',
  		'rw'=>'required|numeric|max:999',
  		'status'=>'required',
  	]);
  	if(PembayaranPajak::count() == 0){
  		DB::statement('set foreign_key_checks=0;');
  		PembayaranPajak::truncate();
  	}
  	$npwp = $request->npwp;
  	$npwp = substr($npwp, 0, 2).'.'.substr($npwp, 2, 3).'.'.substr($npwp, 5, 3).'.'.substr($npwp, 8, 1).'-'.substr($npwp, 9, 3).'.'.substr($npwp, 12, 3);
  	PembayaranPajak::create([
  		'npwp'=>$npwp,
  		'nama_wajib_pajak'=>$request->nama_wajib_pajak,
  		'alamat'=>$request->alamat,
  		'rt'=>$request->rt,
  		'no_id_ktp'=>$request->no_id_ktp,
  		'klu'=>$request->klu,
  		'no'=>$request->no,
  		'rw'=>$request->rw,
  		'status'=>$request->status,
  		'total_bayar'=>$request->total_bayar,
  		'user_id'=>$request->user()->id,
      'tanggal_daftar'=>$request->tanggal_daftar,
      'jenis_wp'=>$request->jenis_wp,
      'tanggal_lahir'=>$request->tanggal_lahir,
      'tanggal_pindah'=>$request->tanggal_pindah,
      'no_skt'=>$request->no_skt,
      'provinsi'=>$request->provinsi,
      'kota'=>$request->kota,
      'kecamatan'=>$request->kecamatan,
      'kelurahan'=>$request->kelurahan,
      'kode_pos'=>$request->kode_pos,
      'no_telepon'=>$request->no_telepon,
      'no_fax'=>$request->no_fax,
      'email'=>$request->email,
      'no_pkp'=>$request->no_pkp,
      'tanggal_pkp'=>$request->tanggal_pkp,
      'no_pkp_cabut'=>$request->no_pkp_cabut,
      'tgl_pkp_cabut'=>$request->tgl_pkp_cabut,
      'nip_ar'=>$request->nip_ar,
      'nama_ar'=>$request->nama_ar,
      'nip_eks'=>$request->nip_eks,
      'nama_eks'=>$request->nama_eks,
      'nip_js'=>$request->nip_js,
      'nama_js'=>$request->nama_js,
    ]);
  	return redirect()->route('wajib-pajak.index')->with('success_msg', 'Wajib Pajak berhasil dibuat');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\PembayaranPajak  $wajibPajak
   * @return \Illuminate\Http\Response
   */
  public function show(PembayaranPajak $wajibPajak)
  {
  	return view('wajib-pajak.detail', [
  		'd'=>$wajibPajak,
  		'title'=>'Data Wajib Pajak',
  		'modul_link'=>route('wajib-pajak.index'),
  		'modul'=>'Wajib Pajak',
  		'action'=>false,
  		'active'=>'wajib-pajak.index',
  		'saveBtn'=>false,
  	]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\PembayaranPajak  $wajibPajak
   * @return \Illuminate\Http\Response
   */
  public function edit(PembayaranPajak $wajibPajak)
  {
  	return view('wajib-pajak.ubah', [
  		'd'             => $wajibPajak,
  		'title'         => 'Ubah Wajib Pajak',
  		'modul_link'    => route('wajib-pajak.index'),
  		'modul'         => 'Wajib Pajak',
  		'action'        => route('wajib-pajak.update', $wajibPajak->id),
  		'active'        => 'wajib-pajak.edit',
  		'listStatus'=>$this->getListStatus(),
  	]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\PembayaranPajak  $wajibPajak
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, PembayaranPajak $wajibPajak)
  {
  	$request->validate([
  		'npwp'=>'required|max:15',
  		'nama_wajib_pajak'=>'required',
  		'alamat'=>'required',
  		'rt'=>'required|numeric|max:999',
  		'no_id_ktp'=>'required|numeric',
  		'klu'=>'required',
  		'no'=>'required|numeric',
  		'rw'=>'required|numeric|max:999',
  		'status'=>'required',
  	]);
  	$npwp = $request->npwp;
  	$npwp = substr($npwp, 0, 2).'.'.substr($npwp, 2, 3).'.'.substr($npwp, 5, 3).'.'.substr($npwp, 8, 1).'-'.substr($npwp, 9, 3).'.'.substr($npwp, 12, 3);
  	$wajibPajak->update([
  		'npwp'=>$npwp,
  		'nama_wajib_pajak'=>$request->nama_wajib_pajak,
  		'alamat'=>$request->alamat,
  		'rt'=>$request->rt,
  		'no_id_ktp'=>$request->no_id_ktp,
  		'klu'=>$request->klu,
  		'no'=>$request->no,
  		'rw'=>$request->rw,
  		'status'=>$request->status,
  		'total_bayar'=>$request->total_bayar,
  		'user_id'=>$request->user()->id,
      'tanggal_daftar'=>$request->tanggal_daftar,
      'jenis_wp'=>$request->jenis_wp,
      'tanggal_lahir'=>$request->tanggal_lahir,
      'tanggal_pindah'=>$request->tanggal_pindah,
      'no_skt'=>$request->no_skt,
      'provinsi'=>$request->provinsi,
      'kota'=>$request->kota,
      'kecamatan'=>$request->kecamatan,
      'kelurahan'=>$request->kelurahan,
      'kode_pos'=>$request->kode_pos,
      'no_telepon'=>$request->no_telepon,
      'no_fax'=>$request->no_fax,
      'email'=>$request->email,
      'no_pkp'=>$request->no_pkp,
      'tanggal_pkp'=>$request->tanggal_pkp,
      'no_pkp_cabut'=>$request->no_pkp_cabut,
      'tgl_pkp_cabut'=>$request->tgl_pkp_cabut,
      'nip_ar'=>$request->nip_ar,
      'nama_ar'=>$request->nama_ar,
      'nip_eks'=>$request->nip_eks,
      'nama_eks'=>$request->nama_eks,
      'nip_js'=>$request->nip_js,
      'nama_js'=>$request->nama_js,
    ]);
  	return redirect()->route('wajib-pajak.index')->with('success_msg', 'Wajib Pajak berhasil diperbarui');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\PembayaranPajak  $wajibPajak
   * @return \Illuminate\Http\Response
   */
  public function destroy(PembayaranPajak $wajibPajak)
  {
    // dd($wajibPajak);
  	$wajibPajak->delete();
  	return redirect()->route('wajib-pajak.index')->with('success_msg', 'Wajib Pajak berhasil dihapus');
  }

  public function imporExcel()
  {
  	return view('wajib-pajak.impor-excel', [
  		'title'         => 'Impor Wajib Pajak dari Excel',
  		'modul_link'    => route('wajib-pajak.index'),
  		'modul'         => 'Wajib Pajak',
  		'action'        => route('wajib-pajak.impor-excel'),
  		'active'        => 'wajib-pajak.index',
  	]);
  }

  public function postExcel(Request $r)
  {
  	$user_id = $r->user()->id;
		// dd($user_id);
  	$r->validate([
  		'excel'=>'required|mimes:xlsx,xls'
  	]);
//   	Storage::deleteDirectory('excel');
		File::deleteDirectory(public_path('file/excel'));
  	// $path = $r->file('excel')->store('excel');
		$filename = time().$r->excel->getClientOriginalName();
		$r->excel->move(public_path('file/excel'), $filename);
		// dd('jihad');
		$users = (new FastExcel)->import(public_path('file/excel/'.$filename), function ($line) use ($user_id){
				$npwp = $line['NPWP'];
				$npwp = substr($npwp, 0, 2).'.'.substr($npwp, 2, 3).'.'.substr($npwp, 5, 3).'.'.substr($npwp, 8, 1);
		    return PembayaranPajak::create([
					'npwp'=>$npwp.'-'.$line['KD_KPP'].'.'.$line['KD_CABANG'],
					'nama_wajib_pajak'=>$line['BENTUK_HUKUM'].' | '.$line['NAMA_WP'],
					'alamat'=>$line['ALAMAT'],
					'rt'=>'',
					'no_id_ktp'=>$line['NOMOR_IDENTITAS'],
					'klu'=>$line['KODE_KLU'].' - '.$line['NAMA_KLU'],
					'no'=>'',
					'rw'=>'',
					'status'=>$line['STATUS_WP'],
					'total_bayar'=>0,
					'user_id'=>$user_id,
					'created_at'=>date('Y-m-d H:i:s'),
					'updated_at'=>date('Y-m-d H:i:s'),
					'tanggal_daftar'=>$line['TANGGAL_DAFTAR'],
					'jenis_wp'=>$line['JENIS_WP'],
					'tanggal_lahir'=>$line['TANGGAL_LAHIR'],
					'tanggal_pindah'=>$line['TANGGAL_PINDAH'],
					'no_skt'=>$line['NO_SKT'],
					'provinsi'=>$line['PROPINSI'],
					'kota'=>$line['KOTA'],
					'kecamatan'=>$line['KECAMATAN'],
					'kelurahan'=>$line['KELURAHAN'],
					'kode_pos'=>$line['KODE_POS'],
					'no_telepon'=>$line['NOMOR_TELEPON'],
					'no_fax'=>$line['NOMOR_FAX'],
					'email'=>$line['EMAIL'],
					'no_pkp'=>$line['NO_PKP'],
					'tanggal_pkp'=>$line['TANGGAL_PKP'],
					'no_pkp_cabut'=>$line['NO_PKP_CABUT'],
					'tgl_pkp_cabut'=>$line['TGL_PKP_CABUT'],
					'nip_ar'=>$line['NIP_AR'],
					'nama_ar'=>$line['NAMA_AR'],
					'nip_eks'=>$line['NIP_EKS'],
					'nama_eks'=>$line['NAMA_EKS'],
					'nip_js'=>$line['NIP_JS'],
					'nama_js'=>$line['NAMA_JS'],
		    ]);
		});
  	return redirect()->back()->with('success_msg', 'Impor excel berhasil');
  }

  public function normal(PembayaranPajak $wajibPajak)
  {
    $wajibPajak->update([
      'status'=>'Normal',
    ]);
    return redirect()->back()->with('Status berhasil diubah ke Normal');
  }

  public function nonEfektif(PembayaranPajak $wajibPajak)
  {
    $wajibPajak->update([
      'status'=>'Non Efektif',
    ]);
    return redirect()->back()->with('Status berhasil diubah ke Non Efektif');
  }

}
