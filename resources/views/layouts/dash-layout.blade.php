<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.ico') }}">
    <title>Pasarakyat Profile</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/sb-admin2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Custom styles for this template-->
    <script src="{{ asset('assets/sb-admin2/vendor/jquery/jquery.min.js') }}"></script>
    <link href="{{ asset('assets/sb-admin2/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
</head>

<body id="page-top">
    @if ($errors->any())

        {{-- @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach --}}
        <script>
            let error = @json($errors->all());
            let text = "";
            error.forEach((e) => {
                text += `<li>${e}</li>`;
            })
            Swal.fire({
                html: `<ul>${text}</ul>`,
                icon: 'error',
                confirmButtonText: 'Close'
            })
        </script>
        {{-- @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach --}}
    @endif
    @if ($message = Session::get('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: @json($message),
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @elseif ($message = Session::get('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: @json($message),
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
    <!-- Page Wrapper -->
    <div id="wrapper">

        @include("components.sb-admin2.sidebar")
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include("components.sb-admin2.topbar")
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->

                    @isset($title)
                        <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>
                    @endisset
                    {{ $slot }}
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            @include("components.sb-admin2.footer")

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/sb-admin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/sb-admin2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/sb-admin2/js/sb-admin-2.min.js') }}"></script>
    <script>
        if (document.querySelector(".upload-img")) {
            let upImg = document.querySelectorAll(".upload-img");
            upImg.forEach((e) => {

                let imgPrev = document.querySelector(`.${e.dataset.target}`);
                e.addEventListener("change", function() {
                    const oFReader = new FileReader();
                    imgPrev.classList.remove("d-none");
                    oFReader.readAsDataURL(e.files[0]);

                    oFReader.onload = function(oFREvent) {
                        imgPrev.src = oFREvent.target.result;
                    }
                })
            })
        }
    </script>
    @stack("script")
</body>


</html>
