<style>
    .nav-link:hover {
        color: #ffcc00; 
        background-color: #333333;  
        text-decoration: none;
    }

    .active {
        color: #ffcc00; 
        background-color: #333333; 
        text-decoration: none;
    }
</style>

<li class="nav-item">
    <a href="{{ route('admin.dashboard') }}" 
        class="nav-link text-light {{ request()->is('dashboard') ? 'active' : '' }}">
        <span style="margin-right: 3px"><i class="bi bi-house-door"></i></span>
        Beranda
    </a>
</li> 
<li class="nav-item">
    <a href="{{ route('admin.profile') }}"
        class="nav-link text-light {{ request()->is('profile') ? 'active' : '' }}">
        <span style="margin-right: 3px"><i class="bi bi-person"></i></span>
        Profile Saya
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('usersmanagement.index') }}" 
        class="nav-link text-light {{ (Route::currentRouteName() == 'usersmanagement.index' || Route::currentRouteName() == 'users.create' || Route::currentRouteName() == 'users.edit') ? 'active' : '' }}">
        <span style="margin-right: 3px"><i class="bi bi-people"></i></span>
        Data User
    </a>
</li> 
<li class="nav-item">
    <a href="{{ route('category.index') }}" 
        class="nav-link text-light {{ (Route::currentRouteName() == 'category.index' || Route::currentRouteName() == 'category.create' || Route::currentRouteName() == 'category.edit') ? 'active' : '' }}">
        <span style="margin-right: 3px"><i class="bi bi-list-ol"></i></span>
        Kategori Barang
    </a>
</li> 
<li class="nav-item">
    <a href="{{ route('produk.index') }}" 
        class="nav-link text-light {{ (Route::currentRouteName() == 'produk.index' || Route::currentRouteName() == 'produk.create' || Route::currentRouteName() == 'produk.edit') ? 'active' : '' }}">
        <span style="margin-right: 3px"><i class="bi bi-journal-text"></i></span>
        Data Barang
    </a>
</li> 