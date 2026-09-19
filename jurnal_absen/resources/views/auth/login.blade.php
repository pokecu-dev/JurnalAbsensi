<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Jurnal Absensi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-color: #89D7B7;
            --secondary-color: #428475;
            --background-color: #1A312C;
            --text-color: #ffff;
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
        }

        body {
            min-height: 100vh;
            background: var(--background-color);
            display: flex;
            position: relative;
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
            background: var(--background-color);
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
            background: var(--background-color);
            padding: 10% 8%;
            display: flex;
            justify-content: flex-start;
            padding-top: 10%;
        }

        .welcome-section::before {
            content: "";
            position: absolute;
            width: 130%;
            aspect-ratio: 1 / 1;
            background: var(--primary-color);
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
            color: #000;
        }

        .welcome-content p {
            font-size: 13px;
            line-height: 1.7;
            color: #000;
            font-weight: 500;
        }

        /* BULATAN KECIL */

        .circle {
            position: absolute;
            border-radius: 50%;
            background: var(--primary-color);
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
            width: 290px;
            height: 290px;
            background: var(--primary-color);
            border-radius: 50%;
            bottom: -120px;
            right: -50px;
            z-index: 3;
            pointer-events: none;
        }

        /* =========================
           LOGIN SECTION
        ========================= */

        .login-section {
            width: 50%;
            min-height: 100vh;
            background: var(--background-color);
            padding: 10% 8%;
            color: var(--text-color);
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
            background: var(--primary-color);
            color: #ffffff;
            transform: translateY(-1px);
        }

        /* =================================================
           TABLET
        ================================================= */

        @media (max-width: 900px) and (min-width: 601px) {

            .welcome-section {
                padding: 12% 6%;
            }

            .welcome-content h1 {
                font-size: 42px;
            }

            .login-section {
                padding: 8% 6%;
            }

            .login-section h2 {
                font-size: 42px;
            }

            .login-description {
                margin-bottom: 30px;
            }

            .input-group {
                max-width: 100%;
            }
        }

        /* =================================================
           HP
        ================================================= */

        @media (max-width: 600px) {

            body {
                min-height: 100dvh;
                overflow-x: hidden;
            }

            .login-container {
                min-height: 100dvh;
                flex-direction: column;
                overflow-y: auto;
                overflow-x: hidden;
            }

            /* WELCOME DI ATAS */

            .welcome-section {
                width: 100%;
                min-height: 240px;
                height: 240px;
                padding: 50px 28px 30px;
                flex-shrink: 0;
            }

            .welcome-section::before {
                width: 450px;
                height: 450px;
                top: -330px;
                left: -120px;
            }

            .welcome-content {
                max-width: 100%;
            }

            .welcome-content h1 {
                font-size: 38px;
                margin-bottom: 10px;
            }

            .welcome-content p {
                font-size: 12px;
                line-height: 1.6;
                max-width: 310px;
            }

            /* BULATAN DEKORASI */

            .circle-one {
                width: 90px;
                height: 90px;
                bottom: -45px;
                left: -25px;
            }

            .circle-two {
                width: 55px;
                height: 55px;
                bottom: 15px;
                left: 70%;
            }

            .bg-circle-bottom-right {
                width: 130px;
                height: 130px;
                bottom: -70px;
                right: -45px;
            }

            /* LOGIN */

            .login-section {
                width: 100%;
                min-height: calc(100dvh - 240px);
                height: auto;
                padding: 45px 28px 50px;
                justify-content: flex-start;
            }

            .login-section h2 {
                font-size: 38px;
                margin-bottom: 8px;
            }

            .login-description {
                font-size: 12px;
                margin-bottom: 28px;
                max-width: 100%;
            }

            form {
                width: 100%;
            }

            .input-group {
                width: 100%;
                max-width: none;
                margin-bottom: 18px;
            }

            .input-group input {
                width: 100%;
                height: 54px;
                border-radius: 12px;
                font-size: 14px;
            }

            .input-group i.input-icon {
                left: 16px;
            }

            .input-group i.eye-icon {
                right: 12px;
                padding: 10px;
            }

            /* TOMBOL FULL WIDTH DI HP */

            .login-button {
                width: 100%;
                height: 52px;
                margin-top: 10px;
                border-radius: 12px;
                font-size: 15px;
            }
        }

        /* =================================================
           HP KECIL
        ================================================= */

        @media (max-width: 380px) {

            .welcome-section {
                min-height: 210px;
                height: 210px;
                padding: 40px 22px 25px;
            }

            .welcome-section::before {
                width: 390px;
                height: 390px;
                top: -290px;
                left: -110px;
            }

            .welcome-content h1 {
                font-size: 32px;
                margin-bottom: 8px;
            }

            .welcome-content p {
                font-size: 11px;
                max-width: 280px;
            }

            .login-section {
                min-height: calc(100dvh - 210px);
                padding: 35px 22px 40px;
            }

            .login-section h2 {
                font-size: 32px;
            }

            .login-description {
                margin-bottom: 24px;
            }

            .input-group input {
                height: 52px;
            }

            .login-button {
                height: 50px;
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