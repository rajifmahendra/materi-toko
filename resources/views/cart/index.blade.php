@extends('template.user')

@section('title', 'Halaman Cart')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endsection

@section('content')
    <div class="container">
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        @if (Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif
        @php
            $total = 0;
        @endphp

        @if ($carts->count() == 0)
            <p style="text-align: center;">Cart masih kosong</p>
        @endif

        <h3>{{ $carts->count() }} Barang di cart anda</h3>

    @foreach ($carts as $cart)
    <div class="cart">
        <div class="row">
            <div class="col-lg-3">
                <img src="{{ asset($cart->product->image) }}" alt="gambar" height="180" width="180">
            </div>
            <div class="col-lg-9">
                <div class="top">
                    <p class="item-name">{{ $cart->product->name }}</p>
                    <div class="top-right">
                        <p>Rp. {{ number_format($cart->product->price) }}</p>
                        <select name="qty" id="qty" class="quantity" data-item="{{ $cart->id }}">
                            @for ($i = 1; $i < 10; $i++)
                                <option value="{{ $i }}" {{ $cart->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                        <p class="total-item">Rp. {{ number_format($cart->product->price * $cart->qty) }}</p>
                    </div>
                </div>
                <hr class="mt-2 mb-2">
                <div class="bottom">
                    <div class="row">
                        <p class="col-lg-6 item-desc">{{ $cart->product->desc }}</p>
                        <div class="offset-lg-4">

                        </div>
                        <div class="col-lg-2">
                            <form action="" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php
        $total += ($cart->product->price * $cart->qty)
    @endphp
    </div>
    @endforeach

    <div class="total">
        <h4 class="total-price">Total Harga : Rp. <b>{{ number_format($total) }}<b></h4>
    </div>
        

    <form action="/checkout" method="POST" style="margin-left: 400px;">
        @csrf
        <button type="submit" class="btn btn-primary">Checkout</button>
    </form>
@endsection

@section('js')
    <script>
        (function(){
            const classname = document.querySelectorAll('.quantity');

            Array.from(classname).forEach(function(element){
                element.addEventListener('change', function(){
                    const id = element.getAttribute('data-item');
                    axios.patch(`/cart/${id}`, {
                        quantity: this.value,
                        id: id
                    })
                    .then(function(response){
                        window.location.href = '/cart'
                    })
                    .catch(function(error){
                        console.log(error)
                    })
                })
            })
        })();
    </script>
@endsection