<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * mengubah format tanggal
 * menjadi format yyyy-mm-dd
 */
function dateExcelToMysql($value)
{
    $tahun = substr($value, -4);
    $aBulan = ['', 'Jan', 'Peb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nop', 'Des'];
    $bulan = sprintf('%02s', array_search(substr($value, 3, 3), $aBulan));
    $tanggal = substr($value, 0, 2);
    // return date('Y-m-d', strtotime(str_replace('/', '-', $value)));
    return $tahun . '-' . $bulan . '-' . $tanggal;
}

/**
 * mengubah format tanggal
 * menjadi format dd-mm-yyyy
 */
function dateIndo($value)
{
    return date_format(date_create($value), 'd-m-Y');
}


/**
 * mengubah format tanggal
 * menjadi format yyyy-mm-dd
 */
function dateMysql($value)
{
    return date('Y-m-d', strtotime(str_replace('/', '-', $value)));
}

/**
 * menampilkan nilai variabel
 */
function pre($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}
