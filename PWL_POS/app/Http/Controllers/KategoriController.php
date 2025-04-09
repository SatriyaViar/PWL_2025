<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class KategoriController extends Controller
{
    public function index() {
        // $data = [
        //     'kategori_kode' => 'SNK',
        //     'kategori_nama' => 'Snack/Makanan Ringan',
        //     'created_at'    => now()
        // ];
        // DB::table('m_kategori') -> insert($data);
        // return 'Insert data baru berhasil';

        //$row = DB::table('m_kategori')->where('kategori_kode', 'SNK') -> update(['kategori_nama' => 'Camilan']);
        //return 'Update data berhasil. Jumlah data yang diupdate: ' . $row. 'baris';

        //$row = DB::table('m_kategori') ->where('kategori_kode', 'SNK')->delete();
        //return 'Delete data berhasil. Jumlah data yang dihapus: ' . $row . 'baris';

        // $data = DB::table('m_kategori')->get();
        // return view('kategori', ['data' => $data]);

        //JOBSHIT 6 
        $breadcrumb = (object)[
            'title' => 'Daftar kategori',
            'list'  => ['Home', 'kategori']
        ];
        $page = (object)[
            'title' => 'Daftar kategori yang terdaftar dalam sistem',
        ];
        $activeMenu = 'kategori';
        $kategori = KategoriModel::all();
        return view('kategori.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'kategori' => $kategori]);
    }

    public function list(Request $request)
    {
       $kategori = KategoriModel::select('kategori_id', 'kategori_kode', 'kategori_nama');
 
       if ($request->kategori_id) {
          $kategori->where('kategori_id', $request->kategori_id);
       }
 
       return DataTables::of($kategori)
          // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
          ->addIndexColumn()
          ->addColumn('action', function ($kategori) { // menambahkan kolom action
             $btn = '<a href="' . url('/kategori/' . $kategori->kategori_id) . '" class="btn btn-info btn-sm">Detail</a> ';
             $btn .= '<a href="' . url('/kategori/' . $kategori->kategori_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
             $btn .= '<form class="d-inline-block" method="POST" action="' . url('/kategori/' . $kategori->kategori_id) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\')">Hapus</button></form>';
             return $btn;
 
            //  //AJAX
            //  $btn = '<button onclick="modalAction(\'' . url('/level/' . $level->level_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
            //  $btn .= '<button onclick="modalAction(\'' . url('/level/' . $level->level_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
            //  $btn .= '<button onclick="modalAction(\'' . url('/level/' . $level->level_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
            //  return $btn;
          })
          ->rawColumns(['action']) // memberitahu bahwa kolom action adalah html
          ->make(true);
    }

    public function create(){
      $breadcrumb = (object) [
         'title' => 'Tambah kategori',
         'list' => ['Home', 'kategori', 'Tambah']
      ];
      $page = (object) [
         'title' => 'Tambah kategori baru'
      ];
      $activeMenu = 'kategori';
      return view('kategori.create', ['breadcrumb' => $breadcrumb, 'page' => $page,'activeMenu' => $activeMenu]);
   }

   public function store(Request $request)
   {
      $request->validate([
         'kategori_kode' => 'required | string | min:3 | unique:m_kategori,kategori_kode',
         'kategori_nama' => 'required | string | max:100',
      ]);

      KategoriModel::create([
         'kategori_kode' => $request->kategori_kode,
         'kategori_nama' => $request->kategori_nama,
      ]);

      return redirect('/kategori')->with('success', 'Data kategori berhasil ditambahkan');
   }
   
   function edit(string $id)
   {
      $kategori = KategoriModel::find($id);
     
      $breadcrumb = (object)[
         'title' => 'Edit kategori',
         'list' => ['Home', 'kategori', 'Edit']
      ];

      $page = (object)[
         'title' => 'Edit kategori'
      ];

      $activeMenu = 'kategori';
      return view('kategori.edit', [
         'breadcrumb' => $breadcrumb,
         'page' => $page,
         'kategori' => $kategori,
         'activeMenu' => $activeMenu
      ]);
   }

   function update(Request $request, string $id)
   {
      $request->validate([
         'kategori_kode'     => 'required|string|min:3|unique:m_kategori,kategori_kode,' . $id . ',kategori_id',
         'kategori_nama'     => 'required|string|max:100'
      ]);

      KategoriModel::find($id)->update([
         'kategori_kode'     => $request->kategori_kode,
         'kategori_nama'     => $request->kategori_nama,
      ]);

      return redirect('/kategori')->with('succsess', 'Data Kategori berhasil diubah');
   }

   function destroy(string $id)
   {
      $check = KategoriModel::find($id);
      if (!$check) {
         return redirect('/kategori')->with('erorr', 'Data tidak ditemukan');
      }
      try {
         KategoriModel::destroy($id);

         return redirect('/kategori')->with('succsess', 'Data kategori berhasil dihapus');
      } catch (\Illuminate\Database\QueryException $e) {
         return redirect('/kategori')->with('erorr', 'Data kategori gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
      }
   }
   
   public function show(string $id)
   {
      $kategori = KategoriModel::find($id);

      $breadcrumb = (object) [
         'title' => 'Detail kategori',
         'list' => ['Home', 'kategori', 'Detail']
      ];

      $page = (object) [
         'title' => 'Detail kategori'
      ];

      $activeMenu = 'kategori'; // Set menu yang sedang aktif

      return view('kategori.show', [
         'breadcrumb' => $breadcrumb,
         'page' => $page,
         'kategori' => $kategori,
         'activeMenu' => $activeMenu
      ]);
    }
}
