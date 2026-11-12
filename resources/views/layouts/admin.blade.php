<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Pengaduan Sarana</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background-color: #f5f6fa;
        }

        .sidebar {
            min-width: 250px;
            max-width: 250px;
        }

        .nav-link {
            transition: 0.2s;
        }

        .nav-link:hover,
        .nav-link.active {
            background-color: #383838 !important;
        }

        .logout-link:hover {
            color: #ff5555 !important;
        }
    </style>
</head>

<body class="d-flex vh-100">

    <aside class="sidebar bg-dark text-white d-flex flex-column shadow">

        <div class="p-4 border-bottom border-secondary text-warning">
            <h5 class="fw-bold m-0 d-flex align-items-center gap-2">
                <i class="bi bi-building"></i>
                Pengaduan Sarana
            </h5>
            <small class="text-light opacity-75">Admin Panel</small>
        </div>

        <nav class="grow p-3">
            <div class="nav flex-column">

                <a href="/admin/dashboard"
                    class="nav-link d-flex align-items-center gap-2 py-2 px-3 mb-2 rounded text-light {{ request()->is('admin/dashboard') ? 'active text-warning' : '' }}">
                    <i class="bi bi-house-door fs-5"></i>
                    Dashboard
                </a>

                <a href="/admin/transaksi"
                    class="nav-link d-flex align-items-center gap-2 py-2 px-3 mb-2 rounded text-light {{ request()->is('admin/transaksi*') ? 'active text-warning' : '' }}">
                    <i class="bi bi-clipboard-data fs-5"></i>
                    Data Aspirasi
                </a>

                <a href="/admin/transaksi"
                    class="nav-link d-flex align-items-center gap-2 py-2 px-3 mb-2 rounded text-light {{ request()->is('admin/transaksi*') ? 'active text-warning' : '' }}">
                    <i class="bi bi-tags"></i>
                    Kelola Kategori
                </a>

                <a href="/admin/transaksi"
                    class="nav-link d-flex align-items-center gap-2 py-2 px-3 mb-2 rounded text-light {{ request()->is('admin/transaksi*') ? 'active text-warning' : '' }}">
                    <i class="bi bi-chat-left-dots"></i>
                    Umpan Balik
                </a>

            </div>
        </nav>

        <div class="p-3 border-top border-secondary">

            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                class="nav-link logout-link d-flex align-items-center gap-2 py-2 px-3 rounded text-danger mb-0">
                <i class="bi bi-box-arrow-left fs-5"></i>
                Logout
            </a>

            <form action="{{ route('logout') }}" id="logout-form" method="POST" class="d-none">
                @csrf
            </form>

        </div>

    </aside>

    <main class="grow p-4 overflow-auto">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
