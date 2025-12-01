<?php

namespace Tests\Browser;

use App\Models\Survey;
use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SurveyTest extends DuskTestCase
{
    public function test_halaman_survei_menampilkan_kuesioner_aktif(): void
    {
        $creator = User::factory()->create(['is_admin' => true]);
        $learner = User::factory()->create([
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        Survey::create([
            'title' => 'Survey Kepuasan Pembelajaran',
            'description' => 'Berikan penilaian atas materi yang telah dipelajari.',
            'purpose' => 'Mengetahui tingkat kepuasan peserta',
            'questions' => [
                ['type' => 'scale', 'question' => 'Seberapa puas Anda?', 'options' => [1, 2, 3, 4, 5]],
                ['type' => 'text', 'question' => 'Saran perbaikan modul', 'options' => []],
            ],
            'options' => [],
            'is_published' => true,
            'is_anonymous' => true,
            'created_by' => $creator->id,
        ]);

        $this->browse(function (Browser $browser) use ($learner) {
            $browser->loginAs($learner)
                ->visit('/surveys')
                ->waitForText('Survey Kepuasan Pembelajaran', 5)
                ->assertSee('Berikan penilaian atas materi yang telah dipelajari.');
        });
    }
}

