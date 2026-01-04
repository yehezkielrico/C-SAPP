<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\EmailVerificationOTP;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class EmailVerificationOTPController extends Controller
{
    /**
     * Show the OTP verification form.
     */
    public function show(): View
    {
        $email = session('pending_verification_email');

        if (!$email) {
            return redirect()->route('register');
        }

        return view('auth.verify-otp', compact('email'));
    }

    /**
     * Verify the OTP code.
     */
    public function verify(Request $request)
    {
        $request->validate([
            'otp' => 'required|string|size:6',
        ]);

        $email = session('pending_verification_email');

        if (!$email) {
            return redirect()->route('register');
        }

        $user = User::where('email', $email)->first();

        if (!$user) {
            return back()->withErrors(['otp' => 'User not found.']);
        }

        // Check if OTP is correct and not expired
        if ($user->email_verification_code !== $request->otp) {
            return back()->withErrors(['otp' => 'Kode OTP tidak valid.']);
        }

        if (now()->isAfter($user->email_verification_code_expires_at)) {
            return back()->withErrors(['otp' => 'Kode OTP telah kadaluarsa. Silakan minta kode baru.']);
        }

        // Mark email as verified
        $user->update([
            'email_verified_at' => now(),
            'email_verification_code' => null,
            'email_verification_code_expires_at' => null,
        ]);

        // Clear session
        session()->forget('pending_verification_email');

        // Log the user in
        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Email berhasil diverifikasi. Selamat datang!');
    }

    /**
     * Resend the OTP code.
     */
    public function resend(Request $request)
    {
        $email = session('pending_verification_email');

        if (!$email) {
            return redirect()->route('register');
        }

        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->route('register');
        }

        // Generate new OTP
        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        $user->update([
            'email_verification_code' => $otp,
            'email_verification_code_expires_at' => now()->addMinutes(10),
        ]);

        // Send OTP email
        try {
            Mail::to($user->email)->send(new EmailVerificationOTP($user, $otp));
        } catch (\Exception $e) {
            \Log::error('Failed to resend OTP email', [
                'user_id' => $user->id,
                'email' => $user->email,
                'error' => $e->getMessage(),
            ]);
            return back()->withErrors(['email' => 'Gagal mengirim ulang kode OTP. Silakan coba lagi.']);
        }

        return back()->with('success', 'Kode OTP baru telah dikirim ke email Anda.');
    }
}
