<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Subtitle;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ModuleSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@csapp.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'is_admin' => true,
            ]
        );

        $modules = [
            [
                'title' => 'Fundamental Keamanan Siber',
                'subtitle' => 'Konsep inti dan mindset defender modern',
                'description' => 'Mengenalkan prinsip dasar keamanan informasi, model CIA triad, dan peran tiap tim dalam menahan serangan siber.',
                'content' => <<<'HTML'
<p>Modul pengantar ini membantu peserta membangun fondasi kuat seputar konsep keamanan informasi.</p>
<ul>
    <li>Memahami hubungan antara aset bisnis, ancaman, dan kerentanan.</li>
    <li>Mengaitkan CIA triad dengan kebijakan perusahaan dan kontrol teknis.</li>
    <li>Menyiapkan kerangka kerja dasar sesuai standar NIST CSF.</li>
</ul>
HTML,
                'youtube_url' => 'https://www.youtube.com/watch?v=inWWhr5tnEA',
                'has_quiz' => true,
                'subtitles' => [
                    [
                        'title' => 'Lanskap Ancaman Modern',
                        'description' => 'Memetakan aktor ancaman, motivasi mereka, dan contoh insiden terbaru di kawasan ASEAN.',
                        'youtube_url' => 'https://www.youtube.com/watch?v=yb4e1JcNwNM',
                    ],
                    [
                        'title' => 'CIA Triad & NIST CSF',
                        'description' => 'Membedah confidentiality, integrity, availability dan bagaimana NIST CSF menghubungkannya ke fungsi Identify-Protect-Detect-Respond-Recover.',
                        'youtube_url' => 'https://www.youtube.com/watch?v=Pv9jJ8QZLy8',
                    ],
                    [
                        'title' => 'Membangun Program Keamanan Dasar',
                        'description' => 'Menyusun peran tim, kebijakan, dan jalur eskalasi untuk organisasi skala kecil-menengah.',
                        'youtube_url' => 'https://www.youtube.com/watch?v=J3s7p3gdF30',
                    ],
                ],
            ],
            [
                'title' => 'Keamanan Jaringan & Monitoring',
                'subtitle' => 'Menjaga lalu lintas data tetap aman',
                'description' => 'Fokus pada segmentasi jaringan, hardening perangkat, dan analitik traffic menggunakan alat open-source.',
                'content' => <<<'HTML'
<p>Peserta mempelajari cara merancang arsitektur jaringan yang resilien serta mengoperasikan sensor monitoring.</p>
<ol>
    <li>Desain segmentasi dan kontrol akses berbasis zona.</li>
    <li>Hands-on packet capture menggunakan Wireshark.</li>
    <li>Konfigurasi IDS/IPS untuk mendeteksi serangan umum.</li>
</ol>
HTML,
                'youtube_url' => 'https://www.youtube.com/watch?v=qWKK_PNHnnA',
                'has_quiz' => true,
                'subtitles' => [
                    [
                        'title' => 'Membangun Lab Jaringan Aman',
                        'description' => 'Langkah demi langkah membuat topologi virtual dengan segmentasi VLAN dan firewall layer-4.',
                        'youtube_url' => 'https://www.youtube.com/watch?v=3QhU9jd03a0',
                    ],
                    [
                        'title' => 'Packet Capture & Analisis',
                        'description' => 'Dasar filter Wireshark, mengenali anomali DNS, dan signature serangan brute-force.',
                        'youtube_url' => 'https://www.youtube.com/watch?v=FAXRQWlnK6w',
                    ],
                    [
                        'title' => 'Intrusion Detection Workflow',
                        'description' => 'Menyusun playbook triase untuk alert IDS dan korelasi log sederhana dengan ELK stack.',
                        'youtube_url' => 'https://www.youtube.com/watch?v=1dR6CpWzgrE',
                    ],
                ],
            ],
            [
                'title' => 'Keamanan Aplikasi Web',
                'subtitle' => 'Menutup celah OWASP Top 10 secara praktis',
                'description' => 'Membahas kerentanan umum web beserta mitigasinya dengan studi kasus framework populer.',
                'content' => <<<'HTML'
<p>Modul ini dipenuhi demo eksploitasi dan patching sehingga developer memahami dampak langsung terhadap pengguna.</p>
<ul>
    <li>Walkthrough OWASP Top 10 terbaru.</li>
    <li>Penerapan secure coding guideline di Laravel dan React.</li>
    <li>Automasi scanning dengan OWASP ZAP dan GitHub Actions.</li>
</ul>
HTML,
                'youtube_url' => 'https://www.youtube.com/watch?v=Yv2jzDzYdSE',
                'has_quiz' => true,
                'subtitles' => [
                    [
                        'title' => 'Autentikasi & Session Hardening',
                        'description' => 'Menguatkan login, MFA, dan proteksi session fixation di aplikasi Laravel.',
                        'youtube_url' => 'https://www.youtube.com/watch?v=0HyjykX1nB0',
                    ],
                    [
                        'title' => 'Eksploitasi SQL Injection',
                        'description' => 'Demo SQLi klasik, blind SQLi, serta cara ORM mencegah query berbahaya.',
                        'youtube_url' => 'https://www.youtube.com/watch?v=ciNHn38EyRc',
                    ],
                    [
                        'title' => 'Mencegah XSS & CSRF',
                        'description' => 'Menunjukkan refleksi payload XSS dan pentingnya Content Security Policy serta proteksi CSRF token.',
                        'youtube_url' => 'https://www.youtube.com/watch?v=wxzu9rthp7k',
                    ],
                ],
            ],
            [
                'title' => 'Penetration Testing Terstruktur',
                'subtitle' => 'Dari reconnaissance hingga reporting',
                'description' => 'Memberikan panduan langkah demi langkah menjalankan pentest internal maupun eksternal yang etis.',
                'content' => <<<'HTML'
<p>Peserta mempraktekkan metodologi OSSTMM/PTES sambil mendokumentasikan temuan dengan skor risiko yang jelas.</p>
<ol>
    <li>Perencanaan engagement dan aturan main.</li>
    <li>Enumerasi target menggunakan Nmap, Amass, dan dirsearch.</li>
    <li>Eksploitasi, post-exploitation, serta pembuatan laporan manajemen.</li>
</ol>
HTML,
                'youtube_url' => 'https://www.youtube.com/watch?v=lz8xvQxgMUw',
                'has_quiz' => true,
                'subtitles' => [
                    [
                        'title' => 'Recon & Enumeration',
                        'description' => 'Menggali permukaan serangan: passive recon, subdomain enumeration, dan service fingerprinting.',
                        'youtube_url' => 'https://www.youtube.com/watch?v=_TtXqh9cA1g',
                    ],
                    [
                        'title' => 'Eksploitasi & Privilege Escalation',
                        'description' => 'Memanfaatkan kerentanan umum dan melakukan escalation pada host Linux & Windows.',
                        'youtube_url' => 'https://www.youtube.com/watch?v=Knb2PD9SWrg',
                    ],
                    [
                        'title' => 'Reporting & Remediation Advice',
                        'description' => 'Menyusun laporan temuan yang actionable untuk stakeholder non-teknis.',
                        'youtube_url' => 'https://www.youtube.com/watch?v=edrs8JZqFXQ',
                    ],
                ],
            ],
            [
                'title' => 'Incident Response & Forensik Digital',
                'subtitle' => 'Meminimalkan dampak insiden dengan prosedur yang jelas',
                'description' => 'Melatih tim untuk mendeteksi, menahan, dan memulihkan insiden siber sambil mengumpulkan bukti forensik.',
                'content' => <<<'HTML'
<p>Modul ini menggabungkan teori IR lifecycle dengan simulasi tabletop agar organisasi siap menghadapi serangan nyata.</p>
<ul>
    <li>Penyusunan playbook respon insiden.</li>
    <li>Analisis artefak host dan jaringan.</li>
    <li>Strategi komunikasi dan pelaporan pasca insiden.</li>
</ul>
HTML,
                'youtube_url' => 'https://www.youtube.com/watch?v=-f0WEitGmiw',
                'has_quiz' => true,
                'subtitles' => [
                    [
                        'title' => 'Deteksi & Triase Insiden',
                        'description' => 'Membuat matriks prioritas, channel komunikasi, dan SOP eskalasi awal.',
                        'youtube_url' => 'https://www.youtube.com/watch?v=mlOZk8T9C2k',
                    ],
                    [
                        'title' => 'Forensik Endpoint',
                        'description' => 'Mengumpulkan artefak Windows (SRUM, Prefetch) dan Linux (journalctl, bash history) secara forensically sound.',
                        'youtube_url' => 'https://www.youtube.com/watch?v=Y36M1LpCb5g',
                    ],
                    [
                        'title' => 'Lessons Learned & Recovery',
                        'description' => 'Menutup insiden dengan RCA, pembaruan kontrol, dan pengujian ulang.',
                        'youtube_url' => 'https://www.youtube.com/watch?v=2nXox-2wJ5Y',
                    ],
                ],
            ],
        ];

        foreach ($modules as $index => $data) {
            $module = Module::updateOrCreate(
                ['title' => $data['title']],
                [
                    'subtitle' => $data['subtitle'],
                    'description' => $data['description'],
                    'content' => $data['content'],
                    'youtube_url' => $data['youtube_url'],
                    'order' => $data['order'] ?? $index + 1,
                    'has_quiz' => $data['has_quiz'],
                    'is_published' => true,
                    'created_by' => $admin->id,
                ]
            );

            foreach ($data['subtitles'] as $subIndex => $subtitleData) {
                Subtitle::updateOrCreate(
                    [
                        'module_id' => $module->id,
                        'title' => $subtitleData['title'],
                    ],
                    [
                        'description' => $subtitleData['description'],
                        'order' => $subtitleData['order'] ?? $subIndex + 1,
                        'is_published' => $subtitleData['is_published'] ?? true,
                        'youtube_url' => $subtitleData['youtube_url'] ?? null,
                    ]
                );
            }
        }
    }
}
