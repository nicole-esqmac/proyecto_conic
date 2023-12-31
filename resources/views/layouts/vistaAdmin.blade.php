<!--*********************** VISTA MENU ADMIN *****************************-->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ADMINISTRACIÓN') }}
        </h2>
    </x-slot>

    <div>
    <div class="py-12">
        <div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!doctype html>
<html lang="es">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap ver 5.3.1 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <!-- Bootstrap ICONOS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

        <!-- FUENTES DE TEXTO -->
        <link href="https://fonts.googleapis.com/css2?family=Muli:wght@300;700&display=swap" rel="=stylesheet">

        <!-- CDN bootstrap-select@1.13.14 -->
        <link rel="stylesheet" href="{{ asset('/bootstrap/select.min.css') }}">

        <!-- ESTILO PERSONALIZADO CSS -->
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

        <!--  DataTables-->
        <link  rel="stylesheet" href="{{ asset('/css/datatables.min.css')}}">

        <!-- - ICONO- -->
        <link rel="icon" href="{{ asset('/img/icono.ico')}}">


        <title>@yield('title')</title>

      </head>


      <body>


         <!-- Nav Lateral -->
            <div class="d-flex">

                {{-- <div class="container-fluid d-flex justify-content-start align-items-center" style="padding-top: 20px;">
                    <button type="button" class="btn btn-light" id="toggleButton">
                        <i class="bi bi-list"></i>
                    </button>
                </div> --}}


                <div id="navbarNav" id="sidebar-contrainer" class="bg-primary" >

                    {{-- <div class="container-fluid d-flex justify-content-start align-items-center" style="padding-top: 20px;">
                        <button type="button" class="btn btn-light" id="toggleButton">
                            <i class="bi bi-list"></i>
                        </button>
                    </div> --}}

                    <nav class="bg-primary"  class="navbar navbar-expand-lg navbar-light">
                        <section  class="nav-lateral">
                            <div class="nav-lateral-content">

                                <figure class="nav-lateral-avatar">
                                    <img src="{{ asset('/img/logo.jpg') }}" alt="CONIC" >

                                    <figcaption class="roboto-medium text-center"> <h3 class="text-light font-weight-bold">CONIC</H3></figcaption>
                                </figure>

                                <div class="nav-lateral-bar"></div>

                               <section >
                                    <ul class="list-group">
                                        <a href="{{ route("admin.index") }}" class="style-icono"><i class="bi bi-people-fill style-icono2"></i><h6 class="style-texto">Admin</h6></a>
                                        <a href="{{ route("planCuentas.index") }}" class="style-icono"><i class="bi bi-journals style-icono2"></i><h6 class="style-texto">Plan de Cuentas</h6></a>
                                        <a href="{{ route("saldoInicial.index") }}" class="style-icono"><i class="bi bi-file-post style-icono2"></i><h6 class="style-texto">Saldo Inicial</h6></a>
                                        <a href="{{ route("libroDiario.index") }}" class="style-icono"><i class="bi bi-journal-text style-icono2"></i><h6 class="style-texto">Libro Diario</h6></a>
                                        <a href="{{ route('libroMovimientos') }}" class="style-icono"><i class="bi bi-file-earmark-medical style-icono2"></i><h6 class="style-texto">Movimientos</h6></a>
                                        <a href="{{ route('libroMayor') }}" class="style-icono"><i class="bi bi-journal-text style-icono2"></i><h6 class="style-texto">Libro Mayor</h6></a>
                                        <a href="{{ route("admin.info") }}" class="style-icono"><i class="bi bi-info-circle-fill style-icono2"></i><h6 class="style-texto">Información</h6></a>
                                    </ul>
                                </section>

                            </div>
                        </section>
                    </nav>
            </div>


        @yield('menuLateral')



<!-- jQuery  3.7.0.slim.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('/cdn-jq/jquery-3.7.0.slim.min.js')}}"></script>

<!-- bootstrap ver 5.3.1 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

{{-- <style>
    #navbarNav {
        transition: transform 0.3s ease; /* Agrega una transición suave al movimiento */
    }

    .navbar-hidden {
        transform: translateX(-100%); /* Mueve el navbarNav hacia la izquierda */
    }
</style>

<script>
    $(document).ready(function() {
        $("#toggleButton").click(function() {
            $("#navbarNav").toggleClass("navbar-hidden");
        });
    });
</script> --}}

@stack('scripts')

        <!--    DataTables  -->
        <script src="{{asset('/cdn-dataTables/pdfmake.min.js')}}"></script>
        <script src="{{asset('/cdn-dataTables/vfs_fonts.js')}}"></script>
        <script src="{{asset('/cdn-dataTables/datatables.min.js')}}"></script>


        <!-- CDN PARA SELCT -->
        <script src="{{asset('/cdn-select/popper.min.js')}}"></script>
        <script src="{{asset('/cdn-select/bootstrap.min.js')}}"></script>
        <script src="{{asset('/cdn-select/bootstrap-select.min.js')}}"></script>


        <!--JAVASCRIPT -->
        <script src="{{asset('/cdn-sweetalert/sweetalert2@11.js')}}"></script>
        <script src="{{asset('/js/scriptSelect.js')}}"></script>
        <script src="{{asset('/js/scriptSplit.js')}}"></script>

        </body>
    </html>
    </div>
    </div>
</div>

</x-app-layout>
