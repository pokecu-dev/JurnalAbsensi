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

        #desktop-version * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        #desktop-version *:not(i) {
            font-family: 'Segoe UI', Arial, sans-serif;
        }

        #desktop-version {
            width: 100%;
            min-height: 100%;
            background: var(--background-dark);
            overflow-x: hidden;
        }

        /* =========================
           CONTAINER UTAMA
        ========================= */

        #desktop-version .login-container {
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

        #desktop-version .welcome-section {
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

        #desktop-version .welcome-section::before {
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

        #desktop-version .welcome-content {
            position: relative;
            z-index: 3;
            max-width: 420px;
        }

        #desktop-version .welcome-content h1 {
            font-size: 52px;
            font-weight: 700;
            margin-bottom: 25px;
            color: var(--text-dark);
        }

        #desktop-version .welcome-content p {
            font-size: 13px;
            line-height: 1.7;
            color: var(--text-dark);
            font-weight: 500;
        }

        /* BULATAN KECIL */

        #desktop-version .circle {
            position: absolute;
            border-radius: 50%;
            background: var(--circle-gradient);
            z-index: 4;
        }

        #desktop-version .circle-one {
            width: 180px;
            height: 180px;
            bottom: -30px;
            left: -20px;
        }

        #desktop-version .circle-two {
            width: 100px;
            height: 100px;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
        }

        /* BULATAN KANAN BAWAH */

        #desktop-version .bg-circle-bottom-right {
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

        #desktop-version .login-section {
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

        #desktop-version .login-section h2 {
            font-size: 52px;
            font-weight: 700;
            margin-bottom: 12px;
            letter-spacing: 0.5px;
        }

        #desktop-version .login-description {
            font-size: 12px;
            color: #D0D5D3;
            margin-bottom: 40px;
            line-height: 1.5;
            max-width: 380px;
        }

        #desktop-version .error-message {
            margin-bottom: 16px;
            color: #ffb4b4;
            font-size: 14px;
        }

        #desktop-version .input-group {
            margin-bottom: 22px;
            position: relative;
            max-width: 420px;
        }

        #desktop-version .input-group i.input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #93A6A0;
            font-size: 18px;
            pointer-events: none;
        }

        #desktop-version .input-group i.eye-icon {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #93A6A0;
            font-size: 16px;
            cursor: pointer;
            padding: 8px;
        }

        #desktop-version .input-group input {
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

        #desktop-version .input-group input::placeholder {
            color: #BAC7C3;
            font-weight: 600;
        }

        #desktop-version .input-group input:focus {
            outline: 2px solid rgba(137, 215, 183, 0.7);
            background: rgba(255, 255, 255, 0.18);
        }

        /* =========================
           TOMBOL LOGIN
        ========================= */

        #desktop-version .login-button {
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

        #desktop-version .login-button:hover {
            background: var(--circle-gradient);
            color: #ffffff;
            transform: translateY(-1px);
        }

        @media (max-width: 600px) {
            #desktop-version { display: none !important; }
        }
        @media (min-width: 601px) {
            #mobile-version { display: none !important; }
        }
    </style>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <div id="desktop-version">

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

    </div>


    <!-- ================
         MOBILE VERSION 
    ===================== -->
    <div id="mobile-version" class="relative min-h-screen max-w-md mx-auto bg-[#162C25] flex flex-col overflow-hidden">

        <!-- WELCOME / DOME SECTION -->
        <section class="relative px-8 pt-16 pb-28 z-10 overflow-visible">

            <!-- Lingkaran besar (digeser ke kiri) -->
            <div class="absolute w-[560px] h-[560px] -top-[260px] -left-[90px]
                        rounded-full bg-gradient-to-br from-[#A7E4CA] to-[#7ED0AC] z-0"></div>

            <div class="relative z-10 max-w-[85%]">
                <h1 class="text-black font-bold text-4xl mb-3">Welcome!</h1>
                <p class="text-black/80 text-sm leading-relaxed font-medium">
                    Selamat Datang di Aplikasi Jurnal Absensi.
                    Silakan masuk untuk melanjutkan ke halaman utama aplikasi.
                </p>
            </div>

            <!-- Bulatan dekorasi yang nyembul di bawah dome -->
            <div class="absolute -bottom-6 left-[4%] w-[120px] h-[120px] rounded-full
                        bg-gradient-to-br from-[#A7E4CA] to-[#7ED0AC] z-0"></div>
            <div class="absolute -bottom-3 left-[24%] w-[68px] h-[68px] rounded-full
                        bg-gradient-to-br from-[#A7E4CA] to-[#7ED0AC] z-0"></div>
        </section>

        <!-- LOGIN SECTION -->
        <section class="relative flex-1 flex flex-col justify-start px-7 pt-12 pb-16 z-20">

            <h2 class="text-white font-bold text-3xl mb-2 tracking-wide">Login</h2>
            <p class="text-[#8E9F98] text-[13px] mb-8 leading-snug">
                Silakan masuk dengan akun Anda untuk melanjutkan.
            </p>

            <form method="POST" action="{{ route('login') }}" class="w-full">
                @csrf

                @if ($errors->has('email'))
                    <p class="text-red-300 text-sm mb-4" role="alert">
                        {{ $errors->first('email') }}
                    </p>
                @endif

                <div class="space-y-5">
                    <!-- INPUT EMAIL -->
                    <div class="relative">
                        <i class="fa-regular fa-envelope absolute left-4 top-1/2 -translate-y-1/2
                                  text-[#4A4A3A]/70 text-lg pointer-events-none"></i>
                        <input
                            type="email"
                            name="email"
                            required
                            placeholder="Masukkan Email"
                            class="w-full h-[54px] rounded-[18px] pl-12 pr-4
                                   bg-[#FEFCE8] text-[#1a1a1a] font-semibold text-sm
                                   placeholder:text-[#A9A98C] placeholder:font-semibold
                                   outline-none focus:ring-2 focus:ring-[#89D7B7]/70 transition"
                        >
                    </div>

                    <!-- INPUT PASSWORD -->
                    <div class="relative">
                        <i class="fa-solid fa-lock absolute left-4 top-1/2 -translate-y-1/2
                                  text-[#4A4A3A]/70 text-lg pointer-events-none"></i>
                        <input
                            type="password"
                            name="password"
                            required
                            placeholder="Masukkan Password"
                            id="password-input-mobile"
                            class="w-full h-[54px] rounded-[18px] pl-12 pr-12
                                   bg-[#FEFCE8] text-[#1a1a1a] font-semibold text-sm
                                   placeholder:text-[#A9A98C] placeholder:font-semibold
                                   outline-none focus:ring-2 focus:ring-[#89D7B7]/70 transition"
                        >
                        <i
                            id="toggle-password-mobile"
                            class="fa-regular fa-eye-slash absolute right-4 top-1/2 -translate-y-1/2
                                   text-[#4A4A3A]/70 text-base cursor-pointer p-2"
                        ></i>
                    </div>
                </div>

                <!-- SUBMIT -->
                <button
                    type="submit"
                    class="w-full h-[54px] mt-8 rounded-[20px] bg-[#7ED0AC]
                           text-[#18332B] font-bold text-base tracking-wide
                           shadow-lg shadow-black/20 transition-all duration-200
                           hover:bg-gradient-to-br hover:from-[#A7E4CA] hover:to-[#7ED0AC]
                           hover:text-white hover:-translate-y-0.5"
                >
                    LOGIN
                </button>
            </form>
        </section>

        <!-- BULATAN HIJAU JUMBO KANAN BAWAH -->
        <div class="absolute -bottom-8 -right-8 w-[140px] h-[140px] rounded-full
                    bg-gradient-to-br from-[#A7E4CA] to-[#7ED0AC] pointer-events-none z-0"></div>
    </div>


    <script>
        // Toggle password — DESKTOP (kode asli kamu)
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

        // Toggle password — MOBILE (versi Tailwind)
        const togglePasswordMobile = document.querySelector('#toggle-password-mobile');
        const passwordInputMobile = document.querySelector('#password-input-mobile');

        togglePasswordMobile.addEventListener('click', function () {
            const type = passwordInputMobile.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInputMobile.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>

</body>
</html>