<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Toko Kita</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-4.1.3/dist/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @guest
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="#">Toko Kita</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
			<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
				<li class="nav-item">
					<a class="nav-link underline" href="">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link underline" href="">About Us</a>
				</li>
				<li class="nav-item">
					<a class="nav-link underline" href="">Our Product</a>
				</li>
				<li class="nav-item">
					<a class="nav-link button" href="/login">Sign In</a>
                </li>
			</ul>
		</div>
    </nav>
    @else
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Toko Kita</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link underline" href="/cart"><i class="fa fa-shopping-cart">Cart</i></a>
                </li>  
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                        <form action="/logout" id="logout-form" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    @endguest   
    <div class="content" style="background-image: url('toko.jpg')">
        <h1 class="title" style="background-color: black;">Toko Kita</h1>
        <h3 style="background-color: black;">Solusi kebutuhan anda</h3>
    </div>
    <div class="container">
		<div class="products">
			<h1 id="featured">Featured Products</h1>
			<div class="row list-product">
				@foreach ($products as $product)
                    <div class="col-lg-4 col-md-6">
                        <a href="">
                            <img src="{{ asset($product->image) }}" alt="gambar" height="150" width="150">
                        </a>
                        <p class="product_name"><a href="">{{ $product->name }}</a></p>
                        <p class="product_price">Rp. {{ number_format($product->price) }}</p>
                    </div>
                @endforeach
			</div>
		</div>
		<a href="" class="more">View More Products </a>
	</div>
    
    <footer class="footer-distributed">
        <div class="footer-right">
            <a href=""><i class="fa fa-facebook"></i></a>
            <a href=""><i class="fa fa-twitter"></i></a>
            <a href=""><i class="fa fa-linkedin"></i></a>
            <a href=""><i class="fa fa-instagram"></i></a>
        </div>
        <div class="footer-left">
            <p class="footer-links">
                <a href="">Home</a>
                <a href="">Shop</a>
                <a href="">About</a>
                <a href="">FAQ</a>
            </p>
            <p>Toko Kita &copy; 2020</p>
        </div>
    </footer>

<script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('bootstrap-4.1.3/dist/js/bootstrap.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>