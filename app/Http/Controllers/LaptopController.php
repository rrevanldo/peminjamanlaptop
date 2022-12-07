<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Models\Laptop;
use Illuminate\Http\Request;
use Carbon\Carbon;


class LaptopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function data(Laptop $laptop)
    {
        //
        return view('dashboard.data');
    }

    // public function complated()
    // {
    //     $laptops = Laptop::where([
    //         ['id', '=', Auth::user()->id],
    //         ['status', '=', 1],
    //     ])->get();

    //     return view('dashboard.index' , compact('laptops'));
    // }

    public function updateComplated($id)
    {
        // $id pada parameter mengambil data dari path dinamis {id}
        // cari data yang memiliki value column route, maka update baris data tersebut
        Laptop::where('id', $id)->update([
            'status' => 1,
            'done_time' => Carbon::now(),
        ]);
        return redirect()->route('index')->with('done', 'Laptop Sudah dikembalikan!');
    }

    public function index()
    {
        $laptops = Laptop::all();
        return view('dashboard.index' , compact('laptops'));
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
        return redirect()->route('index')->with('successAdd','Berhasil menambahkan data Peminjaman Laptop!');
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
        return redirect()->route('index')->with('successUpdate', 'Data berhasil diperbaharui!');
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
        return redirect()->route('index')->with('successDelete', 'Berhasil menghapus data Peminjaman Laptop!');
    }
}
