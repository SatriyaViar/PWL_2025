<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\StockModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class StockController extends Controller
{
   function index()
   {
      $breadcrumb = (object)[
         'title' => 'Daftar Stock',
         'list'  => ['Home', 'Stock']
      ];

      $page = (object)[
         'title' => 'Daftar Stok Barang yang terdaftar dalam sistem',
      ];

      $activeMenu = 'stok';

      $barang = BarangModel::all();

      return view('stock.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'barang' => $barang]);
   }

   public function create()
   {
      $breadcrumb = (object) [
         'title' => 'Tambah Stock',
         'list' => ['Home', 'Stock', 'Tambah']
      ];
      $page = (object) [
         'title' => 'Tambah stock baru'
      ];
      $barang = barangModel::all();
      $user = UserModel::all();

      $activeMenu = 'stock';

      return view('stock.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'barang' => $barang, 'user' => $user, 'activeMenu' => $activeMenu]);
   }

   function edit(string $id)
   {
      $stock = StockModel::find($id);
      $barang = BarangModel::all();

      $breadcrumb = (object)[
         'title' => 'Edit stock',
         'list' => ['Home', 'stock', 'Edit']
      ];

      $page = (object)[
         'title' => 'Edit stock'
      ];

      $activeMenu = 'stock';

      return view('stock.edit', [
         'breadcrumb' => $breadcrumb,
         'page' => $page,
         'stock' => $stock,
         'barang' => $barang,
         'activeMenu' => $activeMenu
      ]);
   }

   function update(Request $request, string $id)
   {
      $request->validate([
         'username' => 'required|string|min:3|unique:m_user,username,' . $id . ',user_id',
         'nama'     => 'required|string|max:100',
         'password' => 'nullable|min:5',
         'level_id'    => 'required|integer'
      ]);

      StockModel::find($id)->update([
         'username' => $request->username,
         'nama'     => $request->nama,
         'level_id' => $request->level_id
      ]);

      return redirect('/user')->with('succsess', 'Data user berhasil diubah');
   }

   public function store(Request $request)
   {
       // Validasi input
       $request->validate([
           'barang_id' => 'required|exists:m_barang,barang_id',
           'stok_jumlah' => 'required|numeric|min:1',
           'stok_tanggal' => 'required|date',
       ]);
   
       // Mendapatkan user_id dari pengguna yang sedang login
       $user_id = auth()->id();  // Mendapatkan ID pengguna yang sedang login
   
       // Cek apakah barang sudah ada di stok
       $stock = StockModel::where('barang_id', $request->barang_id)->first();
   
       if ($stock) {
           // Jika stok sudah ada, update jumlah stok
           $stock->stok_jumlah += $request->stok_jumlah;
           $stock->stok_tanggal = $request->stok_tanggal; // Update tanggal stok
           $stock->user_id = $user_id;  // Menyimpan user_id (ID pengguna yang sedang login)
           $stock->save();
   
           return redirect()->route('stock.index')->with('success', 'Stok berhasil diperbarui!');
       } else {
           // Jika stok belum ada, buat stok baru
           StockModel::create([
               'barang_id' => $request->barang_id,
               'stok_jumlah' => $request->stok_jumlah,
               'stok_tanggal' => $request->stok_tanggal,
               'user_id' => $user_id  // Menyimpan user_id (ID pengguna yang sedang login)
           ]);
   
           return redirect()->route('stock.index')->with('success', 'Stok baru berhasil ditambahkan!');
       }
   }
   

   public function list(Request $request)
   {
      $stock = StockModel::select('stock_id', 'stok_tanggal', 'stok_jumlah', 'barang_id', 'user_id')
         ->with('barang','user');

      if ($request->barang_id) {
         $stock->where('barang_id', $request->barang_id);
      }

      return DataTables::of($stock)
         // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
         ->addIndexColumn()
         ->addColumn('action', function ($stock) { // menambahkan kolom action
            // $btn = '<a href="' . url('/stok/' . $stok->stok_id) . '" class="btn btn-info btn-sm">Detail</a> ';
            // $btn .= '<a href="' . url('/stok/' . $stok->stok_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
            // $btn .= '<form class="d-inline-block" method="POST" action="' . url('/stok/' . $stok->stok_id) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\')">Hapus</button></form>';
            // return $btn;

            //AJAX
            $btn = '<button onclick="modalAction(\'' . url('/stock/' . $stock->stock_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
            $btn .= '<button onclick="modalAction(\'' . url('/stock/' . $stock->stock_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
            $btn .= '<button onclick="modalAction(\'' . url('/stock/' . $stock->stock_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
            return $btn;
         })
         ->rawColumns(['action']) // memberitahu bahwa kolom action adalah html
         ->make(true);
   }
}
