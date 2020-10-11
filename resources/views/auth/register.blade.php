<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    {{-- <link rel="stylesheet" href="{{ asset('bootstrap-4.1.3/dist/css/bootstrap.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>

    <div class="container" style="background-image: url('toko.jpg')">
        <div class="login-wrapper">
            <h1 class="title">Silahkan Register</h1>
            <hr>
            <form action="{{ route('register') }}" method="POST" class="login-form">
                @csrf
                <input type="text" class="input" placeholder="Masukkan Nama" name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror

                <input type="email" class="input" placeholder="Masukkan Email" name="email" value="{{ old('email') }}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror

                <input type="password" class="input" placeholder="Masukkan Password" name="password" required>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror

                <input type="password" id="password-confirm" placeholder="Konfirmasi Password" name="password_confirmation" class="input" required>

                <textarea name="address" id="address" rows="3" placeholder="Masukkan Alamat"></textarea>
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror

                <input type="text" class="input" placeholder="Masukkan No Hp" name="phone" required>
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror

                <button type="submit">Daftar</button>
                <p class="message">Anda sudah punya akun ? <a href="/login">Masuk</a></p>
            </form>
        </div>
    </div>
    
</body>
</html>