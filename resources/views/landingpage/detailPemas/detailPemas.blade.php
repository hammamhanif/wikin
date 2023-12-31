@include('landingpage.header')

@include('landingpage.navbar')
<!-- Content -->
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>Pengabdian Masyarakat</h2>
                        <p>Pengabdian Masyarakat Nuklir adalah upaya dari para ahli, peneliti, dan profesional di bidang
                            nuklir untuk memberikan manfaat positif kepada masyarakat melalui penggunaan teknologi
                            nuklir. Ini mencakup edukasi, aplikasi kesehatan, pertanian, pengelolaan sumber daya alam,
                            keberlanjutan energi nuklir, serta peran dalam penanganan darurat nuklir. Tujuannya adalah
                            meningkatkan pemahaman publik, meningkatkan kualitas hidup, dan memberikan dampak positif
                            bagi masyarakat secara keseluruhan.</p>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="container">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Pengabdian Masyarakat</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row gy-4 posts-list">
                @foreach ($pengmas as $pemas)
                    <div class="col-xl-4 col-md-6">
                        <article>
                            <a href="{{ route('detail', $pemas->slug) }}">
                                <div class="post-img">
                                    <img src="{{ htmlentities($pemas->image) }}" alt=""
                                        class="img-fluid mx-auto d-block">
                                </div>
                                <h2 class="title">
                                    {{ htmlentities($pemas->name) }}
                                </h2>
                                <p>
                                    {!! html_entity_decode($pemas->content) !!}
                                </p>
                                <div class="d-flex align-items-center">
                                    <div class="post-meta">
                                        <p class="post-date">
                                            <time datetime="2022-01-01">{{ htmlentities($pemas->updated) }}</time>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </article>
                    </div><!-- End post list item -->
                @endforeach
            </div><!-- End blog posts list -->
            <div class="blog-pagination">
                <ul class="justify-content-center">
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                </ul>
            </div><!-- End blog pagination -->
        </div>
    </section><!-- End Blog Section -->
</main><!-- End #main -->
<!-- end Content -->

@include('landingpage.footer')

<!-- End Footer -->
<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/aos/aos.js') }}"></script>
<script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('/js/main.js') }}"></script>

</body>

</html>
