@extends('layouts.app')
@section('title', 'Hakkımızda | NAVEXMAR — Gemi Acenteliği Kurumsal')

@section('styles')
<style>
/* ─── ABOUT LUXURY STYLES ─── */
.abt-container { max-width: 1140px; margin: 0 auto; }

.abt-hero-deck {
    background: linear-gradient(135deg, #04101F 0%, #0B2545 100%);
    padding: 56px 0 48px;
    color: white;
    position: relative;
    overflow: hidden;
}
.abt-hero-deck::after {
    content: '';
    position: absolute; right: -80px; top: -80px;
    width: 360px; height: 360px;
    background: radial-gradient(circle, rgba(56, 189, 248, 0.15) 0%, transparent 70%);
    pointer-events: none;
}

.abt-grid {
    display: grid; grid-template-columns: 1fr 1fr;
    gap: 52px; align-items: center;
}

.abt-img-wrap {
    border-radius: 16px; overflow: hidden;
    aspect-ratio: 4/3; position: relative;
    box-shadow: 0 16px 36px rgba(6, 24, 46, 0.15);
    border: 1px solid var(--border);
}
.abt-img-wrap img { width:100%;height:100%;object-fit:cover; }

.abt-badge {
    position: absolute; bottom: 18px; right: 18px;
    background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(8px);
    border-radius: 12px; padding: 14px 20px;
    display: flex; align-items: center; gap: 12px;
    box-shadow: 0 10px 30px rgba(6, 24, 46, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.5);
}
.abt-badge-icon {
    width: 42px; height: 42px; background: var(--blue);
    border-radius: 10px; display: grid; place-items: center;
    color: white; font-size: 1.1rem;
}
.abt-badge strong { display: block; color: var(--navy); font-size: 1.15rem; font-family:'Outfit',sans-serif; font-weight:800; }
.abt-badge span { color: var(--muted); font-size: 0.76rem; font-weight: 600; }

.stats-mini-grid {
    display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-top: 24px;
}
.stat-mini-card {
    background: white; border: 1px solid var(--border);
    border-radius: 12px; padding: 16px 18px;
    transition: transform 0.2s ease, border-color 0.2s ease;
}
.stat-mini-card:hover { transform: translateY(-2px); border-color: #90CAF9; }
.stat-mini-num {
    font-family: 'Outfit', sans-serif;
    font-size: 1.6rem; font-weight: 900;
    color: var(--blue); line-height: 1;
}
.stat-mini-lbl { font-size: 0.78rem; color: var(--muted); margin-top: 4px; font-weight:600; }



/* Team */
.team-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 22px; justify-content: center; }
.team-card {
    background: white; border: 1px solid var(--border);
    border-radius: 14px; padding: 28px;
    text-align: center;
    transition: all 0.25s ease;
}
.team-card:hover { box-shadow: 0 12px 28px rgba(6, 24, 46, 0.1); transform: translateY(-4px); border-color: #90CAF9; }
.team-avatar {
    width: 64px; height: 64px; border-radius: 50%;
    background: var(--sky); border: 3px solid var(--blue);
    display: grid; place-items: center;
    font-size: 1.3rem; color: var(--blue);
    margin: 0 auto 16px;
    box-shadow: 0 4px 12px rgba(2, 132, 199, 0.2);
}
.team-name { font-size: 1.05rem; font-weight: 800; color: var(--navy); margin-bottom: 4px; }
.team-role { font-size: 0.78rem; color: var(--blue); font-weight: 700; margin-bottom: 10px; }
.team-bio { font-size: 0.82rem; color: var(--muted); line-height: 1.6; }

/* Certs */
.cert-grid { display: grid; grid-template-columns: repeat(4,1fr); gap: 16px; }
.cert-card {
    background: white; border: 1px solid var(--border);
    border-radius: 12px; padding: 22px 18px;
    text-align: center;
    transition: all 0.2s ease;
}
.cert-card:hover { border-color: #90CAF9; transform: translateY(-2px); box-shadow: var(--shadow); }
.cert-icon { font-size: 1.8rem; color: var(--blue); margin-bottom: 12px; }
.cert-name { font-size: 0.88rem; font-weight: 800; color: var(--navy); margin-bottom: 4px; }
.cert-desc { font-size: 0.76rem; color: var(--muted); line-height: 1.5; }

/* Acronym Values */
.acronym-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 20px;
    margin-top: 36px;
}
.acronym-card {
    background: white;
    border: 1px solid var(--border);
    border-radius: 12px;
    padding: 32px 20px;
    text-align: center;
    transition: all 0.25s ease;
    box-shadow: 0 4px 12px rgba(6, 24, 46, 0.03);
}
.acronym-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 24px rgba(6, 24, 46, 0.08);
    border-color: #90CAF9;
}
.acronym-letter {
    font-family: 'Outfit', sans-serif;
    font-size: 2.8rem;
    font-weight: 900;
    color: var(--navy);
    line-height: 1;
    margin-bottom: 12px;
}
.acronym-title {
    font-size: 0.88rem;
    font-weight: 700;
    color: var(--text);
}
@media (max-width: 768px) {
    .acronym-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
@media (max-width: 480px) {
    .acronym-grid {
        grid-template-columns: 1fr;
    }
}

/* Perspective Section */
.perspective-section {
    background: #F8FAFC;
    padding: 60px 0;
}
.perspective-text {
    max-width: 800px;
    margin: 0 auto 48px;
    text-align: center;
    font-size: 0.96rem;
    color: var(--muted);
    line-height: 1.8;
}
.perspective-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}
.perspective-card {
    background: #EDF2F7;
    border-radius: 20px;
    padding: 40px 30px;
    text-align: center;
    transition: all 0.25s ease;
    border: 1px solid rgba(0, 0, 0, 0.02);
}
.perspective-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 24px rgba(0, 0, 0, 0.04);
    border-color: #90CAF9;
}
.perspective-icon {
    font-size: 2.2rem;
    color: var(--navy);
    margin-bottom: 20px;
    display: inline-block;
}
.perspective-card h3 {
    font-family: 'Outfit', sans-serif;
    font-size: 1.3rem;
    font-weight: 800;
    color: var(--navy);
    margin-bottom: 14px;
}
.perspective-card p {
    font-size: 0.86rem;
    color: var(--muted);
    line-height: 1.65;
}
@media (max-width: 900px) {
    .perspective-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
}

