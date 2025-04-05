<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables as DataTablesDataTables;
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

      $activeMenu = 'user';

      $level = LevelModel::all();

      return view('user.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'level' => $level]);
   }

   public function list(Request $request)
   {
      $users = UserModel::select('user_id', 'username', 'nama', 'level_id')
         ->with('level');

         if ($request->level_id) {
            $users->where('level_id', $request->level_id);
         }

      return DataTables::of($users)
         // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
         ->addIndexColumn()
         ->addColumn('action', function ($user) { // menambahkan kolom action
            $btn = '<a href="' . url('/user/' . $user->user_id) . '" class="btn btn-info btn-sm">Detail</a> ';
            $btn .= '<a href="' . url('/user/' . $user->user_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
            $btn .= '<form class="d-inline-block" method="POST" action="' . url('/user/' . $user->user_id) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\')">Hapus</button></form>';
            return $btn;
         })
         ->rawColumns(['action']) // memberitahu bahwa kolom action adalah html
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

   function edit(string $id){
      $user = UserModel::find($id);
      $level = LevelModel::all();

      $breadcrumb = (object)[
         'title' => 'Edit User',
         'list' => ['Home', 'User', 'Edit']
      ];

      $page = (object)[
         'title' => 'Edit user'
      ];

      $activeMenu = 'user';

      return view('user.edit', [
         'breadcrumb' => $breadcrumb, 
         'page' => $page,
         'user' => $user,
         'level' => $level,
         'activeMenu' => $activeMenu
      ]);
   }

   function update(Request $request, string $id) {
      $request->validate([
         'username' => 'required|string|min:3|unique:m_user,username,'.$id.',user_id',
         'nama'     => 'required|string|max:100',
         'password' => 'nullable|min:5',
         'level_id'    => 'required|integer'
      ]);

      UserModel::find($id)->update([
         'username' => $request->username,
         'nama'     => $request->nama,
         'password' => $request-> password ? bcrypt($request->password) : UserModel::find($id)->password,
         'level_id' => $request-> level_id
      ]);

      return redirect('/user')->with('succsess', 'Data user berhasil diubah');
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

   function destroy(string $id) {
      $check = UserModel::find($id);
      if (!$check) {
         return redirect('/user')->with('erorr', 'Data tidak ditemukan');
      }

      try {
         UserModel::destroy($id);

         return redirect('/user')->with('succsess','Data user berhasil dihapus');
      } catch (\Illuminate\Database\QueryException $e) {
         return redirect('/user')->with('erorr', 'Data user gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
      }
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

   function create_ajax(){
      $level = LevelModel::select('level_id', 'level_nama')->get();

      return view('user.create_ajax')-> with('level',$level);
   }
}