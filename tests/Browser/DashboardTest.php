<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DashboardTest extends DuskTestCase
{
    public function test_dashboard_menampilkan_sambutan_dan_tombol_cepat(): void
    {
        $user = User::factory()->create([
            'name' => 'Dusk Learner',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                ->visit('/dashboard')
                ->waitForText('Selamat Datang, '.$user->name.'!', 5)
                ->assertSee('Lanjutkan pembelajaran keamanan siber Anda')
                ->assertSee('Lihat Semua Materi')
                ->assertSee('Mulai Kuis');
        });
    }
}

