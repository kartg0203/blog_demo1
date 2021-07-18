    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> --}}

    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- 公用腳本 --}}
    <script>
        function notify(title, icon) {
            Swal.fire({
                title,
                // text: 'Do you want to continue',
                icon,
                confirmButtonColor: '#5cc482',
                confirmButtonText: '確認',
            });
        }
    </script>
    @yield('script')
