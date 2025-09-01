<!DOCTYPE html>
<html>
<head>
    <title>Login form</title>
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
    <img class="wave" src="{{ asset('board_files/back.jpg')}}" width="100%">

    <!-- Overlay Notifications -->
    <div class="alert-overlay">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show shadow" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <!-- End Overlay Notifications -->

    <div class="container">
        <div class="img">
            <img src="{{asset ('board_files/tracker.png')}}">
        </div>

        <div class="login-content">

            <!-- Loader (hidden initially) -->
            <div id="loader" class="d-none text-center">
                <div class="spinner-border text-danger" style="width: 4rem; height: 4rem;" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p class="mt-3 text-danger">Redirecting to your dashboard...</p>
            </div>

            <!-- Login Form -->
            <form id="loginForm" method="POST" action="{{ route('login') }}">
                @csrf

                <img src="{{asset ('board_files/logo.jpg')}}" style="width: 250px; height: auto;">
                
                <h3 class="title">Login</h3>

                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Email</h5>
                        <input type="email" class="input" name="email" required>
                    </div>
                </div>

                <div class="input-div pass">
                    <div class="i"> 
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input type="password" class="input" name="password" required>
                    </div>
                </div>

                <a href="{{ route('password.request') }}">Forgot Password?</a>

                <input type="submit" class="btn btn-primary btn-sm rounded-3" value="Login" style="background-color: orange;">
            </form>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Auto-close alerts after 5 seconds
    setTimeout(() => {
        document.querySelectorAll('.alert').forEach(alert => {
            const bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
            bsAlert.close();
        });
    }, 5000);

    // ============================
    // Lockout Countdown Logic
    // ============================
    @if(session('lockout_until'))
        const lockoutEndTimestamp = {{ session('lockout_until') }} * 1000;
        const now = new Date().getTime();
        let secondsLeft = Math.floor((lockoutEndTimestamp - now) / 1000);

        if (secondsLeft > 0) {
            const emailInput = document.querySelector('input[name="email"]');
            const passInput = document.querySelector('input[name="password"]');
            const submitBtn = document.querySelector('input[type="submit"]');

            emailInput.disabled = true;
            passInput.disabled = true;
            submitBtn.disabled = true;

            const updateCountdown = () => {
                submitBtn.value = `Wait ${secondsLeft}s`;
                secondsLeft--;

                if (secondsLeft < 0) {
                    clearInterval(timer);
                    emailInput.disabled = false;
                    passInput.disabled = false;
                    submitBtn.disabled = false;
                    submitBtn.value = 'Login';
                }
            };

            updateCountdown();
            const timer = setInterval(updateCountdown, 1000);
        }
    @endif

    // ============================
    // Loader + Redirect Logic
    // ============================
    @if (session('success') && str_contains(session('success'), 'Redirecting'))
        setTimeout(() => {
            document.getElementById('loginForm').classList.add('d-none');
            document.getElementById('loader').classList.remove('d-none');
        }, 1500);

        // 👇 Role-aware redirect
        setTimeout(() => {
            window.location.href = "{{ session('redirect_to') }}";
        }, 3500);
    @endif
</script>


    

</body>
</html>
