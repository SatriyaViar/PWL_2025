<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Menampilkan pesan Welcome
    public function index()
    {
        return "Show 'Welcome' Message";
    }

    // Menampilkan Nama dan NIM
    public function about()
    {
        return "Show Name and NIM";
    }

    // Menampilkan halaman artikel dengan ID dari URL
    public function articles($id)
    {
        return "Article Page with ID $id";
    }
}