@media (max-width:900px) {
    .abt-grid { grid-template-columns: 1fr; gap: 36px; }
    .team-grid { grid-template-columns: 1fr; }
    .cert-grid { grid-template-columns: 1fr 1fr; }
}
</style>
@endsection

@section('content')

{{-- PAGE HERO --}}
<div class="abt-hero-deck">
    <div class="container abt-container">
        <div class="page-hero-badge"><i class="fa-solid fa-building"></i> {{ __t('Kurumsal Profil', 'Corporate Profile') }}</div>
        <h1>{{ __t('Denizcilikte Güven ve Kesintisiz Hizmet', 'Excellence & Trust in Maritime Services') }}</h1>
        <p>{{ __t('İskenderun Körfezi, Mersin ve Antalya başta olmak üzere tüm Türkiye limanlarında armatör, kiracı ve gemi işletmecilerine 7/24 uluslararası standartlarda profesyonel acentelik hizmeti veriyoruz.', 'Providing 24/7 professional shipping agency services for shipowners, charterers, and operators in Iskenderun, Mersin, Antalya and all Turkish ports.') }}</p>
    </div>
</div>

{{-- SHIRKET HAKKINDA --}}
<section class="sec">
    <div class="container abt-container">
        <div class="abt-grid">
            <div>
                <div class="sec-label">{{ __t('Biz Kimiz?', 'Who We Are') }}</div>
                <h2 class="sec-title">{{ __t('Akdeniz ve Türkiye Liman Hizmetlerinde Güvenilir Acente', 'Trusted Agency in Mediterranean & Turkish Ports') }}</h2>
                <p style="color:var(--muted); font-size:0.92rem; line-height:1.75; margin-bottom:16px;">
                    {{ __t('NAVEXMAR, İskenderun, Ceyhan, Mersin, Taşucu ve Antalya başta olmak üzere Türkiye\'nin tüm limanlarında 7/24 gemi acenteliği, ikmal, teknik destek ve deniz lojistiği hizmetleri sunmaktadır.', 'NAVEXMAR delivers 24/7 shipping agency, bunkering, technical support and maritime logistics across Iskenderun, Ceyhan, Mersin, Tasucu, Antalya and all Turkish ports.') }}
                </p>
                <p style="color:var(--muted); font-size:0.92rem; line-height:1.75; margin-bottom:24px;">
                    {{ __t('Uzman ekibimiz, en karmaşık operasyonlarda bile sıfır gecikme prensibiyle hareket ederek armatörlerimize ve kiracılarımıza şeffaf, güvenilir ve rekabetçi acentelik çözümleri üretir.', 'Our expert team operates under a zero-delay principle even in complex operations, delivering transparent, reliable and cost-effective agency solutions.') }}
                </p>
                <div class="stats-mini-grid">
                    <div class="stat-mini-card">
                        <div class="stat-mini-num">100%</div>
                        <div class="stat-mini-lbl">{{ __t('Güvenilir Hizmet', 'Reliable Service') }}</div>
                    </div>
                    <div class="stat-mini-card">
                        <div class="stat-mini-num">4.000+</div>
                        <div class="stat-mini-lbl">{{ __t('Başarılı Gemi Uğrağı', 'Successful Vessel Calls') }}</div>
                    </div>
                    <div class="stat-mini-card">
                        <div class="stat-mini-num">12+</div>
                        <div class="stat-mini-lbl">{{ __t('Ana Liman & Terminal', 'Main Ports & Terminals') }}</div>
                    </div>
                    <div class="stat-mini-card">
                        <div class="stat-mini-num">7/24</div>
                        <div class="stat-mini-lbl">{{ __t('Canlı Operasyon Masası', 'Live Duty Operations') }}</div>
                    </div>
                </div>
            </div>

            <div class="abt-img-wrap">
                <img src="/images/about_corporate.jpg" alt="NAVEXMAR Office" loading="lazy">
                <div class="abt-badge">
                    <div class="abt-badge-icon"><i class="fa-solid fa-clock"></i></div>
                    <div>
                        <strong>7/24 Kesintisiz</strong>
                        <span>{{ __t('Liman & Gemi Acenteliği', 'Port & Vessel Agency') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- FARKLI BIR BAKIS ACISI / PERSPECTIVE --}}
