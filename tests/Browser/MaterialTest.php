<?php

namespace Tests\Browser;

use App\Models\Module;
use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MaterialTest extends DuskTestCase
{
    public function test_halaman_materi_menampilkan_modul_terbit(): void
    {
        $creator = User::factory()->create(['is_admin' => true]);
        $learner = User::factory()->create([
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        Module::create([
            'title' => 'Dasar Keamanan Siber',
            'subtitle' => 'Pengantar',
            'description' => 'Modul ringkas mengenai prinsip keamanan informasi.',
            'content' => '<p>Isi modul pengantar keamanan siber.</p>',
            'youtube_url' => null,
            'order' => 1,
            'is_published' => true,
            'has_quiz' => true,
            'created_by' => $creator->id,
        ]);

        $this->browse(function (Browser $browser) use ($learner) {
            $browser->loginAs($learner)
                ->visit('/materials')
                ->waitForText('Materi Pembelajaran', 5)
                ->assertSee('Dasar Keamanan Siber')
                ->assertSee('Kuis');
        });
    }
}

