@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-12 bg-gray-50 dark:bg-gradient-to-br dark:from-[#071021] dark:to-[#07141d]">
    <div class="max-w-5xl w-full grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
        <!-- Decorative left panel -->
        <div class="hidden md:flex items-center justify-center p-8 rounded-2xl bg-gradient-to-br from-[#10b981] via-[#06b6d4] to-[#06b6d4] text-white shadow-xl overflow-hidden relative" style="background-blend-mode: multiply;">
            <div class="absolute inset-0 opacity-25 blur-2xl bg-gradient-to-tr from-black/10 to-transparent mix-blend-overlay"></div>
            <div class="relative z-10 text-center space-y-4">
                <img src="/storage/images/LOGO.png" alt="Logo" class="mx-auto w-24 h-24 object-contain" onerror="this.style.display='none'">
                <h3 class="text-2xl font-bold">Verifikasi Email</h3>
                <p class="opacity-90 max-w-xs mx-auto">Masukkan kode OTP yang telah dikirim ke email Anda untuk menyelesaikan pendaftaran.</p>
                <div class="mt-4 flex items-center justify-center space-x-3">
                    <div class="text-sm px-3 py-1 bg-white/20 rounded-full">Keamanan</div>
                    <div class="text-sm px-3 py-1 bg-white/20 rounded-full">Cepat</div>
                </div>
            </div>
        </div>

        <!-- Form panel -->
        <div class="bg-white dark:bg-[#0B1220] border border-gray-200 dark:border-gray-800 rounded-2xl shadow-lg p-8">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Verifikasi Email</h2>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                Kode OTP telah dikirim ke <strong>{{ $email }}</strong>
            </p>

            @if(session('success'))
                <div class="mt-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('verification.otp.verify') }}" class="mt-6 space-y-5" novalidate>
                @csrf

                <div>
                    <label for="otp" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kode OTP</label>
                    <input id="otp" name="otp" type="text" required maxlength="6" placeholder="123456"
                        class="mt-1 block w-full rounded-lg bg-gray-50 dark:bg-[#071423] border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white px-4 py-3 text-center text-2xl font-mono tracking-widest placeholder-gray-400 focus:ring-2 focus:ring-green-500 focus:outline-none">
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Masukkan 6 digit kode yang dikirim ke email Anda</p>
                    <x-input-error :messages="$errors->get('otp')" class="mt-2 text-sm text-red-500" />
                </div>

                <div>
                    <button type="submit" class="w-full inline-flex items-center justify-center gap-2 px-4 py-3 bg-gradient-to-r from-[#10b981] to-[#06b6d4] hover:from-[#0ea56f] text-white font-semibold rounded-lg transition-shadow duration-200 shadow-md">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Verifikasi</span>
                    </button>
                </div>

                <div class="text-center">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Tidak menerima kode?
                        <form method="POST" action="{{ route('verification.otp.resend') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-blue-500 hover:underline font-medium">
                                Kirim ulang
                            </button>
                        </form>
                    </p>
                </div>

                <div class="text-center">
                    <a href="{{ route('register') }}" class="text-sm text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200">
                        Kembali ke pendaftaran
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Auto-focus on OTP input
    document.getElementById('otp').focus();

    // Auto-submit when 6 digits are entered
    document.getElementById('otp').addEventListener('input', function(e) {
        // Remove non-numeric characters
        this.value = this.value.replace(/[^0-9]/g, '');

        // Auto-submit when 6 digits
        if (this.value.length === 6) {
            setTimeout(() => {
                this.form.submit();
            }, 500);
        }
    });

    // Prevent form submission on Enter if OTP is not complete
    document.querySelector('form').addEventListener('submit', function(e) {
        const otp = document.getElementById('otp').value;
        if (otp.length !== 6) {
            e.preventDefault();
            alert('Silakan masukkan kode OTP 6 digit yang lengkap.');
        }
    });
</script>
@endsection
