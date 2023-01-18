<?php

namespace App\Http\Controllers;

use App\Models\Laundry;
use App\Models\Jenis;
use App\Models\Layanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LaundryCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function userrekap(){
        $user = Auth::user();
        $laundry = Laundry::where('id_pengguna', $user->user_id)->get();
        $total = Laundry::where('id_pengguna', $user->user_id)->count();

        $laundry1 = Laundry::where('id_pengguna', $user->user_id)->where('status', 'Laundry Selesai')->get();
        $laundryselesai = $laundry1->count();

        $laundry2 = Laundry::where('id_pengguna', $user->user_id)
                ->whereIn('status', ['Laundry Baru', 'Laundry Sedang di Proses'])
                ->get();
        $proses = $laundry2->count();
        $title = "Akun Saya";
        
        return view('akun/dashboard', ['laundry' => $laundry, 'total' => $total, 'title' => $title, 'laundryselesai' => $laundryselesai, 'proses' => $proses]);
    }
    public function riwayat(){
        $user = Auth::user();
        $history = Laundry::where('id_pengguna', $user->user_id)->get();
        return view('akun/riwayat', ['history' => $history, 'title' => "Riwayat Laundry"]);
    }
    public function pengaturanuser()
    {
        $data['title'] = "Pengaturan Akun";
        return view('akun/pengaturan', $data);
    }
    public function updateProfile(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'password_sekarang' => 'required',
        ]);
    
        $user = Auth::user();
        $profile = User::where('user_id', $user->user_id)->get();
        if (!Hash::check($request->password_sekarang, $profile[0]->password)) {
            return redirect()->route('pengaturanuser')->with('error', 'Password anda salah!');
        }
    
        $user->nama = $request->nama;
        $user->alamat = $request->alamat;
        $user->nohp = $request->nohp;
    
        if($request->password_baru != null) {
            if(Hash::check($request->password_sekarang, $user->password) && $request->password_baru == $request->password_baru2) {
                $user->password = Hash::make($request->password_baru);
            } else {
                return redirect()->route('pengaturanuser')->with('error', 'Gagal ubah password');
            }
        }
        
        $user->save();
        return redirect()->route('pengaturanuser')->with('success', 'Profile berhasil diubah!');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $layanan = Layanan::all();
        $jenis = Jenis::all();
        $data['title'] = "Laundry Baru";

        return view('akun/order', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jenis = Jenis::find($request->jenis);
        $hargajenis = $jenis->harga;
        
        $layanan = Layanan::find($request->layanan);
        $hargalayanan = $layanan->harga;

        $hargaperkg = $request->berat * $hargajenis;

        $hargatotal = $hargaperkg + $hargalayanan;

        $laundry = new Laundry();
        $laundry->id_pengguna = $request->id_pengguna;
        $laundry->nama = $request->nama;
        $laundry->alamat = $request->alamat;
        $laundry->nomorhp = $request->nomorhp;
        $laundry->jenis = $request->jenis;
        $laundry->berat = $request->berat;
        $laundry->layanan = $request->layanan;
        $laundry->status = 1;
        $laundry->harga = $hargatotal;
        $laundry->pembayaran = $request->pembayaran;
        $laundry->save();

        return redirect()->route('order.baru')->with('success', 'Pemesanan sukses! Laundry anda akan segera kami proses.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laundry  $laundry
     * @return \Illuminate\Http\Response
     */
    public function show(Laundry $laundry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laundry  $laundry
     * @return \Illuminate\Http\Response
     */
    public function edit(Laundry $laundry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laundry  $laundry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laundry $laundry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laundry  $laundry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laundry $laundry)
    {
        //
    }
    
    public function __construct()
    {
        $this->middleware('auth');
    }
}
