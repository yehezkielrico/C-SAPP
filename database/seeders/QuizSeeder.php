<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Quiz;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    public function run(): void
    {
        $quizBlueprints = [
            'Fundamental Keamanan Siber' => [
                'title' => 'Kuis Fundamental Keamanan Siber',
                'questions' => [
                    [
                        'question' => 'Apa tujuan utama dari CIA triad dalam keamanan informasi?',
                        'option_a' => 'Menentukan jenis firewall yang digunakan',
                        'option_b' => 'Menjaga kerahasiaan, integritas, dan ketersediaan data',
                        'option_c' => 'Membuat jadwal patching bulanan',
                        'option_d' => 'Menentukan struktur tim keamanan',
                        'correct_answer' => 'b',
                        'explanation' => 'CIA triad memastikan informasi tetap confidential, tidak dimodifikasi tanpa otorisasi, dan selalu tersedia.',
                    ],
                    [
                        'question' => 'Mengapa penting memahami aktor ancaman (threat actors)?',
                        'option_a' => 'Untuk memilih warna dashboard SOC',
                        'option_b' => 'Agar mengetahui motivasi dan teknik yang kemungkinan digunakan',
                        'option_c' => 'Supaya dapat memblokir semua lalu lintas internet',
                        'option_d' => 'Karena diwajibkan oleh ISP',
                        'correct_answer' => 'b',
                        'explanation' => 'Memahami motivasi dan kemampuan aktor membantu menentukan prioritas kontrol defensif.',
                    ],
                    [
                        'question' => 'Standar apa yang menyediakan kerangka kerja Identify–Protect–Detect–Respond–Recover?',
                        'option_a' => 'ISO 27005',
                        'option_b' => 'PCI DSS',
                        'option_c' => 'NIST Cybersecurity Framework',
                        'option_d' => 'COBIT 5',
                        'correct_answer' => 'c',
                        'explanation' => 'NIST CSF memecah program keamanan ke lima fungsi inti untuk memudahkan maturity assessment.',
                    ],
                    [
                        'question' => 'Apa langkah paling awal ketika membangun program keamanan dasar?',
                        'option_a' => 'Membeli SIEM termahal di pasar',
                        'option_b' => 'Menentukan peran dan tanggung jawab tim keamanan',
                        'option_c' => 'Memasang honeypot di semua server',
                        'option_d' => 'Menghapus semua akses VPN',
                        'correct_answer' => 'b',
                        'explanation' => 'Program yang matang diawali dengan struktur peran, kebijakan, dan alur eskalasi yang jelas.',
                    ],
                ],
            ],
            'Keamanan Jaringan & Monitoring' => [
                'title' => 'Kuis Keamanan Jaringan & Monitoring',
                'questions' => [
                    [
                        'question' => 'Apa manfaat utama segmentasi jaringan berbasis zona?',
                        'option_a' => 'Mempercepat koneksi internet pengguna',
                        'option_b' => 'Membatasi pergerakan lateral penyerang dan memperkecil blast radius',
                        'option_c' => 'Mengurangi kebutuhan dokumentasi',
                        'option_d' => 'Menonaktifkan kebutuhan firewall',
                        'correct_answer' => 'b',
                        'explanation' => 'Segmentasi memisahkan aset bernilai tinggi sehingga kompromi tidak menyebar luas.',
                    ],
                    [
                        'question' => 'Filter Wireshark mana yang tepat untuk menampilkan seluruh traffic DNS?',
                        'option_a' => 'http.request',
                        'option_b' => 'tcp.port == 80',
                        'option_c' => 'dns',
                        'option_d' => 'icmp.type == 8',
                        'correct_answer' => 'c',
                        'explanation' => 'Filter sederhana "dns" akan menangkap query dan response DNS pada paket UDP/TCP port 53.',
                    ],
                    [
                        'question' => 'Apa tujuan utama IDS (Intrusion Detection System)?',
                        'option_a' => 'Mengganti fungsi backup harian',
                        'option_b' => 'Mendeteksi aktivitas anomali atau berbahaya pada jaringan',
                        'option_c' => 'Mengelola inventori perangkat',
                        'option_d' => 'Mengacak alamat MAC pada switch',
                        'correct_answer' => 'b',
                        'explanation' => 'IDS fokus mengenali pola serangan agar tim dapat melakukan triase dan respons.',
                    ],
                    [
                        'question' => 'Mengapa korelasi log penting dalam monitoring?',
                        'option_a' => 'Agar log lebih mudah dihapus',
                        'option_b' => 'Membantu menggabungkan beberapa event menjadi satu insiden bermakna',
                        'option_c' => 'Mengurangi storage SIEM',
                        'option_d' => 'Karena diwajibkan oleh router',
                        'correct_answer' => 'b',
                        'explanation' => 'Korelasi menghubungkan event berbeda untuk menilai konteks serangan secara menyeluruh.',
                    ],
                ],
            ],
            'Keamanan Aplikasi Web' => [
                'title' => 'Kuis Keamanan Aplikasi Web',
                'questions' => [
                    [
                        'question' => 'Kerentanan apa yang dieksploitasi ketika input tidak divalidasi dan disimpan di database kemudian dipresentasikan ulang?',
                        'option_a' => 'Stored XSS',
                        'option_b' => 'CSRF',
                        'option_c' => 'Command Injection',
                        'option_d' => 'Open Redirect',
                        'correct_answer' => 'a',
                        'explanation' => 'Stored XSS terjadi ketika payload disimpan di server dan dijalankan oleh pengguna lain.',
                    ],
                    [
                        'question' => 'Teknik apa yang efektif mencegah SQL Injection pada ORM modern?',
                        'option_a' => 'String concatenation',
                        'option_b' => 'Parameter binding/prepared statements',
                        'option_c' => 'Menonaktifkan logging',
                        'option_d' => 'Menggunakan HTTP GET',
                        'correct_answer' => 'b',
                        'explanation' => 'Binding menggantikan input user sebagai parameter sehingga query tidak berubah strukturnya.',
                    ],
                    [
                        'question' => 'Apa fungsi Content Security Policy (CSP)?',
                        'option_a' => 'Mengatur jadwal maintenance',
                        'option_b' => 'Membatasi sumber konten seperti script dan frame untuk mencegah XSS',
                        'option_c' => 'Meningkatkan jumlah thread PHP',
                        'option_d' => 'Mengganti framework frontend',
                        'correct_answer' => 'b',
                        'explanation' => 'CSP menentukan asal konten yang diizinkan sehingga script injeksi ditolak browser.',
                    ],
                    [
                        'question' => 'Bagaimana cara mencegah CSRF di aplikasi Laravel?',
                        'option_a' => 'Menghapus semua form',
                        'option_b' => 'Menggunakan token CSRF pada form dan memverifikasinya di server',
                        'option_c' => 'Memaksa pengguna login ulang',
                        'option_d' => 'Menggunakan metode GET untuk semua aksi',
                        'correct_answer' => 'b',
                        'explanation' => 'Laravel otomatis menambahkan token pada form yang diverifikasi middleware `VerifyCsrfToken`.',
                    ],
                ],
            ],
            'Penetration Testing Terstruktur' => [
                'title' => 'Kuis Penetration Testing Terstruktur',
                'questions' => [
                    [
                        'question' => 'Apa tujuan utama tahap reconnaissance dalam pentest?',
                        'option_a' => 'Menghapus jejak tes',
                        'option_b' => 'Mengumpulkan informasi target untuk memetakan attack surface',
                        'option_c' => 'Menulis laporan akhir',
                        'option_d' => 'Melakukan patching server',
                        'correct_answer' => 'b',
                        'explanation' => 'Recon memberikan gambaran aset dan layanan yang dapat dijadikan titik masuk.',
                    ],
                    [
                        'question' => 'Alat apa yang biasa digunakan untuk enumerasi subdomain otomatis?',
                        'option_a' => 'dirsearch',
                        'option_b' => 'Hydra',
                        'option_c' => 'Amass',
                        'option_d' => 'Burp Repeater',
                        'correct_answer' => 'c',
                        'explanation' => 'OWASP Amass populer untuk pemetaan subdomain menggunakan passive maupun active recon.',
                    ],
                    [
                        'question' => 'Mengapa penting menyepakati Rules of Engagement (RoE) sebelum pentest?',
                        'option_a' => 'Untuk menentukan warna tema laporan',
                        'option_b' => 'Agar scope, jadwal, dan batasan legal jelas bagi semua pihak',
                        'option_c' => 'Supaya tester bisa bekerja tanpa dokumentasi',
                        'option_d' => 'Untuk menonaktifkan SOC',
                        'correct_answer' => 'b',
                        'explanation' => 'RoE menetapkan batasan agar kegiatan tetap legal dan tidak mengganggu operasi bisnis.',
                    ],
                    [
                        'question' => 'Bagian laporan mana yang dibaca manajemen terlebih dahulu?',
                        'option_a' => 'Lampiran daftar port',
                        'option_b' => 'Executive summary dengan prioritas remediation',
                        'option_c' => 'Appendix konfigurasi scanner',
                        'option_d' => 'Dump database',
                        'correct_answer' => 'b',
                        'explanation' => 'Pimpinan memerlukan ringkasan risiko tinggi dan rekomendasi strategis.',
                    ],
                ],
            ],
            'Incident Response & Forensik Digital' => [
                'title' => 'Kuis Incident Response & Forensik Digital',
                'questions' => [
                    [
                        'question' => 'Tahap mana pada siklus incident response yang berfokus menahan dampak insiden?',
                        'option_a' => 'Preparation',
                        'option_b' => 'Containment',
                        'option_c' => 'Lessons Learned',
                        'option_d' => 'Posture Review',
                        'correct_answer' => 'b',
                        'explanation' => 'Containment menargetkan pembatasan penyebaran sebelum eradikasi dan recovery.',
                    ],
                    [
                        'question' => 'Artefak Windows apa yang berguna menganalisis program yang baru dijalankan?',
                        'option_a' => 'Prefetch',
                        'option_b' => 'Cron tab',
                        'option_c' => 'Bash history',
                        'option_d' => 'fstab',
                        'correct_answer' => 'a',
                        'explanation' => 'File Prefetch menyimpan informasi eksekusi aplikasi sehingga membantu timeline analisis.',
                    ],
                    [
                        'question' => 'Mengapa dokumentasi chain of custody penting dalam forensik?',
                        'option_a' => 'Untuk mempercantik laporan',
                        'option_b' => 'Menjamin bukti diterima secara legal karena terjaga integritasnya',
                        'option_c' => 'Mengurangi ukuran berkas',
                        'option_d' => 'Mempercepat proses imaging',
                        'correct_answer' => 'b',
                        'explanation' => 'Chain of custody memastikan setiap perpindahan bukti tercatat sehingga tidak diragukan.',
                    ],
                    [
                        'question' => 'Apa tujuan utama fase Lessons Learned?',
                        'option_a' => 'Menghapus semua log',
                        'option_b' => 'Mengidentifikasi perbaikan proses dan kontrol agar insiden tidak terulang',
                        'option_c' => 'Menambah downtime',
                        'option_d' => 'Menyembunyikan laporan dari regulator',
                        'correct_answer' => 'b',
                        'explanation' => 'Lessons learned digunakan untuk menyempurnakan SOP, kontrol teknis, dan pelatihan.',
                    ],
                ],
            ],
        ];

        foreach ($quizBlueprints as $moduleTitle => $quizData) {
            $module = Module::where('title', $moduleTitle)->first();

            if (!$module) {
                continue;
            }

            Quiz::where('module_id', $module->id)
                ->where('title', $quizData['title'])
                ->delete();

            foreach ($quizData['questions'] as $question) {
                Quiz::create([
                    'module_id' => $module->id,
                    'title' => $quizData['title'],
                    'question' => $question['question'],
                    'option_a' => $question['option_a'],
                    'option_b' => $question['option_b'],
                    'option_c' => $question['option_c'],
                    'option_d' => $question['option_d'],
                    'correct_answer' => $question['correct_answer'],
                    'explanation' => $question['explanation'],
                    'is_published' => 1,
                ]);
            }

            $module->update(['has_quiz' => true]);
        }
    }
}

