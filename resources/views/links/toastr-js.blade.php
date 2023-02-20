@push('styles')
    <link rel="stylesheet" href="{{ asset('includes/toastr/toastr.min.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('includes/toastr/toastr.min.js') }}"></script>
@endpush
<script>
    @if (session('success'))
    toastr.success("{{ session('success') }}");
    @endif

    @if (session('error'))
    toastr.error("{{ session('error') }}");
    @endif
</script>
