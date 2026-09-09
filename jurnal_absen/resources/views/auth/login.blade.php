<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Jurnal Absensi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>

        :root {
            --primary-color: #73BCA0;
            --secondary-color: #556B65;
            --text-color: #152E27;
            --background-color: #fff4e1;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Arial, sans-serif;
        }

        body {
            width: 100vw;
            height: 100vh;
            background: var(--background-color);
            display: flex;
            position: relative;
            overflow: hidden;
        }

        /* CONTAINER UTAMA (FULL SCREEN 100%) */
        .login-container {
            width: 100%;
            height: 100%;
            display: flex;
            overflow: hidden;
            background: var(--background-color);
            position: relative;
            z-index: 2;
        }

        /* BAGIAN WELCOME (KIRI) */
        .welcome-section {
            width: 50%;
            height: 100%;
            position: relative;
            overflow: hidden;
            background: var(--background-color);
            padding: 10% 8%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* LINGKARAN UTAMA JUMBO KIRI */
        .welcome-section::before {
            content: "";
            position: absolute;
            width: 130%;
            padding-top: 130%;
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
            color: var(--text-color);
        }

        .welcome-content p {
            font-size: 13px;
            line-height: 1.7;
            color: var(--text-color);
            font-weight: 500;
        }

        /* DUA LINGKARAN KECIL DI BAWAH LINGKARAN UTAMA */
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

        /* LINGKARAN DEKORASI JUMBO POJOK KANAN BAWAH */
        .bg-circle-bottom-right {
            position: absolute;
            width: 350px;       
            height: 350px;
            background: var(--primary-color);
            border-radius: 50%;
            bottom: -100px;
            right: -100px;
            z-index: 2;
           
            pointer-events: none;
        }

        /* BAGIAN LOGIN (KANAN) */
        .login-section {
            width: 50%;
            height: 100%;
            background: var(--background-color);
            padding: 10% 8%;
            color: #18332B;
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
        }

        .input-group i.eye-icon {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #18332B;
            font-size: 16px;
            cursor: pointer;
        }

        .input-group input {
            width: 100%;
            height: 50px;
            border: none;
            outline: none;
            border-radius: 10px;
            padding: 0 45px 0 48px;
            background: var(--secondary-color);
            color: #18332B;
            font-size: 14px;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .input-group input::placeholder {
            color: #BAC7C3;
            font-weight: 600;
        }

        /* TOMBOL LOGIN */
        .login-button {
            margin-top: 30px;
            margin-left: auto;
            display: block;
            width: 150px;
            height: 48px;
            border: none;
            border-radius: 14px;
            background: var(--primary-color);
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
            transform: translateY(-1px);
            z-index: 5;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
            }

            .welcome-section,
            .login-section {
                width: 100%;
                height: 50%;
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
                    Selamat Datang di Aplikasi Jurnal Absensi. Silakan masuk untuk melanjutkan ke halaman utama aplikasi.
                </p>
            </div>

            <div class="circle circle-one"></div>
            <div class="circle circle-two"></div>

        </section>


        <!-- BAGIAN LOGIN -->
        <section class="login-section">

            <h2>Sign In</h2>

            <p class="login-description">
                Silakan masuk dengan akun Anda untuk melanjutkan.
            </p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- INPUT EMAIL -->
                <div class="input-group">
                    <i class="fa-regular fa-envelope input-icon"></i>
                    <input type="email" name="email" required placeholder="Masukkan Email">
                </div>

                <!-- INPUT PASSWORD -->
                <div class="input-group">
                    <i class="fa-solid fa-lock input-icon"></i>
                    <input type="password" name="password" required placeholder="Masukkan Password" id="password-input">
                    <i class="fa-regular fa-eye-slash eye-icon"></i>
                </div>

                <!-- SUBMIT BUTTON -->
                <button type="submit" class="login-button">
                    LOGIN
                </button>

            </form>

        </section>

    </div>

    <!-- BULATAN HIJAU JUMBO DI SISI KANAN BAWAH -->
    <div class="bg-circle-bottom-right"></div>

</body>
</html>