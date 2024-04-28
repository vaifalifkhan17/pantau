<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Opendk;
use App\Models\PengaturanAplikasi;
use App\Models\TrackMobile;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DashboardController extends Controller
{
    /** @var Desa */
    protected $desa;

    public function __construct()
    {
        $this->desa = new Desa();
    }

    public function index()
    {
        $jumlahProv  = Desa::jumlahProvinsi()->first()->total;
        $jumlahKab   = Desa::jumlahKabupaten()->first()->total;
        $jumlahKec   = Desa::jumlahKecamatan()->first()->total;
        $jumlahKel   = Desa::jumlahKelurahan()->first()->total;
        $OpendkOn    = Opendk::active()->count();
        $OpendkOff   = Opendk::nonactive()->count();
        $MobileOn    = TrackMobile::active()->count();
        $MobileOff   = TrackMobile::nonactive()->count();
        // dd($this->desa->jumlahDesa()->get()->first());
        return view('dashboard', [
            'jumlahKecamatan' => $jumlahKec,
            'jumlahKabupaten' => $jumlahKab,
            'jumlahProvinsi' => $jumlahProv,
            'jumlahKelurahan' =>  $jumlahKel,
            'jumlahOpendkOn' => $OpendkOn,
            'jumlahOpendkOff' => $OpendkOff,
            'jumlahMobileOn' => $MobileOn,
            'jumlahMobileOff' => $MobileOff,
            'jumlahDesa' => $this->desa->jumlahDesa()->get()->first(),
            'desaBaru' => $this->desa->desaBaru()->count(),
            'kabupatenKosong' => collect($this->desa->kabupatenKosong())->count(),
            'info_backup' => [
                'cloud_storage' => PengaturanAplikasi::get_pengaturan()['cloud_storage'],
                'akhir_backup' => PengaturanAplikasi::get_pengaturan()['akhir_backup'],
                'waktu_backup' => PengaturanAplikasi::get_pengaturan()['waktu_backup'],
                'info' => 'Peringatan !!!',
                'isi' => 'Gagal Backup Otomatis ke Cloud Storage.',
            ],
        ]);
    }

    public function datatableDesaBaru(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of($this->desa->desaBaru()->get()->map(function ($desa) {
                if (auth()->check() == false) {
                    unset($desa['url_hosting']);
                }

                return $desa;
            }))->addIndexColumn()->make(true);
        }

        abort(404);
    }

    public function datatableKabupatenKosong(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of($this->desa->kabupatenKosong())->addIndexColumn()->make(true);
        }

        abort(404);
    }
}
