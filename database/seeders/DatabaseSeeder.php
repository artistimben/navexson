<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Service;
use App\Models\Vessel;
use App\Models\News;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Admin User
        User::updateOrCreate(
            ['email' => 'admin@navexmar.com'],
            [
                'name' => 'NAVEXMAR Yönetici',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Seed Services (Every service has a UNIQUE image)
        $services = [
            [
                'title' => 'Gemi Acenteliği & Liman Hizmetleri',
                'slug' => 'gemi-acenteligi-liman-hizmetleri',
                'icon' => 'fa-ship',
                'image' => '/images/svc_port_agency.jpg',
                'summary' => "İskenderun, Mersin ve Antalya başta olmak üzere tüm Türkiye limanlarında 7/24 kesintisiz profesyonel acentelik, liman giriş-çıkış işlemleri ve idari izinler.",
                'description' => "NAVEXMAR olarak, İskenderun Limanı, İsdemir, Dörtyol Toros, Ceyhan Botaş, Mersin Uluslararası Limanı (MIP), Taşucu ve Antalya Limanı (Port Akdeniz) başta olmak üzere Akdeniz ve tüm Türkiye limanlarında armatörlerimize, kiracılarımıza ve gemi işletmecilerimize birinci sınıf acentelik hizmeti sunuyoruz. Gemi geliş öncesi bildirimlerden liman başkanlığı, sahil sağlık, gümrük ve emniyet onaylarına kadar tüm bürokratik süreçleri sıfır gecikme prensibiyle yönetiyoruz.",
                'features' => [
                    '7/24 Kesintisiz Liman & İdari Acentelik',
                    'Gümrük, Sahil Sağlık & Liman Başkanlığı Prosedürleri',
                    'Yükleme / Tahliye & Ambar Gözetimi',
                    'Yönlendirme, Pilotaj & Römorkör Koordinasyonu',
                    'Nakit Avans (CTP) & Finansal Operasyon Yönetimi'
                ],
                'sort_order' => 1,
            ],
            [
                'title' => 'Akdeniz Limanları & Terminal Acenteliği',
                'slug' => 'akdeniz-limanlari-terminal-acenteligi',
                'icon' => 'fa-anchor',
                'image' => '/images/svc_strait_transit.jpg',
                'summary' => 'İskenderun Körfezi, Ceyhan petrol terminalleri, Mersin ve Antalya limanlarında terminal giriş-çıkış, yanaşma ve yükleme operasyon yönetimi.',
                'description' => "Doğu Akdeniz ve Güney Türkiye limanları stratejik enerji ve ticaret koridorları üzerinde yer almaktadır. NAVEXMAR; İskenderun, Ceyhan Botaş/BTC, Mersin ve Antalya limanlarında ham petrol tankerleri, kimyasal tankerler, dökme yük ve konteyner gemilerine 7/24 kesintisiz acentelik desteği sunar. Terminal yetkilileri ve kılavuzluk teşkilatıyla entegre çalışan operasyon ekibimiz, geminizin yanaşma ve kalkış süreçlerini güvenle takip eder.",
                'features' => [
                    'Terminal & Liman Başkanlığı Bildirim Yönetimi',
                    'Kılavuz Kaptan (Pilotage) ve Römorkör Refakat Tedariği',
                    'Demirleme Sahası & İkmal Koordinasyonu',
                    'Canlı Gemi & Yükleme Takibi',
                    'Çevre Koruma & Tehlikeli Madde Terminal İzinleri'
                ],
                'sort_order' => 2,
            ],
            [
                'title' => 'Yakıt (Bunkering) & Kumanya İkmali',
                'slug' => 'yakit-ve-kumanya-ikmali',
                'icon' => 'fa-gas-pump',
                'image' => '/images/svc_bunkering.jpg',
                'summary' => 'ISO 8217 standartlarına uygun VLSFO, MGO, Madeni yağ ikmalleri ile taze kumanya ve teknik malzeme tedariği.',
                'description' => "Gemi yakıt ikmali (Bunkering) ve kumanya tedariğinde zamanlama ve ürün kalitesi esastır. NAVEXMAR, İskenderun, Ceyhan, Mersin ve Antalya demir sahalarında ile tüm ana limanlarda lisanslı barçlar vasıtasıyla kesintisiz yakıt ve madeni yağ teslimatları organize eder. Ayrıca taze gıda, içme suyu, güverte ve makine sarf malzemeleri geminize eksiksiz ulaştırılır.",
                'features' => [
                    'ISO 8217 Standartlarında VLSFO & MGO Yakıt İkmali',
                    'Madeni Yağ (Lube Oil) Varil & Tanker Teslimatı',
                    'Taze Kumanya, Donuk Gıda & İçme Suyu Tedariği',
                    'Gümrüklü Transit Mağaza & Teknik Malzeme Teslimi',
                    'Atık Alım (Marpol) & Sludge Bilge Transfer Hizmetleri'
                ],
                'sort_order' => 3,
            ],
            [
                'title' => 'Mürettebat Değişimi & Kara Lojistiği',
                'slug' => 'murettebat-degisimi-kara-lojistigi',
                'icon' => 'fa-users-gear',
                'image' => '/images/svc_crew_change.jpg',
                'summary' => 'Vize işlemleri, VIP havalimanı transferleri, otel konaklamaları, tıbbi destek ve 7/24 acente botu servisi.',
                'description' => "Gemi adamlarının değişimi ve kara lojistiği acenteliğin en hassas insan odaklı süreçlerinden biridir. NAVEXMAR; Çukurova Uluslararası, Adana, Hatay ve Antalya havalimanlarında karşılama, OKTB vize onayları, lüks araç transferleri, otel konaklamaları ve demir sahalarında acente botu transferleri ile personelinizin emniyetle değişimini gerçekleştirir.",
                'features' => [
                    'OKTB (OK to Board) & Gümrük Vize İzinleri',
                    '7/24 VIP Havalimanı Karşılama & Araç Transferi',
                    'Demir Sahasında Kesintisiz Hızlı Acente Botu Hizmeti',
                    'Tıbbi Danışmanlık, Hastane & Acil Tahliye Desteği',
                    'Otel Konaklama & Uçak Bileti Rezerve Yönetimi'
                ],
                'sort_order' => 4,
            ],
            [
                'title' => 'Yük & Konteyner Operasyonları',
                'slug' => 'yuk-ve-konteyner-operasyonlari',
                'icon' => 'fa-boxes-stacked',
                'image' => '/images/svc_cargo.jpg',
                'summary' => 'Proje kargo, dökme yük, konteyner tahliye/yükleme, kargo manifestosu, ordino ve gümrük desteği.',
                'description' => "Taşınan navlunun güvenliği, doğru elleçlenmesi ve zamanında teslimatı için charterer ve armatörlerimiz adına uçtan uca lojistik destek sağlıyoruz. Proje kargoları, gabari dışı ağır yükler ve dökme maden/tahıl yüklemelerinde uzman operasyon ekibimiz saha gözetimi gerçekleştirir.",
                'features' => [
                    'Proje Kargo & Ağır Yük Elleçleme Yönetimi',
                    'Konteyner Lojistiği & Depolama Çözümleri',
                    'Konşimento (Bill of Lading) & Ordino Düzenleme',
                    'Gümrük Müşavirliği & Karayolu Tır Transferleri',
                    'Gözetim (Surveying) & Yük Hasar Tespiti'
                ],
                'sort_order' => 5,
            ],
            [
                'title' => 'Teknik Sörvey & Bakım Onarım',
                'slug' => 'teknik-survey-bakim-onarim',
                'icon' => 'fa-wrench',
                'image' => '/images/svc_technical.jpg',
                'summary' => 'Sualtı dalgıç temizliği, klas sörveyör koordinasyonu, yedek parça gümrüklemesi ve teknik temsilcilik.',
                'description' => "Geminizin teknik aksaklıklarında veya periyodik bakım süreçlerinde sertifikalı uzman sualtı dalgıç ekipleri, makine mühendisleri ve klas sörveyörleri ile en hızlı çözümleri üretiyoruz. Akdeniz tersaneleri ve limanlarında havuzlama ve tamir aşamalarında armatör temsilciliği yürütüyoruz.",
                'features' => [
                    'Sualtı (UWILD) Kamera & Dalgıç Tekne Temizliği',
                    'Class Sörveyör Koordinasyonu (DNV, ABS, BV, NKK)',
                    'Yedek Parça Transit Gümrükleme & Uçaktan Gemiye Teslimat',
                    'Tersane Temsilciliği & Tamir Yönetimi',
                    'Yangın & Emniyet Ekipmanları Yıllık Test Sertifikasyon'
                ],
                'sort_order' => 6,
            ],
        ];

        foreach ($services as $serviceData) {
            Service::updateOrCreate(['slug' => $serviceData['slug']], $serviceData);
        }

        // 3. Seed Vessels (Every vessel has a UNIQUE image)
        $vessels = [
            [
                'name' => 'MV Mediterranean Star',
                'vessel_type' => 'Konteyner Gemisi',
                'flag' => 'Marshall Islands',
                'imo_number' => 9845123,
                'grt' => 45200,
                'dwt' => 58000,
                'image' => '/images/vsl_container.jpg',
                'last_port' => 'Mersin Uluslararası Limanı (MIP)',
                'operation_type' => 'Liman İkmali & Acentelik',
                'status' => 'Tamamlandı',
                'details' => '3,400 TEU konteyner yükleme ve 120 ton VLSFO yakıt ikmali tamamlandı.',
            ],
            [
                'name' => 'MT Anatolian Pride',
                'vessel_type' => 'Ham Petrol Tankeri',
                'flag' => 'Türkiye',
                'imo_number' => 9712044,
                'grt' => 82000,
                'dwt' => 115000,
                'image' => '/images/vsl_tanker.jpg',
                'last_port' => 'Ceyhan Botaş Petrol Terminali',
                'operation_type' => 'Terminal Yükleme & Bunkering',
                'status' => 'Devam Ediyor',
                'details' => 'Botaş terminali ham petrol yükleme gözetimi ve demir sahası yedek parça teslimi.',
            ],
            [
                'name' => 'MV Levant Trader',
                'vessel_type' => 'Dökme Yük Gemisi',
                'flag' => 'Panama',
                'imo_number' => 9631109,
                'grt' => 34500,
                'dwt' => 56000,
                'image' => '/images/vsl_bulk.jpg',
                'last_port' => 'İskenderun İsdemir Limanı',
                'operation_type' => 'Tahliye & Mürettebat Değişimi',
                'status' => 'Tamamlandı',
                'details' => '45.000 ton kömür tahliyesi ve 6 kişilik mürettebat değişimi başarıyla yapıldı.',
            ],
            [
                'name' => 'MV Orion Logistics',
                'vessel_type' => 'Ro-Ro Gemisi',
                'flag' => 'Liberia',
                'imo_number' => 9554321,
                'grt' => 28900,
                'dwt' => 18000,
                'image' => '/images/vsl_roro.jpg',
                'last_port' => 'Taşucu Seka Limanı',
                'operation_type' => 'Araç Yükleme & Gümrük',
                'status' => 'Tamamlandı',
                'details' => '350 adet ticari araç ve 60 treyler yüklemesi sıfır hasar kaydıyla tamamlandı.',
            ],
            [
                'name' => 'MY Horizon Luxury',
                'vessel_type' => 'Süperyat / Superyacht',
                'flag' => 'Cayman Islands',
                'imo_number' => 9918765,
                'grt' => 2400,
                'dwt' => 800,
                'image' => '/images/tugboat_1.jpg',
                'last_port' => 'Antalya Setur Marina & Port Akdeniz',
                'operation_type' => 'Özel Yat Acenteliği',
                'status' => 'Tamamlandı',
                'details' => 'VIP konuk kabulü, yakıt ikmali ve gümrük giriş-çıkış işlemleri sağlandı.',
            ],
        ];

        foreach ($vessels as $vesselData) {
            Vessel::updateOrCreate(['imo_number' => $vesselData['imo_number']], $vesselData);
        }

        // 4. Seed News (Every news has a UNIQUE image)
        $newsArticles = [
            [
                'title' => 'İskenderun Körfezi Liman Operasyonları ve Yanaşma Düzeni Güncellendi',
                'slug' => 'iskenderun-korfezi-liman-operasyonlari-guncellendi',
                'category' => 'Liman Sirküleri',
                'image' => '/images/news_rules.jpg',
                'summary' => 'İskenderun Liman Başkanlığı tarafından yayımlanan yeni sirküler ile demirleme sahaları ve kılavuzluk prosedürlerinde düzenlemeler yapıldı.',
                'content' => "İskenderun Liman Başkanlığı tarafından yayımlanan son talimatname uyarınca İskenderun Körfezi demir sahaları ve yanaşma protokolleri güncellenmiştir. NAVEXMAR olarak tüm armatör ve kiracılarımıza geliş öncesi bildirim süreleri ve emniyet tedbirlerine dair bilgilendirme bültenimizi ilettik.",
                'author' => 'NAVEXMAR Operasyon Departmanı',
                'is_published' => true,
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Mersin Uluslararası Limanı (MIP) Genişleme Projesi ve Liman Duyuruları',
                'slug' => 'mersin-uluslararasi-limani-genisleme-projesi',
                'category' => 'Liman Duyuruları',
                'image' => '/images/news_limits.jpg',
                'summary' => 'MIP rıhtımlarında yeni operasyonel kapasite ve yanaşma limitleri açıklandı.',
                'content' => "Mersin Uluslararası Limanı (MIP) rıhtım genişletme çalışmaları kapsamında yeni yanaşma limitleri yürürlüğe girmiştir. Yük gemilerinizin yanaşma ve operasyon planlamalarında güncel liman cetvellerine dikkat edilmesi rica olunur.",
                'author' => 'NAVEXMAR Operasyon Masası',
                'is_published' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'NAVEXMAR Yeşil Denizcilik ve Karbon Emisyon Danışmanlığı Hizmete Girdi',
                'slug' => 'navexmar-yesil-denizcilik-ve-karbon-emisyon-danismanligi',
                'category' => 'Sektörel Gelişmeler',
                'image' => '/images/news_green.jpg',
                'summary' => 'IMO CII ve EU ETS karbon düzenlemeleri kapsamında gemilerinizin liman emisyon hesaplamaları ve sürdürülebilirlik raporlaması.',
                'content' => "Uluslararası Denizcilik Örgütü (IMO) ve Avrupa Birliği'nin sıfır karbon hedefleri doğrultusunda denizcilik sektörü köklü bir değişimden geçmektedir. NAVEXMAR Yeşil Denizcilik Masası, Akdeniz ve Türkiye limanları uğraklarında gemilerinizin yakıt tüketimi, emisyon salınımı ve biyolojik arıtma sistemlerinin uluslararası standartlara uyumunu kontrol ederek yeşil sertifikasyon sürecine katkı sağlamaktadır.",
                'author' => 'NAVEXMAR Teknik Direktörlük',
                'is_published' => true,
                'published_at' => now()->subDays(10),
            ],
        ];

        foreach ($newsArticles as $newsData) {
            News::updateOrCreate(['slug' => $newsData['slug']], $newsData);
        }

        // 5. Seed Site Settings
        $settings = [
            'site_name' => 'NAVEXMAR Maritime Agency',
            'phone' => '+90 530 379 31 33',
            'mobile' => '+90 544 401 21 86',
            'email' => 'agency@navexmar.com olcay@navexmar.com burak@navexmar.com',
            'ops_email' => 'agency@navexmar.com olcay@navexmar.com burak@navexmar.com',
            'address' => 'Numune Evler Mah/Sahil 1 Nolu Sok/no2/Dörtyol/Hatay',
            'about_short' => 'NAVEXMAR, İskenderun\'dan Antalya\'ya ve tüm Türkiye limanlarında 7/24 uluslararası gemi acenteliği, ikmal, teknik destek ve lojistik hizmetleri vermektedir.',
            'page_about_active' => '1',
            'page_services_active' => '1',
            'page_news_active' => '0',
            'page_contact_active' => '1',
        ];

        foreach ($settings as $key => $val) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $val]);
        }
    }
}
