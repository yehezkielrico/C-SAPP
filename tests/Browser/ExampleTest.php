<?php

use Laravel\Dusk\Browser;

test('contoh_dasar_halaman_awal', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/')
                ->assertSee('Laravel');
    });
});
