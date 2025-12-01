<?php

namespace Tests\Browser;

use App\Models\Notification;
use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NotificationTest extends DuskTestCase
{
    public function test_pengguna_dapat_melihat_inbox_notifikasi(): void
    {
        $user = User::factory()->create([
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        Notification::create([
            'user_id' => $user->id,
            'type' => 'training_update',
            'message' => 'Modul baru siap dipelajari.',
            'data' => ['module' => 'Keamanan Cloud'],
            'read' => false,
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                ->visit('/notifications')
                ->waitForText('Notifikasi', 5)
                ->assertSee('Modul baru siap dipelajari.')
                ->assertSee('Terkait modul: Keamanan Cloud')
                ->assertSee('Tandai dibaca');
        });
    }
}

