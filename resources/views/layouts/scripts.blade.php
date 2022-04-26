<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('adminlte/dist/js/demo.js') }}"></script>

<script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

<script src="{{ asset('adminlte/plugins/toastr/toastr.min.js') }}"></script>

@livewireScripts
@yield('scripts')

<script>
    $(document).ready(function() {
        $('#call-modal-contact').click(function(e) {
            e.preventDefault();
            $('#modalContact').appendTo('body').modal();
        })
    })
</script>

<script>
    document.addEventListener('livewire:load', () => {

        window.livewire.on('pesanSukses', pesan => {

            toastr.success(pesan);

        })

    });
</script>

<script>
    document.addEventListener('livewire:load', () => {

        window.livewire.on('pesanGagal', pesan => {

            toastr.error(pesan);

        })

    });
</script>
