<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    private $arr = [
        ['id' => 1,'nama'=>'Faza', 'kelas'=>'xii rpl 1'],
        ['id' => 2,'nama'=>'Ubed', 'kelas'=>'xii rpl 2'],
        ['id' => 3,'nama'=>'Cemen', 'kelas'=>'xii rpl 3'],
    ];

    public function index()
    { // memberikan daftar data
        $siswa = session('siswa_data', $this->arr);
        return view('siswa.index', ['siswa' => $siswa]);
    }

    public function show($id)
    {
        $data = session('siswa_data', $this->arr);
        $siswa = collect($data)->firstWhere('id', $id);
        if(!$siswa){
            abort(404);
        }
        return view('siswa.show', compact('siswa'));
    }
    public function create()
    {
        return view('siswa.create');
    }
    public function store(Request $request)
    {
        $siswa = session('siswa_data', $this->arr);
        // membuat increment id otomatis
        $newId = collect($siswa)->max('id') + 1;
        // tambah data
        $siswa[] = [
            'id' => $newId,
            'kelas' => $request->kelas,
            'nama' => $request->nama
        ];

        session(['siswa_data' => $siswa]);

        return redirect('/siswa');
    }

    
    public function edit($id)
    {
        $data = session('siswa_data', $this->arr);
        $siswa = collect($data)->firstWhere('id', $id);
        if(!$siswa){
            abort(404);
        }
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        // mengambil data siswa dari session siswa_data
        $data = session('siswa_data', $this->arr);

        // mencari data berdasarkan id
        $siswaId = collect($data)->search(fn($item) =>
            $item['id'] == $id
        );

        // dd($siswaId);
        // mengubah isi data nama dan kelas
        $data[$siswaId]['nama'] = $request->nama;
        $data[$siswaId]['kelas'] = $request->kelas;

        session(['siswa_data' => $data]);
        return redirect('/siswa');
    }
    public function destroy($id)
    {
        // mengambil data siswa dari session siswa_data
        $siswa = session('siswa_data', $this->arr);
        $index = array_search($id, array_column($siswa, 'id'));

        array_splice($siswa, $index, 1);

        session(['siswa_data'=> $siswa]);

        return redirect('siswa');
    }
}
