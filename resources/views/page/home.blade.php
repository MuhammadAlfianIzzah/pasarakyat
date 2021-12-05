<x-main-layout>
    <div class="container py-5 header">
        <div class="row">
            <div class="col-12 col-lg-6" data-aos="fade-up" data-aos-delay="300" data-aos-easing="linear">
                <img src="{{ asset('assets/img/header.png') }}" alt="header" class="img-fluid">
            </div>
            <div data-aos="fade-right" data-aos-delay="600" data-aos-duration="1000"
                class="col-12 right col-lg-6 d-flex align-items-start flex-column justify-content-center">
                <h1 class="py-4">Apa itu pasarakyat?</h1>
                {{-- <h3>“Pasarakyat.digital bersama kami”</h3> --}}
                <p class="text-muted">Pasarakyat merupakan platform dengan konsep e-commerce plus, yaitu penyediaan
                    layanan e-commerce dengan complementary objectives untuk economic empowerment, edukasi dan
                    pembangunan solid network bagi unit usaha mikro</p>
                <a href="https://pasarakyat.digital/" target="_blank" class="btn btn-success"
                    style="border: 2px dashed white">https://pasarakyat.digital/</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="slider owl-carousel">
            @forelse ($patners as $p)
                <div><img src="{{ asset("storage/$p->picture") }}" alt="{{ $p->nama }}" class="img-fluid"
                        style="max-height: 60px;object-fit: contain"></div>
            @empty
                {{-- <div class="alert alert-warning me-2">
                    <h5>Comming soon</h5>
                </div>
                <div class="alert alert-warning">
                    <h5>Comming soon</h5>
                </div> --}}

            @endforelse
        </div>
    </div>
    {{-- <div class="h-100 p-5 text-white bg-dark rounded-3 my-5">
        <div class="container">
            <div class="row">
                <div class="col-12 right col-lg-6 d-flex align-items-start flex-column justify-content-center">
                    <h1>Mari Globalisasikan</h1>
                    <h3>“Pasarakyat.digital bersama kami”</h3>
                    <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi voluptas
                        repudiandae veniam,
                        incidunt quisquam nulla officiis nisi vero porro earum optio facere culpa pariatur. Soluta eaque
                        voluptatem incidunt enim tenetur?</p>
                    <button class="btn btn-success"
                        style="border: 2px dashed white">https://pasarakyat.digital/</button>
                </div>
                <div class="col-12 col-lg-6">
                    <img src="{{ asset('assets/img/header2.png') }}" alt="header" class="img-fluid">
                </div>

            </div>
        </div>
    </div> --}}

    <div class="section-keuntungan bg-dark text-white mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 intro-text col-12 d-flex justify-content-center">
                    <img src="{{ asset('assets/img/pasarakyat/section-keuntungan-mockup.png') }}"
                        class="d-none d-md-block img-line" height="450" alt="">
                </div>
                <div class="col-12 col-lg-9">
                    <h2 class="section-header">
                        Keuntungan Berniaga
                        di Pasarakyat
                    </h2>

                    <div class="row keuntungan-item-container">
                        <div class="item-keuntungan owl-carousel owl-theme">
                            <div class="item">
                                <div class="col-12 mb-3">
                                    <div class="card bg-dark">
                                        <div class="card-body">
                                            <img src="{{ asset('assets/img/image1.png') }}" alt="">
                                        </div>
                                    </div>

                                    <div class="content-body mt-3">
                                        <h4>free</h4>
                                        <p>Seluruh fitur dan fasilitas yang dimanfaatkan oleh pedagang pasar tidak di
                                            pungut biaya</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-12 mb-3">
                                    <div class="card bg-dark">
                                        <div class="card-body">
                                            <img src="{{ asset('assets/img/image2.png') }}" alt="">
                                        </div>
                                    </div>

                                    <div class="content-body mt-3">
                                        <h4>no hidden fee</h4>
                                        <p>Transaksi antara penjual dan pembeli sesuai harga yang disepakati, tidak ada
                                            markup harga dan biaya tambahan</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-12 mb-3">
                                    <div class="card bg-dark">
                                        <div class="card-body">
                                            <img src="{{ asset('assets/img/image3.png') }}" alt="">
                                        </div>
                                    </div>

                                    <div class="content-body mt-3">
                                        <h4>Integrated features</h4>
                                        <p>pedagang pasar dapat mengelola usahanya secara optimal dengan dukungan
                                            aplikasi terintegrasi yaitu aplikasi pengelolaan stok, pengelolaan dana,
                                            pengelolaan kanal pemasaran, pengelolaan transportasi </p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-12  mb-3">
                                    <div class="card bg-dark">
                                        <div class="card-body">
                                            <img src="{{ asset('assets/img/image4.png') }}" alt="">
                                        </div>
                                    </div>

                                    <div class="content-body mt-3">
                                        <h4>knowledge enrichment</h4>
                                        <p>Dapat berinteraksi dengan sesama pedagang di pasar yang sama maupun darI
                                            pasar lain diseluruh indonesia serta dapat mengakses informasi dari berbagai
                                            sumber (harga, kurs, cuaca, kebijakan pemerintah, bantuan, dan informasi
                                            lainnya)
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container section-testimoni">
        <div class="container">
            <h2 class="section-header text-center">
                Testimoni Pengguna
            </h2>
            <p class="section-description text-center">
                Apa yang mereka katakan tentang kami. Kami terus berusaha untuk bisa melakukannya dengan baik.
            </p>

            <div class="testimoni-item owl-carousel owl-theme">
                @forelse ($testimoni as $testi )
                    <div class="item">
                        <div class="card">
                            <img style="object-fit: cover;width: 100px;height: 100px;border-radius: 50%"
                                src="{{ asset("storage/$testi->picture") }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $testi->nama }}</h5>
                                <p class="card-status text-center">{{ $testi->job }}</p>
                                <p class="card-text text-center">"{{ $testi->comment }}"</p>
                            </div>
                        </div>
                    </div>
                @empty

                @endforelse
            </div>
        </div>
    </div>
    {{-- <div class="bg-dark">
        <div class="container text-center mt-5 mb-2">
            <h2 class="text-muted h1">Blog</h2>
            <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, accusantium
                officiis?
            </p>
        </div>

        <div class="container">
            <div class="row mb-4">
                <div class="col-4 mb-3">
                    <div class="card">
                        <img src="http://localhost:8000/assets/img/header2.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <img src="http://localhost:8000/assets/img/header2.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <img src="http://localhost:8000/assets/img/header2.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <img src="http://localhost:8000/assets/img/header2.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <img src="http://localhost:8000/assets/img/header2.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="section-blog">
        <div class="container">
            <h2 class="section-header">
                Blog Pasarakyat
            </h2>

            <div class="row blog">
                <div class="col-12 col-md-6">
                    @if ($latest)
                        <div class="card w-75 card-new-blog">
                            <img src="{{ asset("storage/$latest->thumbnail") }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-status">Terbaru</p>
                                <h5 class="card-title">{{ $latest->title }}</h5>
                                <p class="card-text"><small>{{ $latest->tanggal_post }}</small></p>
                                <a href="{{ route('detail-blog', $latest->slug) }}"
                                    class="">Selengkapnya <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    @else
                        kosong
                    @endif
                </div>

                <div class="col-12 col-md-6">
                    <div class="recent-blog">
                        @forelse ($posts as $post)
                            <div class="card mb-4">
                                <div class="row">
                                    <div class="col-3">
                                        <img src="{{ asset("storage/$post->thumbnail") }}" alt="">
                                    </div>
                                    <div class="col">
                                        <div class="card-body">
                                            <small>{{ $post->tanggal_post }}</small>
                                            <p class="card-text">{{ $post->title }}</p>
                                            <a href="{{ route('detail-blog', $post->slug) }}"
                                                class="">Selengkapnya <i
                                                    class="bi bi-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty

                        @endforelse

                        <a href="#" class="btn btn-sm btn-light">Blog Lainnya <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-tim bg-dark text-white">
        <div class="container bg-dark">
            <h2 class="section-header text-center">
                Tim kami
            </h2>
            <p class="section-description text-center">
                kami adalah orang - orang yang memiliki keahlian yang berbeda, yang berkumpul dalam satu tujuan
            </p>
            <img src="{{ asset('assets/img/tim/tim.png') }}" alt="" class="img-fluid">
            {{-- <div class="tim-item owl-carousel owl-theme">
                <div class="item">
                    <div class="card bg-dark">
                        <img style="object-fit: cover;width: 100px;height: 100px;border-radius: 50%"
                            src="{{ asset('assets/img/tim/taufik.jpeg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">Taufik</h5>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card bg-dark">
                        <img style="object-fit: cover;width: 100px;height: 100px;border-radius: 50%"
                            src="{{ asset('assets/img/tim/indra.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">Indra Fransiskus Alam</h5>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="card bg-dark">
                        <img style="object-fit: cover;width: 100px;height: 100px;border-radius: 50%"
                            src="{{ asset('assets/img/tim/mirad.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">Muh. Risky Mirad</h5>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card bg-dark">
                        <img style="object-fit: cover;width: 100px;height: 100px;border-radius: 50%"
                            src="{{ asset('assets/img/tim/alfian.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">Muhammad Alfian Izzah</h5>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card bg-dark">
                        <img style="object-fit: cover;width: 100px;height: 100px;border-radius: 50%"
                            src="{{ asset('assets/img/tim/ilham.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">Ld. Ahmad Ilham</h5>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="card bg-dark">
                        <img style="object-fit: cover;width: 100px;height: 100px;border-radius: 50%"
                            src="{{ asset('assets/img/tim/fahrul.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">Fahrul Ardian Nugroho</h5>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card bg-dark">
                        <img style="object-fit: cover;width: 100px;height: 100px;border-radius: 50%"
                            src="{{ asset('assets/img/tim/sofia.jpeg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">Sophia</h5>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

    {{-- <div class="py-1" style="background-color: rgb(41, 38, 38)">
        <div class="container text-center mt-5">
            <h2 class="text-muted">Apa Kata <span class="text-primary">Mereka</span>?</h2>
            <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, accusantium
                officiis?
            </p>
        </div>
        <div class="container mt-4">
            <div class="owl-carousel">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="https://images.pexels.com/photos/8169/pexels-photo.jpg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                                class="img-fluid h-100" style="object-fit: cover" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-quote-right"></i></h5>
                                <p class="card-text text-muted">This is a wider card with supporting text below as a
                                    natural
                                    lead-in
                                    to additional content. This content is a little bit longer.</p>
                                <p class="m-0 h6">~alfianizzah</p>
                                <p class="text-muted m-0">CEO</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="row g-2">
                        <div class="col-md-4">
                            <img src="https://images.pexels.com/photos/8169/pexels-photo.jpg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                                class="img-fluid  h-100 rounded-start" style="object-fit: cover" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-quote-right"></i></h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural
                                    lead-in
                                    to additional content. This content is a little bit longer.</p>
                                <p class="m-0 h6">~alfianizzah</p>
                                <p class="text-muted m-0">CEO</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="https://images.pexels.com/photos/8169/pexels-photo.jpg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                                class="img-fluid  h-100 rounded-start" style="object-fit: cover" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural
                                    lead-in
                                    to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins
                                        ago</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    @push('script')
        <script>
            AOS.init();
            $('.tim-item').owlCarousel({
                loop: false,
                margin: 10,
                nav: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 4
                    }
                }
            })
            $(document).ready(function() {
                $(".slider").owlCarousel({
                    responsive: {
                        0: {
                            items: 3,
                            nav: true
                        },
                        600: {
                            items: 2,
                            nav: false
                        },
                        1000: {
                            items: 5,
                            nav: true,
                            loop: false
                        }
                    }
                });
            });
            $('.testimoni-item').owlCarousel({
                loop: false,
                margin: 10,
                nav: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 3
                    }
                }
            })
            // $(document).ready(function() {
            //     $(".owl-carousel").owlCarousel({
            //         loop: true,
            //         margin: 10,
            //         responsiveClass: true,

            //         responsive: {
            //             0: {
            //                 items: 1,
            //                 nav: true
            //             },
            //             600: {
            //                 items: 2,
            //                 nav: false
            //             },
            //             1000: {
            //                 items: 2,
            //                 nav: true,
            //                 loop: false
            //             }
            //         }
            //     });
            // });
            $('.item-keuntungan').owlCarousel({
                loop: false,
                margin: 10,
                nav: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 3
                    }
                }
            })
        </script>
    @endpush
</x-main-layout>
