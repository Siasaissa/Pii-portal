<!DOCTYPE html>
<html>
<head>
    <title>Register Form</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Overlay notification container */
        .alert-overlay {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1055; /* above everything */
            width: 100%;
            max-width: 400px;
        }
    </style>
</head>
<body>
    <img class="wave" src="{{asset('board_files/back.jpg')}}" style="width: 100%">

    <!-- Overlay Notifications -->
    <div class="alert-overlay">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show shadow" role="alert">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show shadow" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <!-- End Overlay Notifications -->

    <div class="container">
        <div class="img">
            <img src="{{asset('board_files/tracker.png')}}">
        </div>

        <div class="login-content">

            <form id="registerForm" method="POST" action="{{ url('/Authentication/register') }}">
                @csrf

                <img src="{{asset('board_files/logo.jpg')}}" style="width: 250px; height: auto;">
                <h3 class="title">Register Here</h3>

                <div class="input-div one">
                    <div class="i"><i class="fas fa-user"></i></div>
                    <div class="div">
                        <h5>Username</h5>
                        <input type="text" class="input" name="name" required value="{{ old('name') }}">
                    </div>
                </div>

                <div class="input-div pass">
                    <div class="i"><i class="fas fa-envelope"></i></div>
                    <div class="div">
                        <h5>Email</h5>
                        <input type="email" class="input" name="email" required value="{{ old('email') }}">
                    </div>
                </div>

                <div class="input-div pass">
                    <div class="i"><i class="fas fa-lock"></i></div>
                    <div class="div">
                        <h5>Password</h5>
                        <input type="password" class="input" name="password" required>
                    </div>
                </div>

                <div class="input-div pass">
                    <div class="i"><i class="fas fa-lock"></i></div>
                    <div class="div">
                        <h5>Confirm Password</h5>
                        <input type="password" class="input" name="password_confirmation" required>
                    </div>
                </div>

                <input type="submit" class="btn btn-primary btn-sm" value="Register" style="background-color: orange;">
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

    <script>
    // Live password match check
    document.addEventListener('input', function () {
        const password = document.querySelector('input[name="password"]');
        const confirm = document.querySelector('input[name="password_confirmation"]');
        if (password && confirm) {
            confirm.setCustomValidity(
                password.value !== confirm.value ? "Passwords do not match" : ""
            );
        }
    });

    // Auto-close alerts after 5 seconds
    setTimeout(() => {
        document.querySelectorAll('.alert').forEach(alert => {
            const bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
            bsAlert.close();
        });
    }, 5000);
    </script>
</body>
</html>
