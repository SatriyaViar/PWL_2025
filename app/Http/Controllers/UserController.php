<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
   function index()
   {
      $breadcrumb = (object)[
         'title' => 'Daftar User',
         'list'  => ['Home', 'User']
      ];

      $page = (object)[
         'title' => 'Daftar User yang terdaftar dalam sistem',
      ];

      $activeMenu = 'User';

      return view('user.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
   }

   public function list(Request $request)
   {
      $users = UserModel::select('user_id', 'username', 'nama', 'level_id')
         ->with('level');

      if ($request->ajax()) {
         if ($request->level_id) {
            $users->where('level_id', $request->level_id);
         }
      }

      return DataTables::of($users)
         // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
         ->addIndexColumn()
         ->addColumn('aksi', function ($user) { // menambahkan kolom aksi
            $btn = '<a href="' . url('/user/' . $user->user_id) . '" class="btn btn-info btn-sm">Detail</a> ';
            $btn .= '<a href="' . url('/user/' . $user->user_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
            $btn .= '<form class="d-inline-block" method="POST" action="' . url('/user/' . $user->user_id) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\')">Hapus</button></form>';
            return $btn;
         })
         ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
         ->make(true);
   }
   public function create()
   {
      $breadcrumb = (object) [
         'title' => 'Tambah User',
         'list' => ['Home', 'User', 'Tambah']
      ];
      $page = (object) [
         'title' => 'Tambah user baru'
      ];
      $level = LevelModel::all();
      $activeMenu = 'user';
      return view('user.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
   }
   public function store(Request $request)
   {
      $request->validate([
         'level_id' => 'required | integer',
         'username' => 'required | string | min:3 | unique:m_user,username',
         'nama' => 'required | string | max:100',
         'password' => 'required | min:5'
      ]);

      UserModel::create([
         'level_id' => $request->level_id,
         'username' => $request->username,
         'nama' => $request->nama,
         'password' => bcrypt($request->password)
      ]);

      return redirect('/user')->with('success', 'Data user berhasil ditambahkan');
   }

   public function show(string $id)
   {
      $user = UserModel::with('level')->find($id);

      $breadcrumb = (object) [
         'title' => 'Detail User',
         'list' => ['Home', 'User', 'Detail']
      ];

      $page = (object) [
         'title' => 'Detail User'
      ];

      $activeMenu = 'user'; // Set menu yang sedang aktif

      return view('user.show', [
         'breadcrumb' => $breadcrumb,
         'page' => $page,
         'user' => $user,
         'activeMenu' => $activeMenu
      ]);
   }
}
