@extends('layouts.app')

@section('content')
    <div class="container-scroller">
        @if(Session::has('error'))
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '{{ Session::get('error') }}',
                    });
                });
            </script>
        @endif

        @if(Session::has('success'))
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: '{{ Session::get('success') }}',
                    });
                });
            </script>
        @endif

        {{--    navbar panel--}}
        @component('components.navbar')
        @endcomponent

        {{--    sidebar panel--}}
        <div class="container-fluid page-body-wrapper">
            @component('components.sidebar')
            @endcomponent

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper d-flex align-items-center auth px-0">
                    <div class="row w-100 mx-0">
                        <div class="col-lg-8 mx-auto">
                            <div class="auth-form-light shadow-sm text-left py-3 px-5 px-sm-5">
                                <h4>Tambah Pertanyaan</h4>
                                <h6 class="fw-light"></h6>
                                <form action="{{ route('admin.questions.store') }}" method="POST" class="pt-3">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name"  class="form-control" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary col-md-12">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        document.querySelector('form').addEventListener('submit', function (e) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;

            if (password !== confirmPassword) {
                e.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Password dan Konfirmasi Password tidak cocok!',
                });
            }
        });
    </script>

@endsection
