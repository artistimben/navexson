-- NAVEXMAR Database Export for MySQL / MariaDB
-- phpMyAdmin SQL Dump

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Table structure for table `users`
--
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL UNIQUE,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `created_at`, `updated_at`) VALUES
(1, 'NAVEXMAR Yönetici', 'admin@navexmar.com', NOW(), '$2y$12$Nq4ZgXWn5Z8qO8Fz9eH7re8vP9eD9O3qF1o3V7p0u9A7F1d2G3H4K', NOW(), NOW())
ON DUPLICATE KEY UPDATE `name`=VALUES(`name`);

--
-- Table structure for table `cache`
--
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `cache_locks`
--
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `jobs`
--
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `job_batches`
--
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `failed_jobs`
--
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL UNIQUE,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `services`
--
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL UNIQUE,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `features` json DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--
INSERT INTO `services` (`id`, `title`, `slug`, `icon`, `image`, `summary`, `description`, `features`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Gemi Acenteliği & Liman Hizmetleri', 'gemi-acenteligi-liman-hizmetleri', 'fa-ship', '/images/svc_port_agency.jpg', 'İskenderun, Mersin ve Antalya başta olmak üzere tüm Türkiye limanlarında 7/24 kesintisiz profesyonel acentelik, liman giriş-çıkış işlemleri ve idari izinler.', 'NAVEXMAR olarak, İskenderun Limanı, İsdemir, Dörtyol Toros, Ceyhan Botaş, Mersin Uluslararası Limanı (MIP), Taşucu ve Antalya Limanı (Port Akdeniz) başta olmak üzere Akdeniz ve tüm Türkiye limanlarında armatörlerimize, kiracılarımıza ve gemi işletmecilerimize birinci sınıf acentelik hizmeti sunuyoruz. Gemi geliş öncesi bildirimlerden liman başkanlığı, sahil sağlık, gümrük ve emniyet onaylarına kadar tüm bürokratik süreçleri sıfır gecikme prensibiyle yönetiyoruz.', '["7/24 Kesintisiz Liman & İdari Acentelik", "Gümrük, Sahil Sağlık & Liman Başkanlığı Prosedürleri", "Draft Sörvey & Yükleme / Tahliye Gözetimi", "Yönlendirme, Pilotaj & Römorkör Koordinasyonu", "Nakit Avans (CTP) & Finansal Operasyon Yönetimi"]', 1, 1, NOW(), NOW()),
(2, 'Akdeniz Limanları & Terminal Acenteliği', 'akdeniz-limanlari-terminal-acenteligi', 'fa-anchor', '/images/svc_strait_transit.jpg', 'İskenderun Körfezi, Ceyhan petrol terminalleri, Mersin ve Antalya limanlarında terminal giriş-çıkış, yanaşma ve yükleme operasyon yönetimi.', 'Doğu Akdeniz ve Güney Türkiye limanları stratejik enerji ve ticaret koridorları üzerinde yer almaktadır. NAVEXMAR; İskenderun, Ceyhan Botaş/BTC, Mersin ve Antalya limanlarında ham petrol tankerleri, kimyasal tankerler, dökme yük ve konteyner gemilerine 7/24 kesintisiz acentelik desteği sunar. Terminal yetkilileri ve kılavuzluk teşkilatıyla entegre çalışan operasyon ekibimiz, geminizin yanaşma ve kalkış süreçlerini güvenle takip eder.', '["Terminal & Liman Başkanlığı Bildirim Yönetimi", "Kılavuz Kaptan (Pilotage) ve Römorkör Refakat Tedariği", "Demirleme Sahası & İkmal Koordinasyonu", "Canlı Gemi & Yükleme Takibi", "Çevre Koruma & Tehlikeli Madde Terminal İzinleri"]', 1, 2, NOW(), NOW()),
(3, 'Yakıt (Bunkering) & Kumanya İkmali', 'yakit-ve-kumanya-ikmali', 'fa-gas-pump', '/images/svc_bunkering.jpg', 'ISO 8217 standartlarına uygun VLSFO, MGO, Madeni yağ ikmalleri ile taze kumanya ve teknik malzeme tedariği.', 'Gemi yakıt ikmali (Bunkering) ve kumanya tedariğinde zamanlama ve ürün kalitesi esastır. NAVEXMAR, İskenderun, Ceyhan, Mersin ve Antalya demir sahalarında ile tüm ana limanlarda lisanslı barçlar vasıtasıyla kesintisiz yakıt ve madeni yağ teslimatları organize eder. Ayrıca taze gıda, içme suyu, güverte ve makine sarf malzemeleri geminize eksiksiz ulaştırılır.', '["ISO 8217 Standartlarında VLSFO & MGO Yakıt İkmali", "Madeni Yağ (Lube Oil) Varil & Tanker Teslimatı", "Taze Kumanya, Donuk Gıda & İçme Suyu Tedariği", "Gümrüklü Transit Mağaza & Teknik Malzeme Teslimi", "Atık Alım (Marpol) & Sludge Bilge Transfer Hizmetleri"]', 1, 3, NOW(), NOW()),
(4, 'Mürettebat Değişimi & Kara Lojistiği', 'murettebat-degisimi-kara-lojistigi', 'fa-users-gear', '/images/svc_crew_change.jpg', 'Vize işlemleri, VIP havalimanı transferleri, otel konaklamaları, tıbbi destek ve 7/24 acente botu servisi.', 'Gemi adamlarının değişimi ve kara lojistiği acenteliğin en hassas insan odaklı süreçlerinden biridir. NAVEXMAR; Çukurova Uluslararası, Adana, Hatay ve Antalya havalimanlarında karşılama, OKTB vize onayları, lüks araç transferleri, otel konaklamaları ve demir sahalarında acente botu transferleri ile personelinizin emniyetle değişimini gerçekleştirir.', '["OKTB (OK to Board) & Gümrük Vize İzinleri", "7/24 VIP Havalimanı Karşılama & Araç Transferi", "Demir Sahasında Kesintisiz Hızlı Acente Botu Hizmeti", "Tıbbi Danışmanlık, Hastane & Acil Tahliye Desteği", "Otel Konaklama & Uçak Bileti Rezerve Yönetimi"]', 1, 4, NOW(), NOW()),
(5, 'Yük & Konteyner Operasyonları', 'yuk-ve-konteyner-operasyonlari', 'fa-boxes-stacked', '/images/svc_cargo.jpg', 'Proje kargo, dökme yük, konteyner tahliye/yükleme, kargo manifestosu, ordino ve gümrük desteği.', 'Taşınan navlunun güvenliği, doğru elleçlenmesi ve zamanında teslimatı için charterer ve armatörlerimiz adına uçtan uca lojistik destek sağlıyoruz. Proje kargoları, gabari dışı ağır yükler ve dökme maden/tahıl yüklemelerinde uzman operasyon ekibimiz saha gözetimi gerçekleştirir.', '["Proje Kargo & Ağır Yük Elleçleme Yönetimi", "Konteyner Lojistiği & Depolama Çözümleri", "Konşimento (Bill of Lading) & Ordino Düzenleme", "Gümrük Müşavirliği & Karayolu Tır Transferleri", "Gözetim (Surveying) & Yük Hasar Tespiti"]', 1, 5, NOW(), NOW()),
(6, 'Teknik Sörvey & Bakım Onarım', 'teknik-survey-bakim-onarim', 'fa-wrench', '/images/svc_technical.jpg', 'Sualtı dalgıç temizliği, klas sörveyör koordinasyonu, yedek parça gümrüklemesi ve teknik temsilcilik.', 'Geminizin teknik aksaklıklarında veya periyodik bakım süreçlerinde sertifikalı uzman sualtı dalgıç ekipleri, makine mühendisleri ve klas sörveyörleri ile en hızlı çözümleri üretiyoruz. Akdeniz tersaneleri ve limanlarında havuzlama ve tamir aşamalarında armatör temsilciliği yürütüyoruz.', '["Sualtı (UWILD) Kamera & Dalgıç Tekne Temizliği", "Class Sörveyör Koordinasyonu (DNV, ABS, BV, NKK)", "Yedek Parça Transit Gümrükleme & Uçaktan Gemiye Teslimat", "Tersane Temsilciliği & Tamir Yönetimi", "Yangın & Emniyet Ekipmanları Yıllık Test Sertifikasyon"]', 1, 6, NOW(), NOW())
ON DUPLICATE KEY UPDATE `title`=VALUES(`title`);

--
-- Table structure for table `vessels`
--
CREATE TABLE IF NOT EXISTS `vessels` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vessel_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imo_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL UNIQUE,
  `grt` int(11) DEFAULT NULL,
  `dwt` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_port` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operation_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vessels`
--
INSERT INTO `vessels` (`id`, `name`, `vessel_type`, `flag`, `imo_number`, `grt`, `dwt`, `image`, `last_port`, `operation_type`, `status`, `details`, `created_at`, `updated_at`) VALUES
(1, 'MV Mediterranean Star', 'Konteyner Gemisi', 'Marshall Islands', '9845123', 45200, 58000, '/images/vsl_container.jpg', 'Mersin Uluslararası Limanı (MIP)', 'Liman İkmali & Acentelik', 'Tamamlandı', '3,400 TEU konteyner yükleme ve 120 ton VLSFO yakıt ikmali tamamlandı.', NOW(), NOW()),
(2, 'MT Anatolian Pride', 'Ham Petrol Tankeri', 'Türkiye', '9712044', 82000, 115000, '/images/vsl_tanker.jpg', 'Ceyhan Botaş Petrol Terminali', 'Terminal Yükleme & Bunkering', 'Devam Ediyor', 'Botaş terminali ham petrol yükleme gözetimi ve demir sahası yedek parça teslimi.', NOW(), NOW()),
(3, 'MV Levant Trader', 'Dökme Yük Gemisi', 'Panama', '9631109', 34500, 56000, '/images/vsl_bulk.jpg', 'İskenderun İsdemir Limanı', 'Tahliye & Mürettebat Değişimi', 'Tamamlandı', '45.000 ton kömür tahliyesi ve 6 kişilik mürettebat değişimi başarıyla yapıldı.', NOW(), NOW()),
(4, 'MV Orion Logistics', 'Ro-Ro Gemisi', 'Liberia', '9554321', 28900, 18000, '/images/vsl_roro.jpg', 'Taşucu Seka Limanı', 'Araç Yükleme & Gümrük', 'Tamamlandı', '350 adet ticari araç ve 60 treyler yüklemesi sıfır hasar kaydıyla tamamlandı.', NOW(), NOW()),
(5, 'MY Horizon Luxury', 'Süperyat / Superyacht', 'Cayman Islands', '9918765', 2400, 800, '/images/tugboat_1.jpg', 'Antalya Setur Marina & Port Akdeniz', 'Özel Yat Acenteliği', 'Tamamlandı', 'VIP konuk kabulü, yakıt ikmali ve gümrük giriş-çıkış işlemleri sağlandı.', NOW(), NOW())
ON DUPLICATE KEY UPDATE `name`=VALUES(`name`);

--
-- Table structure for table `news`
--
CREATE TABLE IF NOT EXISTS `news` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL UNIQUE,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--
INSERT INTO `news` (`id`, `title`, `slug`, `category`, `image`, `summary`, `content`, `author`, `is_published`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'İskenderun Körfezi Liman Operasyonları ve Yanaşma Düzeni Güncellendi', 'iskenderun-korfezi-liman-operasyonlari-guncellendi', 'Liman Sirküleri', '/images/news_rules.jpg', 'İskenderun Liman Başkanlığı tarafından yayımlanan yeni sirküler ile demirleme sahaları ve kılavuzluk prosedürlerinde düzenlemeler yapıldı.', 'İskenderun Liman Başkanlığı tarafından yayımlanan son talimatname uyarınca İskenderun Körfezi demir sahaları ve yanaşma protokolleri güncellenmiştir. NAVEXMAR olarak tüm armatör ve kiracılarımıza geliş öncesi bildirim süreleri ve emniyet tedbirlerine dair bilgilendirme bültenimizi ilettik.', 'NAVEXMAR Operasyon Departmanı', 1, NOW(), NOW(), NOW()),
(2, 'Mersin Uluslararası Limanı (MIP) Genişleme Projesi ve Draft Güncellemeleri', 'mersin-uluslararasi-limani-draft-guncellemeleri', 'Liman Duyuruları', '/images/news_limits.jpg', 'MIP konteyner ve dökme yük rıhtımlarında yeni derinlik ve yanaşma limitleri açıklandı.', 'Mersin Uluslararası Limanı (MIP) rıhtım genişletme çalışmaları kapsamında yeni yanaşma draft limitleri yürürlüğe girmiştir. Konteyner ve dökme yük gemilerinizin fribort ve draft hesaplamalarında güncel cetvellere dikkat edilmesi rica olunur.', 'NAVEXMAR Operasyon Masası', 1, NOW(), NOW(), NOW()),
(3, 'NAVEXMAR Yeşil Denizcilik ve Karbon Emisyon Danışmanlığı Hizmete Girdi', 'navexmar-yesil-denizcilik-ve-karbon-emisyon-danismanligi', 'Sektörel Gelişmeler', '/images/news_green.jpg', 'IMO CII ve EU ETS karbon düzenlemeleri kapsamında gemilerinizin liman emisyon hesaplamaları ve sürdürülebilirlik raporlaması.', 'Uluslararası Denizcilik Örgütü (IMO) ve Avrupa Birliği\'nin sıfır karbon hedefleri doğrultusunda denizcilik sektörü köklü bir değişimden geçmektedir. NAVEXMAR Yeşil Denizcilik Masası, Akdeniz ve Türkiye limanları uğraklarında gemilerinizin yakıt tüketimi, emisyon salınımı ve biyolojik arıtma sistemlerinin uluslararası standartlara uyumunu kontrol ederek yeşil sertifikasyon sürecine katkı sağlamaktadır.', 'NAVEXMAR Teknik Direktörlük', 1, NOW(), NOW(), NOW())
ON DUPLICATE KEY UPDATE `title`=VALUES(`title`);

--
-- Table structure for table `quote_requests`
--
CREATE TABLE IF NOT EXISTS `quote_requests` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vessel_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port_or_strait` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operation_date` date DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `contact_messages`
--
CREATE TABLE IF NOT EXISTS `contact_messages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `site_settings`
--
CREATE TABLE IF NOT EXISTS `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL UNIQUE,
  `value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--
INSERT INTO `site_settings` (`key`, `value`, `created_at`, `updated_at`) VALUES
('site_name', 'NAVEXMAR Maritime Agency', NOW(), NOW()),
('phone', '+90 530 379 31 33', NOW(), NOW()),
('mobile', '+90 544 401 21 86', NOW(), NOW()),
('email', 'agency@navexmar.com olcay@navexmar.com burak@navexmar.com', NOW(), NOW()),
('ops_email', 'agency@navexmar.com olcay@navexmar.com burak@navexmar.com', NOW(), NOW()),
('address', 'Numune Evler Mah/Sahil 1 Nolu Sok/no2/Dörtyol/Hatay', NOW(), NOW()),
('about_short', 'NAVEXMAR, İskenderun\'dan Antalya\'ya ve tüm Türkiye limanlarında 7/24 uluslararası gemi acenteliği, ikmal, teknik destek ve lojistik hizmetleri vermektedir.', NOW(), NOW()),
('page_about_active', '1', NOW(), NOW()),
('page_services_active', '1', NOW(), NOW()),
('page_news_active', '0', NOW(), NOW()),
('page_contact_active', '1', NOW(), NOW())
ON DUPLICATE KEY UPDATE `value`=VALUES(`value`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
