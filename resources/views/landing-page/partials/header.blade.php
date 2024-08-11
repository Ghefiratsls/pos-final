<nav class="navbar navbar-expand-lg bg-primary shadow text-white">
    <div class="container">
        <a class="navbar-brand text-white fw-bold" href="#">
            {{ config('app.name') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ url('/') }}">
                        <i class="fa fa-home"></i> Home
                    </a>
                </li>
                @if (Auth::check())
                    <li class="nav-item">
                        <a href="{{ url('/riwayat-transaksi') }}" class="nav-link">
                            <i class="fa fa-book"></i> Riwayat Transaksi
                        </a>
                    </li>
                @endif
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                @if (!Auth::check())
                    <li class="nav-item">
                        <a href="{{ url('/login') }}" class="nav-link">
                            <i class="fa fa-sign-in"></i> Login
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        @if (!empty($keranjangDetail))
                            <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fa fa-cart-shopping"></i> Keranjang
                            </a>
                        @else
                            <button onclick="keranjangEmpty()" type="button" class="nav-link">
                                <i class="fa fa-cart-shopping"></i> Keranjang
                            </button>
                        @endif
                    </li>
                    @if (Auth::user()->akses == 3)
                        <li class="nav-item">
                            <a href="{{ url('/karyawan/dashboard') }}" class="nav-link">
                                <i class="fa fa-home"></i> Dashboard
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{ route('web.auth.logout') }}" class="nav-link">
                            <i class="fa fa-sign-out"></i> Logout
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@if (Auth::check() && !empty($keranjangDetail))
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        <i class="fa fa-shopping-cart"></i> Keranjang Belanja
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/checkout') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama-customer" class="mb-2">
                                        Nama Customer
                                        <small class="text-danger">*</small>
                                    </label>
                                    <input type="text" class="form-control" name="nama-customer"
                                        id="nama-customer" placeholder="Masukkan Nama Customer" required>
                                </div>
                            </div>
                        </div>
                        @forelse ($keranjangDetail as $item)
                            @php
                                $produk = $item['produk'] ?? null;
                            @endphp
                            @if ($produk)
                                <div class="card shadow mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <img src="{{ asset($produk['fotoProduk']) }}" alt="Gambar Produk" class="img-fluid" style="width: 100%; height: auto;">
                                            </div>
                                            <div class="col-md-8">
                                                <span class="produk fw-bold">
                                                    {{ $produk['namaProduk'] }}
                                                </span>
                                                <br>
                                                <small>
                                                    {{ $produk['kategori'] }}
                                                </small>
                                                <p class="harga-produk">
                                                    Rp. {{ number_format($produk['hargaProduk']) }}
                                                </p>
                                                <div class="form-group">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-4 mb-3">
                                                            <input type="number" class="form-control" name="qty-produk"
                                                                id="qty-produk-{{ $item['id'] }}"
                                                                value="{{ $item['qty'] }}" min="1"
                                                                max="{{ $item['max_qty'] }}">
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <button class="btn btn-primary btn-xs btn-simpan"
                                                                data-id="{{ $item['id'] }}">
                                                                <i class="fa fa-edit"></i> Simpan
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <p>Produk tidak tersedia.</p>
                            @endif
                        @empty
                            <p>Keranjang kosong.</p>
                        @endforelse
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                            <i class="fa fa-times"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-book"></i> Buatkan Pesanan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif
@push('javascript')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Handle the "Simpan" button click
        $('.btn-simpan').click(function(e) {
            e.preventDefault();
            let csrf_token = $('meta[name="csrf-token"]').attr('content');
            let idKeranjangDetail = $(this).data('id');
            let qty = $(this).closest('.card-body').find('input[name="qty-produk"]').val();

            $.ajax({
                url: "{{ url('/keranjang') }}" + "/" + idKeranjangDetail + "/update-qty",
                type: "POST",
                data: {
                    _token: csrf_token,
                    qtyNew: qty,
                    _method: "PUT"
                },
                success: function(response) {
                    if (response.status === true) {
                        Swal.fire({
                            title: "Berhasil!",
                            text: response.message,
                            icon: "success"
                        });
                    } else {
                        Swal.fire({
                            title: "Gagal!",
                            text: response.message,
                            icon: "error"
                        });
                    }
                },
                error: function(error) {
                    console.log(error);
                    Swal.fire({
                        title: "Terjadi Kesalahan!",
                        text: "Gagal memperbarui kuantitas.",
                        icon: "error"
                    });
                }
            });
        });

        // Handle empty cart scenario
        function keranjangEmpty() {
            Swal.fire({
                title: "Maaf!",
                text: "Data Keranjang Saat Ini Belum Ada",
                icon: "error"
            });
        }

        $('.btn-danger').click(function(e) {
            e.preventDefault();
            // Your logic for clearing the cart (if any)
            // This section should be removed or commented out to avoid clearing the cart
        });
    });
</script>
@endpush
