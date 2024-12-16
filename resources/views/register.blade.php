<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href={{ asset('favicon.ico') }} />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/stylelogin.css') }}">
    <title>WBC Computer | Register</title>
</head>
<body>

    <!----------------------- Main Container -------------------------->

     <div class="container d-flex justify-content-center align-items-center min-vh-100">

    <!----------------------- Login Container -------------------------->

       <div class="row border rounded-5 p-3 bg-white shadow box-area">

    <!--------------------------- Left Box ----------------------------->

       <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe;">
           <div class="featured-image mb-3">
            <img src="{{ asset('img/login.png') }}" class="img-fluid" style="width: 250px;">
           </div>
           <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Dapatkan Verifikasi</p>
           <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Bergabunglah dengan banyak pelanggan yang memanfaatkan layanan IT kami yang lengkap.</small>
       </div> 

    <!-------------------- ------ Right Box ---------------------------->
        
       <div class="col-md-6 right-box">
        @if (session('status'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
          <div class="row align-items-center">
                <div class="header-text mb-4">
                    <h2>Selamat Datang di WBC Computer</h2>
                    <p>Mulai perjalanan Anda dengan mendaftar hari ini!</p>                    
                </div>
                <form action="" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" 
                        value="{{ old('username') }}" id="username" name="username" placeholder="Username" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control form-control-lg bg-light fs-6" 
                        value="{{ old('password') }}" id="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="tel" class="form-control form-control-lg bg-light fs-6" 
                        value="{{ old('phone') }}" id="phone" name="phone" placeholder="Nomer HP" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control form-control-lg bg-light fs-6" 
                        value="{{ old('email') }}" id="email" name="email" placeholder="E-mail" required>
                    </div>
                    <div class="input-group mb-4">
                        <textarea class="form-control form-control-lg bg-light fs-6" rows="4" 
                        id="address" name="address" placeholder="Alamat" required>{{ old('address') }}</textarea>
                    </div>                
                    <div class="input-group">
                        <button type="submit" class="btn btn-lg btn-primary w-100 fs-6">Sign Up</button>
                    </div>
                    <div class="row mt-3">
                        <small>Sudah punya akun? <a href="{{ url('/login') }}">Sign In</a></small>
                    </div>
                </form>
          </div>
       </div> 

      </div>
    </div>

</body>
</html>