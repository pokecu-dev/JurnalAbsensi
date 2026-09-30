<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Link Tidak Berlaku</title>
</head>

<body>

    <h1>Link Approval Tidak Berlaku</h1>

    @if ($dispen->status === 'pending')

        <p>
            Link approval ini sudah digunakan atau sudah kedaluwarsa.
        </p>

        <p>
            Pengajuan masih menunggu persetujuan.
        </p>

        <p id="resend-message">
            Menghitung waktu kirim ulang...
        </p>

        <form
            id="resend-form"
            action="{{ route('dispen.approval.resend', [
                'dispen' => $dispen,
                'token' => request()->route('token'),
            ]) }}"
            method="POST"
        >
            @csrf

            <button
                id="resend-button"
                type="submit"
                disabled
            >
                Kirim Ulang Link
            </button>
        </form>

        <script>
            const lastSentAt = new Date(
                @json($approvalToken->last_sent_at->toIso8601String())
            );

            const resendButton =
                document.getElementById('resend-button');

            const resendMessage =
                document.getElementById('resend-message');

            const cooldownSeconds = 45;

            function updateCountdown() {
                const now = new Date();

                const elapsedSeconds = Math.floor(
                    (now.getTime() - lastSentAt.getTime()) / 1000
                );

                const remaining =
                    cooldownSeconds - elapsedSeconds;

                if (remaining > 0) {
                    resendButton.disabled = true;

                    resendMessage.textContent =
                        `Kirim ulang tersedia dalam ${remaining} detik.`;

                    return;
                }

                resendButton.disabled = false;

                resendMessage.textContent =
                    'Link dapat dikirim ulang.';
            }

            updateCountdown();

            const timer = setInterval(() => {
                updateCountdown();

                if (!resendButton.disabled) {
                    clearInterval(timer);
                }
            }, 1000);
        </script>

    @else

        <p>
            Pengajuan dispensasi sudah selesai diproses.
        </p>

        <p>
            Status:
            <strong>{{ $dispen->status }}</strong>
        </p>

    @endif

</body>

</html>