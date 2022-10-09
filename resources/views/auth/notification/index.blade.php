@if (session('success'))
    <script>
        Swal.fire(
    'Good!',
    '{{ session('success') }}',
    'success'
    )
    </script>
@endif
@if (session('info'))
    <script>
        Swal.fire(
    'Good!',
    '{{ session('info') }}',
    'info'
    )
    </script>
@endif
@error('email')
    <div class="alert alert-secondary alert-dismissible fade show" role="alert">{{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@enderror
@error('password')
    <div class="alert alert-secondary alert-dismissible fade show" role="alert">{{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@enderror
