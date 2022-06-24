@push('scripts')
    <script>
        function modalConfirmation(title, text, form) {
            Swal.fire({
                title,
                text,
                icon: 'question',
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText:
                    '<i class="material-icons">thumb_up</i>',
                confirmButtonAriaLabel: 'Thumbs up, great!',
                cancelButtonText:
                    '<i class="material-icons">thumb_down</i>',
                cancelButtonAriaLabel: 'Thumbs down'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#' + form).submit();
                }
            })
        }
    </script>
@endpush
