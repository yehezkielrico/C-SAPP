<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SecurityTest extends DuskTestCase
{
    public function test_pengguna_dapat_membuka_halaman_two_factor(): void
    {
        $user = User::factory()->create([
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'google2fa_enabled' => false,
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                ->visit('/2fa')
                ->waitForText('Aktifkan Two Factor Authentication', 5)
                ->assertSee('Amankan akun Anda dengan lapisan perlindungan tambahan');
        });
    }
}

