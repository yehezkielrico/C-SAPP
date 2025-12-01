<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ProfileBrowserTest extends DuskTestCase
{
    public function test_halaman_profil_dapat_diakses_pengguna(): void
    {
        $user = User::factory()->create([
            'name' => 'Profil User',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                ->visit('/profile')
                ->waitForText('Profile Settings', 5)
                ->assertInputValue('name', 'Profil User')
                ->assertSee('Delete Account');
        });
    }
}

