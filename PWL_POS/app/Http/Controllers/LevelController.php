<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class LevelController extends Controller
{
    public function index() {
        // DB::insert('insert into m_level (level_kode, level_nama, created_at) values(?,?,?)', ['CUS','Pelanggan', now()]);
        // return 'insert data baru Berhasil';

        // $row = DB::update('update m_level set level_nama = ? where level_kode = ?', ['Customer', 'CUS']);
        // return 'Update data berhasil. Jumlah data yang diupdate: ' . $row. '  baris';

        // $row = DB:: delete('delete from m_level where level_kode = ?', ['CUS']);
        // return 'Delete data berhasil. Jumlah data yang dihapus: ' . $row. 'baris'; \

        // $data = DB::select('select * from m_level');
        // return view('level', ['data' => $data]);

        $breadcrumb = (object)[
            'title' => 'Daftar Level',
            'list'  => ['Home', 'level']
        ];
   
        $page = (object)[
            'title' => 'Daftar level yang terdaftar dalam sistem',
        ];
   
        $activeMenu = 'level';
        $level = LevelModel::all();
        return view('level.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'level' => $level]);

    }
    public function list(Request $request)
    {
       $levels = LevelModel::select('level_id', 'level_kode', 'level_nama');
 
       if ($request->level_id) {
          $levels->where('level_id', $request->level_id);
       }
 
       return DataTables::of($levels)
          // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
          ->addIndexColumn()
          ->addColumn('action', function ($level) { // menambahkan kolom action
             $btn = '<a href="' . url('/level/' . $level->level_id) . '" class="btn btn-info btn-sm">Detail</a> ';
             $btn .= '<a href="' . url('/level/' . $level->level_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
             $btn .= '<form class="d-inline-block" method="POST" action="' . url('/level/' . $level->level_id) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\')">Hapus</button></form>';
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

    public function create()
   {
      $breadcrumb = (object) [
         'title' => 'Tambah level',
         'list' => ['Home', 'level', 'Tambah']
      ];
      $page = (object) [
         'title' => 'Tambah level baru'
      ];
      $activeMenu = 'level';
      return view('level.create', ['breadcrumb' => $breadcrumb, 'page' => $page,'activeMenu' => $activeMenu]);
   }  

   public function store(Request $request)
   {
      $request->validate([
         'level_kode' => 'required | string | min:3 | unique:m_level,level_kode',
         'level_nama' => 'required | string | max:100',
      ]);

      LevelModel::create([
         'level_kode' => $request->level_kode,
         'level_nama' => $request->level_nama,
      ]);

      return redirect('/level')->with('success', 'Data level berhasil ditambahkan');
   }

   function edit(string $id)
   {
      $levels = LevelModel::find($id);
     
      $breadcrumb = (object)[
         'title' => 'Edit level',
         'list' => ['Home', 'level', 'Edit']
      ];

      $page = (object)[
         'title' => 'Edit level'
      ];

      $activeMenu = 'level';

      return view('level.edit', [
         'breadcrumb' => $breadcrumb,
         'page' => $page,
         'level' => $levels,
         'activeMenu' => $activeMenu
      ]);
   }

   function update(Request $request, string $id)
   {
      $request->validate([
         'level_kode'     => 'required|string|min:3|unique:m_level,level_kode,' . $id . ',level_id',
         'level_nama'     => 'required|string|max:100'
      ]);

      LevelModel::find($id)->update([
         'level_kode' => $request->level_kode,
         'level_nama'     => $request->level_nama,
      ]);

      return redirect('/level')->with('succsess', 'Data Level berhasil diubah');
   }

   function destroy(string $id)
   {
      $check = LevelModel::find($id);
      if (!$check) {
         return redirect('/level')->with('erorr', 'Data tidak ditemukan');
      }
      try {
         LevelModel::destroy($id);

         return redirect('/level')->with('succsess', 'Data level berhasil dihapus');
      } catch (\Illuminate\Database\QueryException $e) {
         return redirect('/level')->with('erorr', 'Data level gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
      }
   }
   
   public function show(string $id)
   {
      $level = LevelModel::find($id);

      $breadcrumb = (object) [
         'title' => 'Detail level',
         'list' => ['Home', 'level', 'Detail']
      ];

      $page = (object) [
         'title' => 'Detail level'
      ];

      $activeMenu = 'level'; // Set menu yang sedang aktif

      return view('level.show', [
         'breadcrumb' => $breadcrumb,
         'page' => $page,
         'level' => $level,
         'activeMenu' => $activeMenu
      ]);
    }
}   
