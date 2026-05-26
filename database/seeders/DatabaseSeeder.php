<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Slider;
use App\Models\News;
use App\Models\Announcement;
use App\Models\Agenda;
use App\Models\ProfilePage;
use App\Models\Research;
use App\Models\CommunityService;
use App\Models\Publication;
use App\Models\Document;
use App\Models\Lecturer;
use App\Models\Gallery;
use App\Models\Contact;
use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed Admin User
        User::updateOrCreate(
            ['email' => 'admin@lppm.test'],
            [
                'name' => 'Administrator LPPM',
                'password' => Hash::make('password'),
            ]
        );

        // 2. Seed Sliders
        $sliders = [
            [
                'title' => 'Pusat Penelitian & Pengabdian Masyarakat',
                'subtitle' => 'Membangun ekosistem tridharma perguruan tinggi yang adaptif, unggul, dan berdaya dampak nyata bagi masyarakat.',
                'image' => 'assets/images/1.jpeg',
                'button_text' => 'Pelajari Selengkapnya',
                'button_url' => '/profil/tentang-kami',
                'status' => 'active',
                'sort_order' => 1,
            ],
            [
                'title' => 'Inovasi Riset & Publikasi Ilmiah',
                'subtitle' => 'Mendorong hilirisasi karya keilmuan dosen dan sivitas akademika ke kancah nasional maupun internasional.',
                'image' => 'assets/images/pkm2025.jpeg',
                'button_text' => 'Lihat Publikasi',
                'button_url' => '/publikasi/jurnal',
                'status' => 'active',
                'sort_order' => 2,
            ],
        ];
        foreach ($sliders as $s) {
            Slider::create($s);
        }

        // 3. Seed Profile Pages
        $profilePages = [
            [
                'page_key' => 'tentang-kami',
                'title' => 'Tentang LPPM IBI KKG',
                'content' => 'Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM) merupakan unit strategis yang mengelola, mengembangkan, dan mendukung penuh pelaksanaan riset ilmiah, pengabdian masyarakat, publikasi ilmiah, serta penguatan jejaring kerja sama tridharma.',
                'image' => 'assets/images/2.jpeg',
            ],
            [
                'page_key' => 'visi-misi',
                'title' => 'Visi & Misi LPPM',
                'content' => '<strong>Visi:</strong> Menjadi lembaga pengelola penelitian dan pengabdian masyarakat yang unggul, profesional, dan berdaya saing global untuk mendukung pembangunan berkelanjutan.<br><br><strong>Misi:</strong><br>1. Menyelenggarakan tata kelola penelitian dan abdimas yang bermutu tinggi.<br>2. Meningkatkan kapasitas dan luaran publikasi dosen bereputasi.<br>3. Mendorong hilirisasi hasil riset untuk kemaslahatan masyarakat luas.',
                'image' => 'assets/images/1.jpeg',
            ],
            [
                'page_key' => 'struktur-organisasi',
                'title' => 'Struktur Organisasi LPPM',
                'content' => 'Berikut adalah struktur organisasi pengelola LPPM IBI KKG:<br><ul><li><strong>Ketua LPPM:</strong> Dr. Said Kelana Asnawi, S.E., M.M.</li><li><strong>Sekretaris:</strong> Amelia Sandra, S.E., M.Si.</li><li><strong>Bagian Penelitian & Pengabdian:</strong> Akhmad Budi, M.Kom.</li></ul>',
                'image' => 'assets/images/dosen/akre_akuntansi.jpg',
            ],
            [
                'page_key' => 'prestasi',
                'title' => 'Prestasi & Rekam Jejak',
                'content' => 'LPPM IBI KKG secara konsisten meraih penghargaan nasional atas produktivitas penelitian dan pengabdian masyarakat. Seluruh program studi kami aktif dalam mempublikasikan jurnal bereputasi tinggi baik nasional terakreditasi (SINTA) maupun internasional (Scopus).',
                'image' => 'assets/images/workshop-zul.png',
            ],
        ];
        foreach ($profilePages as $p) {
            ProfilePage::create($p);
        }

        // 4. Seed Lecturers dynamically from public/dosen/dosen-data.js
        $jsPath = public_path('dosen/dosen-data.js');
        if (file_exists($jsPath)) {
            $js = file_get_contents($jsPath);
            $js = trim($js);
            $js = preg_replace('/^const\s+DOSEN_DATA\s*=\s*/i', '', $js);
            $js = rtrim($js, ';');
            $js = preg_replace('/([{\s,])(\w+):/', '$1"$2":', $js);
            $js = preg_replace("/:\s*'([^']*)'/s", ': "$1"', $js);
            $js = preg_replace("/,\s*'([^']*)'/s", ', "$1"', $js);
            $js = preg_replace("/'\s*([,}])/s", '"$1', $js);
            $dosenArray = json_decode($js, true);
            
            if (is_array($dosenArray)) {
                $idx = 1;
                foreach ($dosenArray as $item) {
                    Lecturer::create([
                        'name' => $item['nama'],
                        'nidn' => '03' . str_pad($idx++, 8, '0', STR_PAD_LEFT),
                        'department' => $item['prodi'],
                        'expertise' => $item['keahlian'],
                        'google_scholar' => $item['gsUser'],
                        'sinta' => '600' . str_pad($idx, 4, '0', STR_PAD_LEFT),
                        'scopus' => '57' . str_pad($idx, 9, '0', STR_PAD_LEFT),
                        'status' => 'active',
                    ]);
                }
            }
        }

        // 5. Seed News (Berita)
        $news = [
            [
                'title' => 'Workshop Penyusunan Proposal Penelitian Hibah bersama Dr. Zulfikar Ikhsan Pane',
                'slug' => Str::slug('Workshop Penyusunan Proposal Penelitian Hibah bersama Dr Zulfikar Ikhsan Pane'),
                'category' => 'Workshop',
                'thumbnail' => 'assets/images/workshop-zul.png',
                'content' => 'Workshop intensif penyusunan proposal penelitian hibah eksternal nasional dipandu oleh narasumber ternama.',
                'status' => 'published',
                'published_at' => now(),
            ],
            [
                'title' => 'Coaching Clinic Internal: Persiapan Kompetisi Hibah Kemendiktisaintek BIMA 2025',
                'slug' => Str::slug('Coaching Clinic Internal Persiapan Kompetisi Hibah Kemendiktisaintek BIMA 2025'),
                'category' => 'Coaching Clinic',
                'thumbnail' => 'assets/images/1.jpeg',
                'content' => 'Coaching clinic intensif untuk persiapan hibah BIMA 2025, diikuti oleh seluruh dosen tetap di lingkungan IBI KKG.',
                'status' => 'published',
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'Partisipasi IBI KKG dalam Kegiatan Pengabdian Masyarakat Internasional di Surabaya',
                'slug' => Str::slug('Partisipasi IBI KKG dalam Kegiatan Pengabdian Masyarakat Internasional di Surabaya'),
                'category' => 'Pengabdian',
                'thumbnail' => 'assets/images/2.jpeg',
                'content' => 'Delegasi dosen IBI KKG berkontribusi aktif dalam penyuluhan masyarakat tingkat internasional.',
                'status' => 'published',
                'published_at' => now()->subDays(20),
            ],
        ];
        foreach ($news as $n) {
            News::create($n);
        }

        // 6. Seed Announcements (Pengumuman)
        $announcements = [
            [
                'title' => 'Panduan Pendaftaran Proposal Hibah Penelitian Internal Semester Genap 2025/2026',
                'slug' => Str::slug('Panduan Pendaftaran Proposal Hibah Penelitian Internal Semester Genap 2025 2026'),
                'content' => 'Diumumkan kepada seluruh dosen tetap IBI KKG mengenai pembukaan skema hibah penelitian internal semester genap.',
                'status' => 'published',
                'published_at' => now(),
            ],
            [
                'title' => 'Pengumuman Penerimaan Dana Hibah Pengabdian Masyarakat Kemendikbudristek Tahun Anggaran 2026',
                'slug' => Str::slug('Pengumuman Penerimaan Dana Hibah Pengabdian Masyarakat Kemendikbudristek Tahun Anggaran 2026'),
                'content' => 'Selamat kepada para dosen penerima hibah abdimas nasional tahun anggaran 2026.',
                'status' => 'published',
                'published_at' => now()->subDays(5),
            ],
        ];
        foreach ($announcements as $a) {
            Announcement::create($a);
        }

        // 7. Seed Agendas
        $agendas = [
            [
                'title' => 'Sosialisasi Klasterisasi Perguruan Tinggi & Skema Baru BIMA 2026',
                'description' => 'Sosialisasi strategi dan skema baru untuk klasterisasi perguruan tinggi dalam bidang penelitian.',
                'location' => 'Aula Gedung A, Lantai 3',
                'event_date' => now()->addDays(5)->format('Y-m-d'),
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'status' => 'published',
            ],
            [
                'title' => 'Monev Internal Luaran Penelitian & Abdimas Semester Ganjil',
                'description' => 'Monitoring dan evaluasi berkala untuk luaran publikasi hasil hibah internal.',
                'location' => 'Ruang Rapat LPPM',
                'event_date' => now()->addDays(12)->format('Y-m-d'),
                'start_time' => '13:00:00',
                'end_time' => '16:00:00',
                'status' => 'published',
            ],
        ];
        foreach ($agendas as $ag) {
            Agenda::create($ag);
        }

        // 8. Seed Publications
        $publications = [
            [
                'title' => 'Analysis of Corporate Governance Influence on Sustainability Reporting in Indonesian Banking',
                'slug' => Str::slug('Analysis of Corporate Governance Influence on Sustainability Reporting in Indonesian Banking'),
                'type' => 'Jurnal',
                'author' => 'Dr. Carmel Meiden, S.E., M.Si.',
                'journal_name' => 'Journal of Finance and Accounting',
                'year' => 2025,
                'link' => 'https://example.com/journal-carmel',
                'status' => 'published',
            ],
            [
                'title' => 'Implementation of Sentiment Analysis for E-Commerce Feedbacks Using Machine Learning',
                'slug' => Str::slug('Implementation of Sentiment Analysis for E-Commerce Feedbacks Using Machine Learning'),
                'type' => 'Artikel Ilmiah',
                'author' => 'Akhmad Budi, S.Kom., M.Kom.',
                'journal_name' => 'International Journal of Information Systems',
                'year' => 2025,
                'link' => 'https://example.com/journal-budi',
                'status' => 'published',
            ],
            [
                'title' => 'Sinergi Perguruan Tinggi dan UMKM Berbasis Pendampingan Digital',
                'slug' => Str::slug('Sinergi Perguruan Tinggi dan UMKM Berbasis Pendampingan Digital'),
                'type' => 'Prosiding',
                'author' => 'Muhammad Fuad, S.E., M.P.',
                'journal_name' => 'Seminar Nasional Tridharma Nusantara 2025',
                'year' => 2025,
                'link' => 'https://example.com/prosiding-fuad',
                'status' => 'published',
            ],
        ];
        foreach ($publications as $pub) {
            Publication::create($pub);
        }

        // 9. Seed Documents
        $documents = [
            [
                'title' => 'Panduan Penulisan Proposal Penelitian Dosen Pemula (PDP) 2026',
                'category' => 'Panduan',
                'file' => 'panduan_pdp_2026.pdf',
                'description' => 'Dokumen resmi petunjuk teknis penulisan proposal hibah penelitian pemula.',
                'status' => 'published',
            ],
            [
                'title' => 'Template Proposal Hibah Internal LPPM IBI KKG 2026',
                'category' => 'Template',
                'file' => 'template_proposal_internal.docx',
                'description' => 'Format file dokumen Microsoft Word untuk pengajuan proposal internal.',
                'status' => 'published',
            ],
            [
                'title' => 'Formulir Laporan Akhir Pengabdian Masyarakat',
                'category' => 'Unduhan',
                'file' => 'form_laporan_akhir_abdimas.pdf',
                'description' => 'Unduhan formulir resmi pelaporan akhir kegiatan pengabdian.',
                'status' => 'published',
            ],
        ];
        foreach ($documents as $doc) {
            Document::create($doc);
        }

        // 10. Seed Researches
        $researches = [
            [
                'title' => 'Strategi Pengembangan Bisnis Digital bagi Pelaku UMKM di Wilayah Jakarta Utara',
                'slug' => Str::slug('Strategi Pengembangan Bisnis Digital bagi Pelaku UMKM di Wilayah Jakarta Utara'),
                'scheme' => 'Hibah Internal',
                'lecturer_name' => 'Dr. Abdullah Rakhman, S.T.P., M.M.',
                'year' => 2025,
                'abstract' => 'Penelitian ini bertujuan menganalisis efektivitas adopsi platform digital marketing bagi para pelaku usaha mikro.',
                'document' => 'riset_abdullah_2025.pdf',
                'status' => 'published',
            ]
        ];
        foreach ($researches as $res) {
            Research::create($res);
        }

        // 11. Seed Community Services
        $communityServices = [
            [
                'title' => 'Pendampingan Manajemen Keuangan & Pembukuan Sederhana bagi Ibu Rumah Tangga Kelurahan Kelapa Gading',
                'slug' => Str::slug('Pendampingan Manajemen Keuangan Pembukuan Sederhana bagi Ibu Rumah Tangga Kelurahan Kelapa Gading'),
                'scheme' => 'Pengabdian Masyarakat Mandiri',
                'lecturer_name' => 'Amelia Sandra, S.E., M.Si.',
                'year' => 2025,
                'abstract' => 'Program abdimas ini melatih pencatatan arus kas rumah tangga yang efektif dan pembukuan sederhana.',
                'document' => 'abdimas_amelia_2025.pdf',
                'status' => 'published',
            ]
        ];
        foreach ($communityServices as $cs) {
            CommunityService::create($cs);
        }

        // 12. Seed Galleries
        $galleries = [
            [
                'title' => 'Pelatihan Penulisan Jurnal Internasional Bereputasi',
                'image' => 'assets/images/1.jpeg',
                'description' => 'Dokumentasi acara pelatihan intensif penulisan jurnal Scopus bagi dosen tetap.',
                'status' => 'active',
            ],
            [
                'title' => 'Pemberdayaan Desa Wisata Mandiri oleh LPPM',
                'image' => 'assets/images/2.jpeg',
                'description' => 'Kunjungan lapangan dan pendampingan desa wisata oleh tim pengabdian masyarakat.',
                'status' => 'active',
            ],
        ];
        foreach ($galleries as $g) {
            Gallery::create($g);
        }

        // 13. Seed Contacts
        Contact::create([
            'address' => 'Jl. Boulevard Bukit Gading Raya Blok A, Kelapa Gading, Jakarta Utara, DKI Jakarta 14240',
            'email' => 'lppm@kwikkiangie.ac.id',
            'phone' => '(021) 4508999',
            'whatsapp' => '082122355330',
            'service_hours' => 'Senin - Jumat: 08:30 - 16:30 WIB',
            'google_maps_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.8627409252327!2d106.8903523!3d-6.1491295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f547c10b777f%3A0xc036987c69992b15!2sKwik%20Kian%20Gie%20School%20of%20Business!5e0!3m2!1sid!2sid!4v1716300000000!5m2!1sid!2sid',
        ]);

        // 14. Seed Videos
        $videos = [
            [
                'title' => 'Profil Lembaga Penelitian dan Pengabdian Masyarakat (LPPM) IBI KKG',
                'url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'description' => 'Video pengenalan profil lengkap lembaga LPPM IBI Kwik Kian Gie.',
                'status' => 'active',
            ],
            [
                'title' => 'Kegiatan KKN & Pengabdian Masyarakat Terintegrasi',
                'url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'description' => 'Dokumentasi kegiatan lapangan dan pengabdian masyarakat oleh mahasiswa dan dosen.',
                'status' => 'active',
            ],
            [
                'title' => 'Seminar Nasional Hilirisasi Hasil Riset Multi-Disiplin',
                'url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'description' => 'Klip rangkuman pelaksanaan seminar nasional LPPM IBI Kwik Kian Gie.',
                'status' => 'active',
            ],
        ];
        foreach ($videos as $v) {
            Video::create($v);
        }
    }
}
