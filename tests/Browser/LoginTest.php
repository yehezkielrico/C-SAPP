<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    public function test_pengguna_dapat_masuk_dan_melihat_dashboard(): void
    {
        $user = User::factory()->create([
            'email' => 'learner@example.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                ->assertSee('Masuk ke akun Anda')
                ->type('email', $user->email)
                ->type('password', 'password')
                ->press('Masuk')
                ->waitForLocation('/dashboard', 5)
                ->waitForText('Selamat Datang', 5)
                ->assertSee('Lanjutkan pembelajaran keamanan siber Anda');
        });
    }
}

