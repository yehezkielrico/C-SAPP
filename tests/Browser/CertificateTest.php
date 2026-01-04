<?php

namespace Tests\Browser;

use App\Models\Certificate;
use App\Models\Module;
use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CertificateTest extends DuskTestCase
{
    public function test_halaman_sertifikat_menampilkan_pencapaian_pengguna(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $learner = User::factory()->create([
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        $module = Module::create([
            'title' => 'Pertahanan Jaringan',
            'subtitle' => 'Network Defense',
            'description' => 'Modul lanjutan pertahanan jaringan.',
            'content' => '<p>Konten modul pertahanan jaringan.</p>',
            'order' => 1,
            'is_published' => true,
            'has_quiz' => true,
            'created_by' => $admin->id,
        ]);

        Certificate::create([
            'user_id' => $learner->id,
            'module_id' => $module->id,
            'certificate_number' => Certificate::generateCertificateNumber(),
            'title' => $module->title,
            'score' => 95,
            'issued_at' => now(),
        ]);

        $this->browse(function (Browser $browser) use ($learner, $module) {
            $browser->loginAs($learner)
                ->visit('/certificates')
                ->waitForText('Sertifikat Saya', 5)
                ->assertSee('Pertahanan Jaringan')
                ->assertSee('Nomor Sertifikat:')
                ->assertSee('Download');
        });
    }
}

