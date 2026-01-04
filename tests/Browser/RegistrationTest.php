<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegistrationTest extends DuskTestCase
{
    public function test_registrasi_dilewati_karena_perlu_verifikasi_email(): void
    {
        $this->markTestSkipped('Registrasi dilewati karena membutuhkan verifikasi email manual.');
    }
}

