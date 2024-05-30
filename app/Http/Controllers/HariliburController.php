<?php

namespace App\Http\Controllers;

use App\Models\Harilibur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class HariliburController extends Controller
{
   public function index()
   {
    $query = Harilibur::query();
    $query ->orderBy('kode_libur','desc');
    $harilibur = $query->paginate(20);
    
    return view('harilibur.index', compact('harilibur'));
   }

   public function create()
   {
    $cabang = DB::table('cabang')->orderBy('kode_cabang')->get();
    return view('harilibur.create', compact('cabang'));
   }

   public function store(Request $request)
   {
    //kode libur auto generate
    $tahun = date('Y', strtotime($request->tanggal_libur));
    $thn = substr($tahun,2,2);
        
    $lastlibur = DB::table('harilibur')
    -> whereRaw('YEAR(tanggal_libur)="' .$tahun. '"')
    -> orderBy('kode_libur','desc')
    ->first();
    $lastkodelibur = $lastlibur != null ? $lastlibur->kode_libur : "";
    $format = "LB". $thn;
    $kode_libur = buatKode($lastkodelibur,$format,3);

    try {
       DB::table('harilibur')
       ->insert([
            'kode_libur' => $kode_libur,
            'tanggal_libur' => $request->tanggal_libur,
            'kode_cabang' => $request->kode_cabang,
            'keterangan' => $request->keterangan
                ]);

                return Redirect::back()->with(['success'=> 'Data Berhasil Disimpan']);
    } catch (\Exception $e) {
        return Redirect::back()->with(['warning'=> $e->getMessage()]);
    }

   }

   
   public function edit(Request $request)
   {
    $kode_libur = $request->kode_libur;
    $harilibur = DB::table('harilibur')->where('kode_libur',$kode_libur)->first();
    $cabang = DB::table('cabang')->orderBy('kode_cabang')->get();
    return view('harilibur.edit', compact('cabang','harilibur'));
   }


   public function update(Request $request,$kode_libur)
   {
    try {
       DB::table('harilibur')
       ->where('kode_libur', $kode_libur)
       ->update([
            'tanggal_libur' => $request->tanggal_libur,
            'kode_cabang' => $request->kode_cabang,
            'keterangan' => $request->keterangan
                ]);

                return Redirect::back()->with(['success'=> 'Data Berhasil Diupdate']);
    } catch (\Exception $e) {
        return Redirect::back()->with(['warning'=> $e->getMessage()]);
    }
   }

   public function delete($kode_libur)
   {
    try {
        DB::table('harilibur')->where('kode_libur',$kode_libur)->delete();
        return Redirect::back()->with(['success'=> 'Data Berhasil di Hapus']);
    } catch (\Exception $e) {
        return Redirect::back()->with(['warning'=> $e->getMessage()]);
    }

   }


   public function setkaryawanlibur($kode_libur)
   {
    $harilibur = DB::table('harilibur')
    ->join('cabang','harilibur.kode_cabang', '=', 'cabang.kode_cabang')
    ->where('kode_libur',$kode_libur)->first();
    return view('harilibur.setkaryawanlibur', compact('harilibur'));
   }

   public function setlistkaryawanlibur($kode_libur)
   {
    $harilibur = DB::table('harilibur')->where('kode_libur',$kode_libur)->first();
    $karyawan = DB::table('karyawan')->where('kode_cabang',$harilibur->kode_cabang)
    ->orderBy('nama_lengkap')
    ->get();


    return view('harilibur.setlistkaryawanlibur', compact('karyawan'));

   }

}
