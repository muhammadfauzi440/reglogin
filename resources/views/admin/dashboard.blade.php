<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header fw-bold">Dashboard <span class="text-warning text-capitalize">{{ Auth::user()->role }}</span></div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <h5 class="fw-bold">SELAMAT DATANG, {{ Auth::user()->name }}</h5>
                <p>Email: {{ Auth::user()->email }}</p>
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger"
                >Logout</a>
                <form action={{ route('logout') }} id="logout-form" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</body>

</html>
