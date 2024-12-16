<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produk;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $produkCount = Produk::count();
        $categoryCount = Category::count();

        return view('admin.dashboard', [
            'user_count' => $userCount,
            'produk_count' => $produkCount,
            'category_count' => $categoryCount,
        ]);
    }

    public function adminProfile()
    {
        return view('admin.profile');
    }
}