<section class="sec perspective-section">
    <div class="container abt-container">
        <div style="text-align:center; margin-bottom:24px;">
            <h2 class="sec-title" style="font-size:clamp(1.8rem, 3.5vw, 2.8rem); color:var(--navy); font-weight:900;">
                {{ __t('Farklı Bir Bakış Açısı', 'A Different Perspective') }}
            </h2>
        </div>
        
        <p class="perspective-text">
            {{ __t('Navexmar, sektördeki diğer firmalardan farklı bir yaklaşımla gemi bakım ve uluslararası ticaret hizmetleri sunan bir şirkettir. Kuruluşumuzdan bu yana, insan odaklı, tüm ortaklarimizi kapsayan ve her yönüyle entegre bir şirket olmaya çalışıyoruz. Müşterilerimize en iyi hizmeti sunmak için sürekli gelişim ve yenilikçilik ilkelerimizle hareket ediyoruz.', 'Navexmar is a company that offers vessel maintenance and international trade services with a different approach from other firms in the sector. Since our establishment, we strive to be a human-centered, inclusive, and fully integrated company. We act with our principles of continuous development and innovation to offer the best service to our customers.') }}
        </p>

        <div class="perspective-grid">
            <div class="perspective-card">
                <div class="perspective-icon"><i class="fa-solid fa-users"></i></div>
                <h3>{{ __t('İnsan Odaklı', 'Human Centered') }}</h3>
                <p>
                    {{ __t('Çalışanlarımız ve iş ortaklarımızla kurduğumuz güçlü ilişkiler, başarımızın temel taşıdır. Her bireyin değerini bilir ve onların gelişimine katkıda bulunuruz.', 'The strong relationships we build with our employees and business partners are the cornerstone of our success. We know the value of each individual and contribute to their development.') }}
                </p>
            </div>

            <div class="perspective-card">
                <div class="perspective-icon"><i class="fa-solid fa-handshake"></i></div>
                <h3>{{ __t('Kapsayıcı Ortaklık', 'Inclusive Partnership') }}</h3>
                <p>
                    {{ __t('Tüm paydaşlarımızı sürece dahil eder, şeffaf ve dürüst bir iletişim ile uzun vadeli ortaklıklar kurarız. Birlikte başarıya ulaşma inancıyla hareket ederiz.', 'We include all stakeholders in the process and establish long-term partnerships with transparent and honest communication. We act with the belief of achieving success together.') }}
                </p>
            </div>

            <div class="perspective-card">
                <div class="perspective-icon"><i class="fa-solid fa-gears"></i></div>
                <h3>{{ __t('Entegre Çözümler', 'Integrated Solutions') }}</h3>
                <p>
                    {{ __t('Her yönüyle entegre sistemlerimiz sayesinde müşterilerimize kapsamlı ve kesintisiz hizmet sunuyoruz. Tek noktadan tüm ihtiyaçlarınıza çözüm üretiyoruz.', 'Thanks to our fully integrated systems, we offer comprehensive and uninterrupted service to our customers. We produce solutions for all your needs from a single point.') }}
                </p>
            </div>
        </div>
    </div>
</section>



