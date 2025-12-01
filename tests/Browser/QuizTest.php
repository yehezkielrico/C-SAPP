<?php

namespace Tests\Browser;

use App\Models\Module;
use App\Models\Quiz;
use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class QuizTest extends DuskTestCase
{
    public function test_daftar_kuis_menampilkan_pertanyaan_yang_tersedia(): void
    {
        $creator = User::factory()->create(['is_admin' => true]);
        $learner = User::factory()->create([
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        $module = Module::create([
            'title' => 'Manajemen Password',
            'subtitle' => 'Best Practice',
            'description' => 'Pelajari cara membuat password yang kuat.',
            'content' => '<p>Konten modul manajemen password.</p>',
            'order' => 1,
            'has_quiz' => true,
            'is_published' => true,
            'created_by' => $creator->id,
        ]);

        Quiz::create([
            'module_id' => $module->id,
            'title' => 'Kuis Password',
            'question' => 'Karakter apa yang wajib ada pada password kuat?',
            'option_a' => 'Hanya huruf besar',
            'option_b' => 'Huruf besar, kecil, angka, simbol',
            'option_c' => 'Hanya angka',
            'option_d' => 'Nama lengkap',
            'correct_answer' => 'b',
            'explanation' => 'Password kuat berisi kombinasi huruf, angka, simbol.',
            'is_published' => true,
        ]);

        $this->browse(function (Browser $browser) use ($learner, $module) {
            $browser->loginAs($learner)
                ->visit('/quizzes')
                ->waitForText('Kuis Pembelajaran', 5)
                ->assertSee($module->title)
                ->assertSee($module->description)
                ->assertSee(sprintf('%d Pertanyaan', 1));
        });
    }
}

