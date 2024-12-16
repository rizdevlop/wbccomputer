<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $produk = Produk::all(); 
        return view('user.home', compact('produk'));
    }
}
