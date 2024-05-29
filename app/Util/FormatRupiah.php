<?php

namespace App\Util;

class FormatRupiah
{
    public static function Rupiah($angka)
    {
        
	$hasil_rupiah = number_format($angka,2,',','.');
	return $hasil_rupiah;
    }
}