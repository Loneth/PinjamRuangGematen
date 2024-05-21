<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms =  Room::all();
        return view('room', ['rooms' => $rooms]);
    }
    public function create()
    {
        return view('room-add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'NamaRuang' => 'required',
            'Kapasitas' => 'required',
            'Gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $input = $request->all();

        if ($Gambar = $request->file('Gambar')) {
            $destionationPath = 'Gambar/';
            $profileGambar = date('YmdHis') . "." . $Gambar->getClientOriginalextension();
            $Gambar->move($destionationPath, $profileGambar);
            $input['Gambar'] = $profileGambar;
        }
        Room::create($input);
        return redirect()->route('room')
            ->with('success', 'Ruang berhasil ditambah');
    }
    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('room-edit', compact('room'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'NamaRuang' => 'required',
            'Kapasitas' => 'required',
            'Gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // ubah validasi untuk gambar
        ]);

        $room = Room::findOrFail($id);
        $input = $request->all();

        if ($Gambar = $request->file('Gambar')) {
            $destinationPath = 'Gambar/';
            $profileGambar = date('YmdHis') . "." . $Gambar->getClientOriginalExtension();
            $Gambar->move($destinationPath, $profileGambar);
            $input['Gambar'] = $profileGambar;
        } else {
            unset($input['Gambar']);
        }

        $room->update($input); // perbarui data ruangan
        return redirect()->route('room')->with('success', 'Ruang berhasil diubah');
    }
    public function destroy($id)
    {
        $room = Room::findOrFail($id); // Temukan ruangan berdasarkan ID

        // Hapus ruangan
        $room->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('room')->with('success', 'Ruang berhasil dihapus');
    }
}
