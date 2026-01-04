<?php

use App\Models\Certificate;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        $certificates = Certificate::all();

        foreach ($certificates as $certificate) {
            $certificate->certificate_number = str_replace('/', '-', $certificate->certificate_number);
            $certificate->save();
        }
    }

    public function down()
    {
        $certificates = Certificate::all();

        foreach ($certificates as $certificate) {
            $certificate->certificate_number = str_replace('-', '/', $certificate->certificate_number);
            $certificate->save();
        }
    }
};
