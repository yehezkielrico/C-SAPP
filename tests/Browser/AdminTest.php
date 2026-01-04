<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminTest extends DuskTestCase
{
    public function test_dashboard_admin_dapat_diakses(): void
    {
        $admin = User::factory()->create([
            'name' => 'Admin Dusk',
            'is_admin' => true,
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        $this->browse(function (Browser $browser) use ($admin) {
            $browser->loginAs($admin)
                ->visit('/admin/dashboard')
                ->waitForText('Selamat Datang, Admin '.$admin->name.'!', 5)
                ->assertSee('Statistik Pengguna')
                ->assertSee('Manajemen Konten');
        });
    }
}

