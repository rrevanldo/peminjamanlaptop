<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Models\Laptop;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class LaptopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function data()
     {
         return view('dashboard.data');
     }

     public function login()
     {
         return view('dashboard.login');
     }
 
     public function register()
     {
         return view('dashboard.register');
     }

     public function inputRegister(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'name' => 'required|min:4|max:50',
            'username' => 'required|min:4|max:8',
            'password' => 'required',
        ]);
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/')->with('success', 'berhasil membuat akun!');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required',
        ],[
            'username.exists' => "This username doesn't exists"
        ]);

        $user = $request->only('username', 'password');
        if (Auth::attempt($user)) {
            return redirect()->route('dashboard.index');
        } else {
            return redirect('/')->with('fail', "Gagal login, periksa dan coba lagi!");
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function complated()
    {
        $laptops = Laptop::where([
            ['id', '=', Auth::user()->id],
            ['status', '=', 1],
        ])->get();

        return view('dashboard.index' , compact('laptops'));
    }

    public function index()
    {
        $laptops = Laptop::all();
        $hitung = Laptop::where('done_time', '=', null)->get();
        $hitungs = Laptop::where('done_time', '<>', null)->get();
        return view('dashboard.index' , compact('laptops', 'hitung', 'hitungs'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $request->validate([
            'nis' => 'required|min:3',
            'nama' => 'required|min:3',
            'region' => 'required|min:3',
            'purposes' => 'required|min:3',
            'ket' => 'required|min:3',
            'date' => 'required',
            'teacher' => 'required|min:3',
        ]);
        // tambah data
        Laptop::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'region' => $request->region,
            'purposes' => $request->purposes,
            'ket' => $request->ket,
            'date' => $request->date,
            'teacher' => $request->teacher,
            'status' => 0,
            'done_time' => NULL,
        ]);
        return redirect()->route('dashboard.index')->with('successAdd','Berhasil menambahkan data Peminjaman Laptop!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laptop  $laptop
     * @return \Illuminate\Http\Response
     */
    public function show(Laptop $laptop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laptop  $laptop
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $laptop = Laptop::where('id', $id)->first();
        return view('dashboard.edit', compact('laptop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laptop  $laptop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nis' => 'required|min:3',
            'nama' => 'required|min:3',
            'region' => 'required|min:3',
            'purposes' => 'required|min:3',
            'ket' => 'required|min:3',
            'date' => 'required',
            'teacher' => 'required|min:3',
        ]);
        //update data yg id nya sama dengan id dari route, updatenya ke db bagian table todos
        Laptop::where('id', $id)->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'region' => $request->region,
            'purposes' => $request->purposes,
            'ket' => $request->ket,
            'date' => $request->date,
            'teacher' => $request->teacher,
            'status' => 0,
        ]);
        //kalau berhasil bakal diarahkan ke halaman awal todo dengan pemberitahuan berhasil
        return redirect('/dashboard/')->with('successUpdate', 'Data berhasil diperbaharui!');
    }

    public function updateComplated($id)
    {
        // 
        Laptop::where('id', $id)->update([
            'status' => 1,
            'done_time' => Carbon::now(),
        ]);
        return redirect()->route('dashboard.index')->with('done', 'Laptop Sudah dikembalikan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laptop  $laptop
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Laptop::where('id', '=', $id)->delete();
        return redirect()->route('dashboard.index')->with('successDelete', 'Berhasil menghapus data Peminjaman Laptop!');
    }
}
