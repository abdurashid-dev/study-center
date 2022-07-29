<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        $('.delete-btn').click(function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Ishonchingiz komilmi?',
                // text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Bekor qilish',
                confirmButtonText: "O'chirish!"
            }).then((result) => {
                if (result.value) {
                    $(this).closest('form').submit();
                }
            })
        });
    });
</script>
