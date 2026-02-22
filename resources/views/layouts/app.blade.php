<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'ABPE WebApp - Enterprise System')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/partials.css') }}">

    @stack('styles')
</head>

<body>

    <div class="app-container">
        @include('partials.navbar')

        @include('partials.header')

        @yield('content')
    </div>

    @stack('scripts')

    <script>
        // Toggle Mobile Sidebar
        document.getElementById('mobileToggle')?.addEventListener('click', function() {
            // Perbaikan: Class di CSS menggunakan 'open', bukan 'active'
            document.getElementById('sidebar').classList.toggle('open');
        });

        document.addEventListener('DOMContentLoaded', function() {
            const profileToggle = document.getElementById('profileToggle');
            const profileDropdown = document.getElementById('profileDropdown');

            if (profileToggle && profileDropdown) {
                // Tampilkan/sembunyikan saat profil diklik
                profileToggle.addEventListener('click', function(e) {
                    profileDropdown.classList.toggle('show');
                    e.stopPropagation(); // Mencegah klik tembus ke body
                });

                // Sembunyikan dropdown saat klik di luar area profil
                document.addEventListener('click', function(e) {
                    if (!profileToggle.contains(e.target)) {
                        profileDropdown.classList.remove('show');
                    }
                });
            }
        });
    </script>
</body>

</html>
