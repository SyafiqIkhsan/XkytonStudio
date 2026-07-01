<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman login admin.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Memproses percobaan login / autentikasi.
     */
    public function login(Request $request)
    {
        // 1. Validasi input dari form login
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // 2. Cek status "Remember Me" (Keep session alive)
        $remember = $request->filled('remember');

        // 3. Jalankan proses autentikasi ke database
        if (Auth::attempt($credentials, $remember)) {
            // Regenerasi session untuk mencegah serangan Session Fixation
            $request->session()->regenerate();

            // Redirect ke halaman dashboard admin (atau ke URL yang dituju sebelum kena tendang)
            return redirect()->intended(route('admin.dashboard'));
        }

        // 4. Jika gagal, kembalikan dengan pesan error klasik
        throw ValidationException::withMessages([
            'email' => ['The provided credentials do not match our secure records.'],
        ]);
    }

    /**
     * Memproses logout admin.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // Menghapus data session saat ini
        $request->session()->invalidate();

        // Membuat ulang token CSRF baru demi keamanan
        $request->session()->regenerateToken();

        // Kembalikan ke halaman utama portofolio
        return redirect()->route('portofolio.index');
    }
}
