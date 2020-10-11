@extends('template.user')

@section('title','Halaman Produk')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/shop.css') }}">
@endsection

@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="category">
                        <h2 id="category-label">Kategori</h2>
                        <ul class="list-group">
                            <li class="list-group-item {{ $id == null ? 'active' : '' }}">
                                <a href="{{ route('shop') }}">All</a>
                            </li>
                            @foreach ($categories as $category)
                                <li class="list-group-item {{ $category->id == $id ? 'active' : '' }}">
                                    <a href="{{ route('category', $category->id) }}}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <h2 class="text-center mt-5" id="category-label">Cari Produk</h2>
                    <form action="/shop" class="form-inline ml-5" method="GET">
                        <input type="text" class="form-control" name="search">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </form>
                </div>
                <div class="col-lg-8">
                    <div class="item-list">
                        <h1>Produk Kami</h1>
                        <hr style="margin-bottom: 2em;">
                        <div class="row list-product">
                            @foreach ($products as $product)
                                <div class="col-lg-4 item-mb-5">
                                    <a href="/shop/detail/{{ $product->id }}">
                                        <img src="{{ asset($product->image) }}" alt="gambar" height="180" width="180">
                                    </a>
                                    <p class="product-name mt-3 font-weight-bold"><a href=""></a>{{ $product->name }}</p>
                                    <p class="product-price">Rp. {{ number_format($product->price) }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection