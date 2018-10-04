<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PembayaranPajak extends Model
{

	protected $table = 'pembayaran_pajak';

	protected $fillable = [
		'npwp',
		'nama_wajib_pajak',
		'alamat',
		'rt',
		'no_id_ktp',
		'klu',
		'no',
		'rw',
		'status',
		'total_bayar',
		'user_id',
		'tanggal_daftar',
		'jenis_wp',
		'tanggal_lahir',
		'tanggal_pindah',
		'no_skt',
		'provinsi',
		'kota',
		'kecamatan',
		'kelurahan',
		'kode_pos',
		'no_telepon',
		'no_fax',
		'email',
		'no_pkp',
		'tanggal_pkp',
		'no_pkp_cabut',
		'tgl_pkp_cabut',
		'nip_ar',
		'nama_ar',
		'nip_eks',
		'nama_eks',
		'nip_js',
		'nama_js',
	];

}
