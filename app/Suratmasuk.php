<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suratmasuk extends Model
{
    protected $guarded = [];

    protected $table="suratmasuks";
    protected $primarykey="id";
    protected $fillable=[
    	'tanggal_diterima',
		'nomor_dan_tanggal',
		'jenis_surat',
		'pengirim',
		'ditujukan',
		'hal',
		'lampiran',
		'bidang_dan_pj',
		'penerima',
		'penyerahan',
		'tindak_lanjut',
		'arsip',
		'note',
		'kode_surat'];
}
