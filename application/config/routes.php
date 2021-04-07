<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'C_login/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login/aksi'] = 'C_login/aksi';
$route['admin/login/aksi/logout'] = 'C_login/logout';
$route['admin/home'] = 'admin/C_home/index';
$route['admin/kontak'] = 'admin/C_home/kontak';

$route['admin/jadwal'] = 'admin/C_jadwal/index';
$route['admin/jadwal/add'] = 'admin/C_jadwal/tambah_jadwal';
$route['admin/jadwal/edit/(:any)'] = 'admin/C_jadwal/edit_jadwal/$1';
$route['admin/jadwal/hapus/(:any)'] = 'admin/C_jadwal/hapus_jadwal/$1';

$route['admin/nilai'] = 'admin/C_nilai/index';
$route['admin/nilai/add'] = 'admin/C_nilai/tambah_nilai';
$route['admin/nilai/edit/(:any)'] = 'admin/C_nilai/edit_nilai/$1';
$route['admin/nilai/hapus/(:any)'] = 'admin/C_nilai/hapus_nilai/$1';

// Rekap Soal
$route['admin/rekap'] = 'admin/C_rekap/index';
$route['admin/rekap/add'] = 'admin/C_rekap/tambah_rekap';
$route['admin/rekap/edit/(:any)'] = 'admin/C_rekap/edit_rekap/$1';
$route['admin/rekap/hapus/(:any)'] = 'admin/C_rekap/hapus_rekap/$1';

// Rekap Nilai
$route['admin/rekap/nilai'] = 'admin/C_rekapnilai/index';
$route['admin/rekap/editnilai'] = 'admin/C_rekapnilai/editNa';
$route['admin/rekap/editnilaiNa/(:any)'] = 'admin/C_rekapnilai/edit_rekap';
$route['admin/rekap/nilai/add'] = 'admin/C_rekapnilai/tambah_rekap';
$route['admin/rekap/nilai/edit/(:any)'] = 'admin/C_rekapnilai/edit_rekap/$1';
$route['admin/rekap/nilai/hapus/(:any)'] = 'admin/C_rekapnilai/hapus_rekap/$1';

// Rekap Nominal
$route['rekap/nominal/print'] = 'admin/C_rekap_nominal/print';
$route['rekap/filter/print'] = 'admin/C_rekap_nominal/printFilter';
$route['rekap/filter'] = 'admin/C_rekap_nominal/filter';


$route['admin/rekap/nominal'] = 'admin/C_rekap_nominal/index';
$route['admin/rekap/nominal/add'] = 'admin/C_rekap_nominal/tambah_rekap_nominal';
$route['admin/rekap/nominal/edit/(:any)'] = 'admin/C_rekap_nominal/edit_rekap_nominal/$1';
$route['admin/rekap/nominal/hapus/(:any)'] = 'admin/C_rekap_nominal/hapus_rekap_nominal/$1';

$route['admin/matkul'] = 'admin/C_matkul/index';
$route['admin/matkul/add'] = 'admin/C_matkul/tambah_matkul';
$route['admin/matkul/edit/(:any)'] = 'admin/C_matkul/edit_matkul/$1';
$route['admin/matkul/hapus/(:any)'] = 'admin/C_matkul/hapus_matkul/$1';

$route['admin/dosen'] = 'admin/C_dosen/index';
$route['admin/dosen/add'] = 'admin/C_dosen/tambah_dosen';
$route['admin/dosen/edit/(:any)'] = 'admin/C_dosen/edit_dosen/$1';
$route['admin/dosen/hapus/(:any)'] = 'admin/C_dosen/hapus_dosen/$1';

$route['admin/kelas'] = 'admin/C_kelas/index';
$route['admin/kelas/add'] = 'admin/C_kelas/tambah_kelas';
$route['admin/kelas/edit/(:any)'] = 'admin/C_kelas/edit_kelas/$1';
$route['admin/kelas/hapus/(:any)'] = 'admin/C_kelas/hapus_kelas/$1';

$route['admin/tahun'] = 'admin/C_tahun/index';
$route['admin/tahun/add'] = 'admin/C_tahun/tambah_tahun';
$route['admin/tahun/edit/(:any)'] = 'admin/C_tahun/edit_tahun/$1';
$route['admin/tahun/hapus/(:any)'] = 'admin/C_tahun/hapus_tahun/$1';