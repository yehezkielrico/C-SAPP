<?php

namespace Tests\Browser;

use App\Models\Simulation;
use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SimulationTest extends DuskTestCase
{
    public function test_katalog_simulasi_dapat_diakses_pengguna(): void
    {
        $creator = User::factory()->create(['is_admin' => true]);
        $learner = User::factory()->create([
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        Simulation::create([
            'title' => 'Simulasi Phishing Email',
            'description' => 'Identifikasi email phishing yang berbahaya.',
            'scenario' => 'Pengguna menerima email mencurigakan dari bank.',
            'steps' => [
                'Periksa alamat email pengirim',
                'Klik tautan yang diberikan',
            ],
            'options' => [
                ['Verifikasi domain', 'Langsung percaya'],
                ['Laporkan ke tim IT', 'Masukkan kredensial'],
            ],
            'correct_answers' => [0, 0],
            'type' => 'phishing',
            'is_published' => true,
            'created_by' => $creator->id,
        ]);

        $this->browse(function (Browser $browser) use ($learner) {
            $browser->loginAs($learner)
                ->visit('/simulations')
                ->waitForText('Simulasi Phishing Email', 5)
                ->assertSee('Identifikasi email phishing yang berbahaya.');
        });
    }
}