{{-- MARKAMIZ / DEGERLERIMIZ --}}
<section class="sec">
    <div class="container abt-container">
        <div style="text-align:center; margin-bottom:40px;">
            <div class="sec-label" style="justify-content:center;">{{ __t('Değerlerimiz', 'Our Values') }}</div>
            <h2 class="sec-title">{{ __t('NAVEX Marka Kimliğimiz ve Değerlerimiz', 'NAVEX Brand Identity & Values') }}</h2>
        </div>

        <div class="acronym-grid">
            <div class="acronym-card">
                <div class="acronym-letter">N</div>
                <div class="acronym-title">{{ __t('Navigasyon', 'Navigation') }}</div>
            </div>
            <div class="acronym-card">
                <div class="acronym-letter">A</div>
                <div class="acronym-title">{{ __t('Azimli', 'Determined') }}</div>
            </div>
            <div class="acronym-card">
                <div class="acronym-letter">V</div>
                <div class="acronym-title">{{ __t('Verimli', 'Efficient') }}</div>
            </div>
            <div class="acronym-card">
                <div class="acronym-letter">E</div>
                <div class="acronym-title">{{ __t('Enerjik', 'Energetic') }}</div>
            </div>
            <div class="acronym-card">
                <div class="acronym-letter">X</div>
                <div class="acronym-title">{{ __t('Mükemmel', 'eXcellent') }}</div>
            </div>
        </div>
    </div>
</section>

{{-- EKIBIMIZ --}}
<section class="sec">
    <div class="container abt-container">
        <div style="text-align:center; margin-bottom:48px;">
            <div class="sec-label" style="justify-content:center;">{{ __t('Yönetim Kadromuz', 'Executive Team') }}</div>
            <h2 class="sec-title">{{ __t('Uzman Kaptanlar ve Denizcilik Profesyonelleri', 'Master Captains & Maritime Professionals') }}</h2>
        </div>

        <div class="team-grid">
            <div class="team-card">
                <div class="team-avatar"><i class="fa-solid fa-anchor"></i></div>
                <div class="team-name">Burak Arıkan</div>
                <div class="team-role">{{ __t('Liman Operasyon Müdürü', 'Port Operations Manager') }}</div>
                <div class="team-bio">{{ __t('Liman hizmetleri, yükleme-tahliye operasyonları ve yerel acentelik süreçlerinin yönetimini üstlenmektedir.', 'Manages port services, loading-discharging operations, and local agency processes.') }}</div>
            </div>
            <div class="team-card">
                <div class="team-avatar"><i class="fa-solid fa-route"></i></div>
                <div class="team-name">Olcay Çakıcı</div>
                <div class="team-role">{{ __t('Operasyon & Lojistik Müdürü', 'Operations & Logistics Manager') }}</div>
                <div class="team-bio">{{ __t('İskenderun, Mersin ve Akdeniz limanlarında yanaşma, tahliye, ikmal ve lojistik operasyonlarının koordinasyonunu sağlamaktadır.', 'Provides operational coordination for berthing, discharge, supplies and logistics across Mediterranean ports.') }}</div>
            </div>
        </div>
    </div>
</section>

{{-- SERTIFIKALAR --}}
<section class="sec sec-alt">
    <div class="container abt-container">
        <div style="text-align:center; margin-bottom:40px;">
            <div class="sec-label" style="justify-content:center;">{{ __t('Sertifika ve Akreditasyonlar', 'Certifications & Accreditations') }}</div>
            <h2 class="sec-title">{{ __t('Uluslararası Hizmet Standartları', 'International Service Standards') }}</h2>
        </div>

        <div class="cert-grid">
            <div class="cert-card">
                <div class="cert-icon"><i class="fa-solid fa-certificate"></i></div>
                <div class="cert-name">BIMCO Member</div>
                <div class="cert-desc">{{ __t('Baltık ve Uluslararası Denizcilik Konseyi Üyesi', 'Baltic & International Maritime Council Member') }}</div>
            </div>
            <div class="cert-card">
                <div class="cert-icon"><i class="fa-solid fa-award"></i></div>
                <div class="cert-name">FONASBA</div>
                <div class="cert-desc">{{ __t('Dünya Gemi Acenteleri Dernekleri Federasyonu Standardı', 'Federation of National Associations of Ship Brokers Standard') }}</div>
            </div>

            <div class="cert-card">
                <div class="cert-icon"><i class="fa-solid fa-anchor"></i></div>
                <div class="cert-name">DTO Üyesi</div>
                <div class="cert-desc">{{ __t('İMEAK Deniz Ticaret Odası Kayıtlı Acente', 'IMEAK Chamber of Shipping Registered Agency') }}</div>
            </div>
        </div>
    </div>
</section>

@endsection
