<div class="card">
    <div class="card-body">
        <form action="{{ url('/checkout') }}" method="POST">
            @csrf
            <div class="form-group">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama-customer" class="mb-2">
                                Nama Customer
                                <small class="text-danger">*</small>
                            </label>
                            <input type="text" class="form-control" name="nama-customer" id="nama-customer" placeholder="Masukkan Nama Customer" required>
                        </div>
                    </div>
                </div>

                <!-- Konten produk di sini -->
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <img src="{{ asset($produk['fotoProduk']) }}" alt="Gambar Produk" class="img-fluid" style="width: 100%; height: auto;">
                    </div>
                    <div class="col-md-8">
                        <span class="produk fw-bold">{{ $produk['nama'] }}</span>
                        <br>
                        <small>{{ $produk['kategori'] }}</small>
                        <p class="harga-produk">Rp. {{ number_format($produk['hargaProduk']) }}</p>
                        
                        <div class="form-group">
                            <div class="row align-items-center">
                                <div class="col-md-4 mb-3">
                                    <input type="number" class="form-control" name="qty-produk" id="qty-produk" min="1" placeholder="0" max="{{ $produk['stok'] }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <button type="submit" class="btn btn-primary btn-xs">
                                        <i class="fa fa-book"></i> Buatkan Pesanan
                                    </button>
                                    <button type="button" class="btn btn-danger btn-xs" data-bs-dismiss="modal" aria-label="Close" style="margin-right: 10px;">
                                    <i class="fa fa-times"></i> Batal
                                </button>
                            </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
