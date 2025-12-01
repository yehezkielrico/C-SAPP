<?php

namespace Tests\Browser;

use App\Models\ForumTopic;
use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ForumTest extends DuskTestCase
{
    public function test_daftar_forum_menampilkan_topik_diskusi(): void
    {
        $author = User::factory()->create([
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        ForumTopic::create([
            'user_id' => $author->id,
            'title' => 'Bagaimana cara mendeteksi phishing?',
            'content' => 'Diskusikan indikator phishing.',
            'is_pinned' => false,
            'is_locked' => false,
            'views' => 0,
        ]);

        $this->browse(function (Browser $browser) use ($author) {
            $browser->loginAs($author)
                ->visit('/forum')
                ->waitForText('Security Community', 5)
                ->assertSee('Bagaimana cara mendeteksi phishing?')
                ->assertSee($author->name)
                ->assertSee('0 replies');
        });
    }
}

