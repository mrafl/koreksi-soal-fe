<?php

namespace App\Http\Controllers;

use App\Helpers\Services;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
     public function index()
     {
          return view('pages.dashboard.index', [
               'active' => 'index',
               'titlePage' => 'Dashboard'
          ]);
     }

     public function kunciJawaban()
     {
          return view('pages.dashboard.kunciJawaban', [
               'active' => 'kunciJawaban',
               'titlePage' => 'Management Kunci Jawaban',
          ]);
     }

     public function jawabanSiswa()
     {
          $listKodeSoal = Services::get('/kunci-jawaban')->json()['data'];
          return view('pages.dashboard.jawabanSiswa', [
               'active' => 'jawabanSiswa',
               'titlePage' => 'Management Jawaban Siswa',
               'listKodeSoal' => $listKodeSoal
          ]);
     }

}