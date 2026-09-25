<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Jurnal Absensi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-light: #A7E4CA; 
            --primary-main: #7ED0AC;   
            --background-dark: #162C25; 
            --input-bg: #FEFCE8;      
            --text-dark: #000000;
            --text-light: #FFFFFF;
            --text-muted: #94A3B8;
            --circle-gradient: linear-gradient(135deg, var(--primary-light) 0%, var(--primary-main) 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Arial, sans-serif;
        }

        html,
        body {
            width: 100%;
            min-height: 100%;
            background: var(--background-dark);
            overflow-x: hidden;
        }

        /* =========================
           CONTAINER UTAMA
        ========================= */

        .login-container {
            width: 100%;
            min-height: 100vh;
            display: flex;
            overflow: hidden;
            background: var(--background-dark);
            position: relative;
            z-index: 2;
        }

        /* =========================
           WELCOME SECTION
        ========================= */

        .welcome-section {
            width: 50%;
            min-height: 100vh;
            position: relative;
            overflow: hidden;
            background: var(--background-dark);
            padding: 10% 8%;
            display: flex;
            justify-content: flex-start;
            padding-top: 10%;
        }

        .welcome-section::before {
            content: "";
            position: absolute;
            width: 125%;
            aspect-ratio: 1 / 1;
            background: var(--circle-gradient);
            border-radius: 50%;
            top: -55%;
            left: -30%;
            z-index: 1;
        }

        .welcome-content {
            position: relative;
            z-index: 3;
            max-width: 420px;
        }

        .welcome-content h1 {
            font-size: 52px;
            font-weight: 700;
            margin-bottom: 25px;
            color:var(--text-dark);
        }

        .welcome-content p {
            font-size: 13px;
            line-height: 1.7;
            color:var(--text-dark);
            font-weight: 500;
        }

        /* BULATAN KECIL */

        .circle {
            position: absolute;
            border-radius: 50%;
            background: var(--circle-gradient);
            z-index: 4;
        }

        .circle-one {
            width: 180px;
            height: 180px;
            bottom: -30px;
            left: -20px;
        }

        .circle-two {
            width: 100px;
            height: 100px;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
        }

        /* BULATAN KANAN BAWAH */

        .bg-circle-bottom-right {
            position: absolute;
            width: 200px;
            height: 200px;
            background: var(--circle-gradient);
            border-radius: 50%;
            bottom: 0px;
            right: -50px;
            z-index: 2;
            pointer-events: none;
        }

        /* =========================
           LOGIN SECTION
        ========================= */

        .login-section {
            width: 50%;
            min-height: 100vh;
            background: var(--background-dark);
            padding: 10% 8%;
            color: var(--text-light);
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            z-index: 2;
        }

        .login-section h2 {
            font-size: 52px;
            font-weight: 700;
            margin-bottom: 12px;
            letter-spacing: 0.5px;
        }

        .login-description {
            font-size: 12px;
            color: #D0D5D3;
            margin-bottom: 40px;
            line-height: 1.5;
            max-width: 380px;
        }

        .error-message {
            margin-bottom: 16px;
            color: #ffb4b4;
            font-size: 14px;
        }

        .input-group {
            margin-bottom: 22px;
            position: relative;
            max-width: 420px;
        }

        .input-group i.input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #93A6A0;
            font-size: 18px;
            pointer-events: none;
        }

        .input-group i.eye-icon {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #93A6A0;
            font-size: 16px;
            cursor: pointer;
            padding: 8px;
        }

        .input-group input {
            width: 100%;
            height: 50px;
            border: none;
            outline: none;
            border-radius: 10px;
            padding: 0 48px;
            background: rgba(255, 255, 255, 0.15);
            color: #ffff;
            font-size: 14px;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .input-group input::placeholder {
            color: #BAC7C3;
            font-weight: 600;
        }

        .input-group input:focus {
            outline: 2px solid rgba(137, 215, 183, 0.7);
            background: rgba(255, 255, 255, 0.18);
        }

        /* =========================
           TOMBOL LOGIN
        ========================= */

        .login-button {
            margin-top: 30px;
            margin-left: auto;
            display: block;
            width: 150px;
            height: 48px;
            border: none;
            border-radius: 14px;
            background: rgba(127, 207, 183, 0.86);
            color: #18332B;
            font-size: 16px;
            font-weight: 700;
            letter-spacing: 1px;
            cursor: pointer;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.15);
            transition: all 0.2s ease;
        }

        .login-button:hover {
            background: var(--circle-gradient);
            color: #ffffff;
            transform: translateY(-1px);
        }
        

        /* =================================================
           HP
        ================================================= */

        @media (max-width: 600px) {

            .login-container {
                flex-direction: column;
                justify-content: flex-start;
                overflow-x: hidden;
            }

            /* WELCOME DI ATAS — bentuk DOME penuh */

            .welcome-section {
                width: 100%;
                min-height: 300px;
                padding: 64px 32px 90px;
                background: var(--circle-gradient);
                border-radius: 0 0 46px 46px;
                position: relative;
                z-index: 1;
                overflow: visible;
            }

            /* pseudo-circle lama tidak dipakai lagi di mobile, digantikan
               background langsung pada .welcome-section */
            .welcome-section::before {
                content: none;
            }

            .welcome-content {
                max-width: 100%;
            }

            .welcome-content h1 {
                font-size: 32px;
                margin-bottom: 12px;
            }

            .welcome-content p {
                font-size: 13px;
                line-height: 1.5;
                max-width: 90%;
            }

            /* BULATAN DEKORASI — nyembul di belakang lengkungan dome */

            .circle {
                z-index: -1;
            }

            .circle-one {
                width: 120px;
                height: 120px;
                bottom: -60px;
                left: 6%;
                transform: none;
            }

            .circle-two {
                width: 68px;
                height: 68px;
                bottom: -32px;
                left: 40%;
                transform: none;
            }

            .bg-circle-bottom-right {
                width: 140px;
                height: 140px;
                bottom: -30px;
                right: -30px;
            }

            /* LOGIN */

            .login-section {
                width: 100%;
                min-height: auto;
                flex: 1;
                padding: 28px 28px 44px;
                justify-content: flex-start;
                z-index: 2;
            }

            .login-section h2 {
                font-size: 30px;
                margin-bottom: 6px;
            }

            .login-description {
                font-size: 13px;
                margin-bottom: 26px;
                color: #8E9F98;
            }

            form {
                width: 100%;
            }

            .input-group {
                max-width: 100%;
                margin-bottom: 18px;
            }

            .input-group input {
                width: 100%;
                height: 54px;
                border-radius: 18px;
                background: var(--input-bg);
                color: var(--text-dark);
                font-weight: 600;
            }

            .input-group input::placeholder {
                color: #A9A98C;
            }

            .input-group i.input-icon,
            .input-group i.eye-icon {
                color: #4A4A3A;
            }

            /* TOMBOL FULL WIDTH, LEBIH BULAT (PILL) */

            .login-button {
                width: 100%;
                height: 54px;
                margin-top: 14px;
                margin-left: 0;
                border-radius: 20px;
                background: var(--primary-main);
            }

            .login-button:hover {
                background: var(--circle-gradient);
            }
        }

        /* =================================================
           HP KECIL (<380px)
        ================================================= */

        @media (max-width: 380px) {

            .welcome-section {
                min-height: 250px;
                padding: 48px 22px 80px;
                border-radius: 0 0 50% 50% / 0 0 44px 44px;
            }

            .welcome-content h1 {
                font-size: 26px;
            }

            .welcome-content p {
                font-size: 11px;
            }

            .login-section {
                padding: 20px 20px 32px;
            }

            .login-section h2 {
                font-size: 26px;
            }

            .circle-one {
                width: 70px;
                height: 70px;
                bottom: -24px;
            }

            .circle-two {
                width: 42px;
                height: 42px;
                bottom: -12px;
            }
        }

    </style>
