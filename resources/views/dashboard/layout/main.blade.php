@include('dashboard.layout.header')
<!-- ======= Header ======= -->
@include('dashboard.header')
<!-- End Header -->

<!-- ======= Sidebar ======= -->
@include('dashboard.sidebar.sidebar')
<!-- End Sidebar-->

<!-- Main Content -->
@yield('content')

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>Wikin Dev</span></strong>. All Rights Reserved.
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('/vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('/js/mainUser.js') }}"></script>

<script src="{{ asset('vendor/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>

{{-- tinymce --}}
<script>
    tinymce.init({
        selector: '#contentpemas', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'code table lists',
        toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
    });
</script>

</body>

</html>
