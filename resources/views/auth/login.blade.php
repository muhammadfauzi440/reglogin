<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('assets/auth/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="cl-d-md-flex half">
        <div class="bg" style="background-image: url('{{ asset('assets/auth/images/bg-msb.jpg') }}');"></div>

        <div class="contents">

            <div class="cl-container">
                <div class="cl-row cl-align-items-center cl-justify-content-center">
                    <div class="cl-col-md-12">

                        <div class="form-block cl-mx-auto">

                            <div class="cl-text-center cl-mb-5">
                                <h3>Login</h3>
                            </div>

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        {{ $errors->first() }}
                                    </div>
                                @endif

                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                            <form action="{{ route('login.post') }}" method="POST">
                                @csrf

                                <div class="cl-form-group first">
                                    <label for="email">Email</label>
                                    <input
                                        type="email"
                                        class="cl-form-control"
                                        placeholder="Masukkan email Anda"
                                        id="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        required
                                    >
                                </div>

                                <div class="cl-form-group last cl-mb-3">
                                    <label for="password">Password</label>
                                    <input
                                        type="password"
                                        class="cl-form-control"
                                        placeholder="Masukkan Password"
                                        id="password"
                                        name="password"
                                        required
                                    >
                                </div>

                                <button type="submit" class="cl-btn cl-btn-block cl-btn-primary">Login</button>

                            </form>

                            <p class="mt-3">
                                Belum punya akun?
                                <a href="{{ route('register.form') }}" class="text-primary">Daftar di sini</a>
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
