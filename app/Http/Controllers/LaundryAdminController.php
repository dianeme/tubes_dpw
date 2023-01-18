<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Laundry;
use App\Models\Pembayaran;
use App\Models\Jenis;
use App\Models\Status;
use App\Models\Layanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LaundryAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function userrekap(){
        $totallaundry = Laundry::all()->count();
        $totalpelanggan = User::all()->count();
        $totalpendapatan = Laundry::all()->sum('harga');
        $data['admin'] = Admin::where('admin_id', session()->get('admin_id'))->get();
        $data['title'] = "Administrator";
        
        return view('administrator/dashboard', ['totallaundry' => $totallaundry, 'totalpelanggan' => $totalpelanggan, 'totalpendapatan' => $totalpendapatan], $data);
    }
    public function user(Request $request)
    {
        $users = User::all();
        $data['admin'] = Admin::where('admin_id', session()->get('admin_id'))->get();
        $data['title'] = "Semua Pelanggan";
        return view('administrator/manageuser', ['users' => $users], $data);
    }
    public function edituser(Request $request)
    {
        $user = User::where('user_id', $request->id)->first();
        $data['admin'] = Admin::where('admin_id', session()->get('admin_id'))->get();
        $data['title'] = "Ubah Data Pelanggan";
        return view('administrator/edituser', ['user' => $user], $data);
    }
    public function edituser_action(Request $request)
    {
        $user = User::where('user_id', $request->id)->first();
        if($user) {
            
            
            $user->nama = $request->nama;
            $user->email = $request->email;
            $user->alamat = $request->alamat;
            $user->nohp = $request->nomorhp;
            $user->save();
            return redirect()->route('manageuser')->with('success', 'Data pelanggan berhasil diubah!');
        }
        else {
            return redirect()->route('manageuser')->with('error', 'Data pelanggan tidak ditemukan!');
        }
    }

    
    public function order(Request $request)
    {
        $laundry = Laundry::all();
        foreach ($laundry as $key => $value) {
            $layanan = Layanan::where('layanan', $value->layanan)->first();
            $jenis = Jenis::where('jenis', $value->jenis)->first();
            $status = Status::where('status', $value->status)->first();
            $pembayaran = Pembayaran::where('pembayaran', $value->pembayaran)->first();
            $laundry[$key]['nama_layanan'] = $layanan->nama_layanan;
            $laundry[$key]['jenis'] = $jenis->nama_jenis;
            $laundry[$key]['status'] = $status->nama;
            $laundry[$key]['pembayaran'] = $pembayaran->nama;
        }
        $data['admin'] = Admin::where('admin_id', session()->get('admin_id'))->get();
        $data['title'] = "Semua Pesanan";
        return view('administrator/manageorder', ['laundry' => $laundry, 'layanan' => $layanan, 'status' => $status], $data);
    }
    public function editorder(Request $request)
    {
        $laundry = Laundry::where('id_laundry', $request->id)->first();
        $layanan_saat_ini = Layanan::where('layanan', $laundry->layanan)->first(); 
        $layanan_lainnya = Layanan::where('layanan', '!=', $laundry->layanan)->get(); 
        $jenis_saat_ini = Jenis::where('jenis', $laundry->jenis)->first(); 
        $jenis_lainnya = Jenis::where('jenis', '!=', $laundry->jenis)->get(); 
        $pembayaran_saat_ini = Pembayaran::where('pembayaran', $laundry->pembayaran)->first(); 
        $pembayaran_lainnya = Pembayaran::where('pembayaran', '!=', $laundry->pembayaran)->get(); 
        $status_saat_ini = Status::where('status', $laundry->status)->first(); 
        $status_lainnya = Status::where('status', '!=', $laundry->status)->get(); 
        $data['admin'] = Admin::where('admin_id', session()->get('admin_id'))->get();
        $data['title'] = "Edit Pesanan";
        return view('administrator/editorder', ['laundry' => $laundry, 'layanan_saat_ini' => $layanan_saat_ini, 'layanan_lainnya' => $layanan_lainnya, 'jenis_saat_ini' => $jenis_saat_ini, 'jenis_lainnya' => $jenis_lainnya, 'pembayaran_saat_ini' => $pembayaran_saat_ini, 'pembayaran_lainnya' => $pembayaran_lainnya, 'status_saat_ini' => $status_saat_ini, 'status_lainnya' => $status_lainnya], $data);
    }
    public function editorder_action(Request $request)
    {
        $laundry = Laundry::where('id_laundry', $request->id)->first();
        if($laundry) {
            
            $jenis = Jenis::find($request->jenis);
            $hargajenis = $jenis->harga;
            
            $layanan = Layanan::find($request->layanan);
            $hargalayanan = $layanan->harga;

            $hargaperkg = $request->berat * $hargajenis;

            $hargatotal = $hargaperkg + $hargalayanan;
            
            $laundry->nama = $request->nama;
            $laundry->alamat = $request->alamat;
            $laundry->nomorhp = $request->nomorhp;
            $laundry->jenis = $request->jenis;
            $laundry->berat = $request->berat;
            $laundry->harga = $hargatotal;
            $laundry->layanan = $request->layanan;
            $laundry->pembayaran = $request->pembayaran;
            $laundry->status = $request->status;
            $laundry->save();
            return redirect()->route('manageorder')->with('success', 'Data laundry berhasil diubah!');
        }
        else {
            return redirect()->route('manageorder')->with('error', 'Data laundry tidak ditemukan!');
        }
    }

    public function layanan(Request $request)
    {
        $layanan = Layanan::all();
        $data['admin'] = Admin::where('admin_id', session()->get('admin_id'))->get();
        $data['title'] = "Semua Layanan";
        return view('administrator/managelayanan', ['layanan' => $layanan], $data);
    }
    public function editlayanan(Request $request)
    {
        $layanan = Layanan::where('id_layanan', $request->id)->first();
        $data['admin'] = Admin::where('admin_id', session()->get('admin_id'))->get();
        $data['title'] = "Ubah Data Layanan";
        return view('administrator/editlayanan', ['layanan' => $layanan], $data);
    }
    public function editlayanan_action(Request $request)
    {
        $layanan = Layanan::where('id_layanan', $request->id)->first();
        if($layanan) {
            $layanan->layanan = $request->layanan;
            $layanan->nama_layanan = $request->nama_layanan;
            $layanan->harga = $request->harga;
            $layanan->save();
            return redirect()->route('managelayanan')->with('success', 'Data layanan berhasil diubah!');
        }
        else {
            return redirect()->route('managelayanan')->with('error', 'Data layanan tidak ditemukan!');
        }
    }
    public function pembayaran(Request $request)
    {
        $pembayaran = Pembayaran::all();
        $data['admin'] = Admin::where('admin_id', session()->get('admin_id'))->get();
        $data['title'] = "Semua Pembayaran";
        return view('administrator/managepembayaran', ['pembayaran' => $pembayaran], $data);
    }
    public function editpembayaran(Request $request)
    {
        $pembayaran = Pembayaran::where('id_pembayaran', $request->id)->first();
        $data['admin'] = Admin::where('admin_id', session()->get('admin_id'))->get();
        $data['title'] = "Ubah Data Pembayaran";
        return view('administrator/editpembayaran', ['pembayaran' => $pembayaran], $data);
    }
    public function editpembayaran_action(Request $request)
    {
        $pembayaran = Pembayaran::where('id_pembayaran', $request->id)->first();
        if($pembayaran) {
            $pembayaran->pembayaran = $request->pembayaran;
            $pembayaran->nama = $request->nama_pembayaran;
            $pembayaran->save();
            return redirect()->route('managepembayaran')->with('success', 'Data pembayaran berhasil diubah!');
        }
        else {
            return redirect()->route('managepembayaran')->with('error', 'Data pembayaran tidak ditemukan!');
        }
    }
    public function jenis(Request $request)
    {
        $jenis = Jenis::all();
        $data['admin'] = Admin::where('admin_id', session()->get('admin_id'))->get();
        $data['title'] = "Semua Jenis Laundry";
        return view('administrator/managejenis', ['jenis' => $jenis], $data);
    }
    public function editjenis(Request $request)
    {
        $jenis = Jenis::where('id_jenis', $request->id)->first();
        $data['admin'] = Admin::where('admin_id', session()->get('admin_id'))->get();
        $data['title'] = "Ubah Data Jenis Laundry";
        return view('administrator/editjenis', ['jenis' => $jenis], $data);
    }
    public function editjenis_action(Request $request)
    {
        $jenis = Jenis::where('id_jenis', $request->id)->first();
        if($jenis) {
            $jenis->jenis = $request->jenis;
            $jenis->nama_jenis = $request->nama_jenis;
            $jenis->harga = $request->harga;
            $jenis->save();
            return redirect()->route('managejenis')->with('success', 'Data jenis berhasil diubah!');
        }
        else {
            return redirect()->route('managejenis')->with('error', 'Data jenis tidak ditemukan!');
        }
    }
    public function pengaturan()
    {
        $admin = Admin::where('admin_id', session()->get('admin_id'))->get();
        $data['title'] = "Pengaturan Akun";
        return view('administrator/pengaturan', ['admin' => $admin], $data);
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'password_sekarang' => 'required',
        ]);
    
        $admin = Admin::where('admin_id', session()->get('admin_id'))->first();
        if (!Hash::check($request->password_sekarang, $admin->password)) {
            return redirect()->route('pengaturan')->with('error', 'Password anda salah!');
        }
    
        $admin->nama = $request->nama;
        $admin->alamat = $request->alamat;
        $admin->nohp = $request->nohp;
    
        if($request->password_baru != null) {
            if(Hash::check($request->password_sekarang, $admin->password) && $request->password_baru == $request->password_baru2) {
                $admin->password = Hash::make($request->password_baru);
            } else {
                return redirect()->route('pengaturan')->with('error', 'Gagal ubah password');
            }
        }
        
        $admin->save();
        return redirect()->route('pengaturan')->with('success', 'Profile berhasil diubah!');
    }

    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $this->middleware('auth.admin');
    }

}
