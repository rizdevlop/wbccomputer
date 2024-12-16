<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Home</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/stylehome.css') }}" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Daftar Barang</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    </div>
                    <form action="{{ route('logout') }}" class="d-flex" method="POST">
                        @csrf
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi bi-box-arrow-right"></i>
                            Logout
                        </button>
                    </form>                    
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Selamat Datang</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Daftar beberapa barang yang ready boskuuu</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @forelse ($produk as $item)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top" src="{{ asset('storage/' . $item->cover) }}" alt="{{ $item->nama_barang }}" />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">{{ $item->nama_barang }}</h5>
                                        <!-- Product price-->
                                        Rp. {{ $item->harga_user }}
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <button class="btn btn-outline-dark mt-auto" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#detailModal"
                                                data-nama="{{ $item->nama_barang }}"
                                                data-harga="Rp. {{ $item->harga_user }}"
                                                data-keterangan="{{ $item->keterangan }}"
                                                data-image="{{ asset('storage/' . $item->cover) }}">
                                            Detail Barang
                                        </button>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="text-center">Tidak ada data produk.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
        <!-- Modal Detail Barang -->
        <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel">Detail Barang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img id="modalImage" src="" class="img-fluid" alt="Gambar Barang">
                            </div>
                            <div class="col-md-6">
                                <h5 id="modalNamaBarang"></h5>
                                <p><strong>Harga:</strong> <span id="modalHarga"></span></p>
                                <p><strong>Keterangan:</strong></p>
                                <p id="modalKeterangan"></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <a href="#" id="waLink" target="_blank" class="btn btn-success">
                            Pesan Sekarang via WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; WBC COMPUTER <span id="currentYear"></span></p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('js/scripthome.js') }}"></script>
        <script>
            document.getElementById("currentYear").textContent = new Date().getFullYear();
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var detailModal = document.getElementById('detailModal');

                detailModal.addEventListener('show.bs.modal', function (event) {
                    var button = event.relatedTarget;

                    // Ambil data dari atribut data-*
                    var namaBarang = button.getAttribute('data-nama');
                    var harga = button.getAttribute('data-harga');
                    var keterangan = button.getAttribute('data-keterangan');
                    var image = button.getAttribute('data-image');

                    // Isi modal dengan data yang diambil
                    document.getElementById('modalNamaBarang').textContent = namaBarang;
                    document.getElementById('modalHarga').textContent = harga;
                    document.getElementById('modalKeterangan').textContent = keterangan;
                    document.getElementById('modalImage').src = image;

                    // Atur link WhatsApp dengan pesan dinamis
                    var waNumber = '6285799710939';
                    var message = `Halo, saya tertarik dengan "${namaBarang}" yang harganya ${harga}. Apakah masih tersedia?`;
                    var waLink = `https://wa.me/${waNumber}?text=${encodeURIComponent(message)}`;
                    document.getElementById('waLink').href = waLink;
                });
            });
        </script>       
    </body>
</html>