</head>

<body>

    <div class="login-container">

        <!-- BAGIAN WELCOME -->
        <section class="welcome-section">

            <div class="welcome-content">
                <h1>Welcome!</h1>

                <p>
                    Selamat Datang di Aplikasi Jurnal Absensi.
                    Silakan masuk untuk melanjutkan ke halaman utama aplikasi.
                </p>
            </div>

            <div class="circle circle-one"></div>
            <div class="circle circle-two"></div>

        </section>


        <!-- BAGIAN LOGIN -->
        <section class="login-section">

            <h2>Login</h2>

            <p class="login-description">
                Silakan masuk dengan akun Anda untuk melanjutkan.
            </p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                @if ($errors->has('email'))
                    <p class="error-message" role="alert">
                        {{ $errors->first('email') }}
                    </p>
                @endif

                <!-- INPUT EMAIL -->
                <div class="input-group">

                    <i class="fa-regular fa-envelope input-icon"></i>

                    <input
                        type="email"
                        name="email"
                        required
                        placeholder="Masukkan Email"
                    >

                </div>


                <!-- INPUT PASSWORD -->
                <div class="input-group">

                    <i class="fa-solid fa-lock input-icon"></i>

                    <input
                        type="password"
                        name="password"
                        required
                        placeholder="Masukkan Password"
                        id="password-input"
                    >

                    <i
                        class="fa-regular fa-eye-slash eye-icon"
                        id="toggle-password"
                    ></i>

                </div>


                <!-- SUBMIT BUTTON -->
                <button type="submit" class="login-button">
                    LOGIN
                </button>

            </form>

        </section>

    </div>


    <!-- BULATAN HIJAU JUMBO -->
    <div class="bg-circle-bottom-right"></div>


    <script>

        const togglePassword =
            document.querySelector('#toggle-password');

        const passwordInput =
            document.querySelector('#password-input');

        togglePassword.addEventListener('click', function () {

            const type =
                passwordInput.getAttribute('type') === 'password'
                    ? 'text'
                    : 'password';

            passwordInput.setAttribute('type', type);

            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');

        });

    </script>

</body>
</html>