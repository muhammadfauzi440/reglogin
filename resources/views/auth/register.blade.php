<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register</title>

    <link rel="stylesheet" href="{{ asset('assets/auth/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="cl-d-md-flex half">
        <div class="bg d-block mx-auto" style="background-image: url('{{ asset('assets/auth/images/bg-msb.jpg') }}');"></div>

        <div class="contents">

            <div class="cl-container">
                <div class="cl-row cl-align-items-center cl-justify-content-center">
                    <div class="cl-col-md-12">

                        <div class="form-block cl-mx-auto">

                            <div class="cl-text-center cl-mb-5">
                                <h3>Register</h3>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form action="{{ route('register') }}" method="POST">
                                @csrf

                                <div class="cl-form-group first">
                                    <label for="name">Nama</label>
                                    <input
                                        type="text"
                                        class="cl-form-control"
                                        placeholder="Nama lengkap"
                                        id="name"
                                        name="name"
                                        value="{{ old('name') }}"
                                        required
                                    >
                                </div>

                                <div class="cl-form-group">
                                    <label for="email">Email</label>
                                    <input
                                        type="email"
                                        class="cl-form-control"
                                        placeholder="Email Anda"
                                        id="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        required
                                    >
                                </div>

                                <div class="cl-form-group">
                                    <label for="nis">NIS</label>
                                    <input
                                        type="number"
                                        class="cl-form-control"
                                        placeholder="NIS Anda"
                                        id="nis"
                                        name="nis"
                                        value="{{ old('nis') }}"
                                        required
                                    >
                                </div>

                                <div class="cl-form-group">
                                    <label for="nis">Kelas</label>
                                    <input
                                        type="text"
                                        class="cl-form-control"
                                        placeholder="Contoh: XII RPL 2"
                                        id="kelas"
                                        name="kelas"
                                        value="{{ old('kelas') }}"
                                        required
                                    >
                                </div>

                                <div class="cl-form-group">
                                    <label for="password">Password</label>
                                    <input
                                        type="password"
                                        class="cl-form-control"
                                        placeholder="Buat Password"
                                        id="password"
                                        name="password"
                                        minlength="8"
                                        required
                                    >
                                </div>

                                <div class="cl-form-group last cl-mb-3">
                                    <label for="password_confirmation">Konfirmasi Password</label>
                                    <input
                                        type="password"
                                        class="cl-form-control"
                                        placeholder="Konfirmasi Password"
                                        id="password_confirmation"
                                        name="password_confirmation"
                                        required
                                    >
                                </div>

                                <button type="submit"class="cl-btn cl-btn-block cl-btn-primary">Daftar</button>

                            </form>

                            <p class="mt-3">
                                Sudah punya akun?
                                <a href="{{ route('login') }}" class="text-primary">Login di sini</a>
                            </p>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="{{ asset('assets/auth/js/snippet.js') }}"></script>

</body>
</html>