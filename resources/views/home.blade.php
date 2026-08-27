@extends('layouts.app')
@section('title', 'NAVEXMAR — Gemi Acenteliği & Liman Hizmetleri | İskenderun - Antalya')

@section('styles')
<style>
/* ─── NEXT-GEN MARITIME HOMEPAGE STYLES ─── */
.hm-container { max-width: 1200px; margin: 0 auto; padding: 0 24px; }

/* HERO SECTION */
.hm-hero {
    position: relative;
    min-height: 620px;
    background: linear-gradient(135deg, #030D1B 0%, #07192F 50%, #0B2545 100%);
    color: white;
    display: flex;
    align-items: center;
    overflow: hidden;
}

.hm-hero::before {
    content: ''; position: absolute; inset: 0;
    background-image: url('{{ asset('images/hero_bosphorus.jpg') }}');
    background-size: cover; background-position: center;
    opacity: 0.18; filter: saturate(1.3);
}

.hm-hero::after {
    content: ''; position: absolute;
    right: -120px; bottom: -120px;
    width: 500px; height: 500px;
    background: radial-gradient(circle, rgba(56, 189, 248, 0.16) 0%, transparent 70%);
    pointer-events: none;
}

.hm-hero-layout {
    position: relative; z-index: 2;
    display: grid; grid-template-columns: 1fr;
    max-width: 800px;
    gap: 48px; align-items: center;
    padding: 70px 0;
}

.hm-hero-eyebrow {
    display: inline-flex; align-items: center; gap: 8px;
    background: rgba(56, 189, 248, 0.14);
    border: 1px solid rgba(56, 189, 248, 0.35);
    color: var(--cyan);
    padding: 6px 18px; border-radius: 99px;
    font-size: 0.76rem; font-weight: 800;
    text-transform: uppercase; letter-spacing: 1.2px;
    margin-bottom: 24px;
}

.hm-hero h1 {
    font-size: clamp(2rem, 4.2vw, 3.4rem);
    font-weight: 900; color: white;
    line-height: 1.15; margin-bottom: 20px;
    letter-spacing: -0.8px;
}
.hm-hero h1 span {
    color: var(--cyan);
    text-shadow: 0 0 24px rgba(56, 189, 248, 0.45);
}

.hm-hero-desc {
    font-size: 1rem; color: rgba(255, 255, 255, 0.82);
    max-width: 520px; line-height: 1.7; margin-bottom: 36px;
}

.hm-hero-btns { display: flex; flex-wrap: wrap; gap: 14px; margin-bottom: 48px; }

/* Hero Stats Deck */
.hm-hero-stats {
    display: flex; flex-wrap: wrap; gap: 36px;
    padding-top: 32px; border-top: 1px solid rgba(255, 255, 255, 0.12);
}
.hm-stat-num {
    font-family: 'Outfit', sans-serif;
    font-size: 2rem; font-weight: 900; color: white; line-height: 1;
}
.hm-stat-num span { color: var(--cyan); }
.hm-stat-lbl { font-size: 0.76rem; color: rgba(255, 255, 255, 0.6); margin-top: 5px; font-weight: 600; }





/* ─── SERVICES SHOWCASE ─── */
.svc-deck-grid {
    display: grid; grid-template-columns: repeat(3, 1fr); gap: 26px;
}

.svc-deck-card {
    background: white; border: 1px solid var(--border);
    border-radius: 16px; padding: 32px;
    transition: all 0.3s cubic-bezier(0.4,0,0.2,1);
    box-shadow: 0 4px 16px rgba(6, 24, 46, 0.03);
    display: flex; flex-direction: column;
}

.svc-deck-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 18px 40px rgba(6, 24, 46, 0.12);
    border-color: #90CAF9;
}

.svc-deck-icon {
    width: 52px; height: 52px;
    background: var(--sky); border-radius: 12px;
    display: grid; place-items: center;
    color: var(--blue); font-size: 1.25rem;
    margin-bottom: 22px;
    box-shadow: 0 4px 14px rgba(2, 132, 199, 0.15);
}

.svc-deck-title { font-size: 1.15rem; font-weight: 800; color: var(--navy); margin-bottom: 12px; font-family:'Outfit',sans-serif; }
.svc-deck-desc { font-size: 0.86rem; color: var(--muted); line-height: 1.65; margin-bottom: 20px; flex: 1; }

.svc-deck-bullets {
    list-style: none; margin-bottom: 22px; display: flex; flex-direction: column; gap: 8px;
    padding-top: 14px; border-top: 1px solid var(--border);
}
.svc-deck-bullets li {
    font-size: 0.78rem; font-weight: 700; color: var(--navy);
    display: flex; align-items: center; gap: 8px;
}
.svc-deck-bullets li i { color: var(--teal); font-size: 0.85rem; }

.svc-deck-action {
    display: inline-flex; align-items: center; gap: 8px;
    color: var(--blue); font-size: 0.84rem; font-weight: 800;
    text-decoration: none; transition: gap 0.2s ease, color 0.2s ease;
    margin-top: auto;
}
.svc-deck-action:hover { gap: 12px; color: var(--navy); }

/* ─── LIVE OPERATIONAL MAP & PORTS ─── */
.ops-deck {
    background: linear-gradient(135deg, #04101F 0%, #0B2545 100%);
    color: white; padding: 80px 0; border-y: 1px solid rgba(255,255,255,0.08);
}

.ops-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 22px; }

.ops-card {
    background: rgba(255, 255, 255, 0.06);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.12);
    border-radius: 14px; padding: 24px;
    transition: all 0.25s ease;
}
.ops-card:hover {
    background: rgba(255, 255, 255, 0.12);
    transform: translateY(-4px);
    border-color: rgba(56, 189, 248, 0.4);
}

.ops-card-icon { color: var(--cyan); font-size: 1.5rem; margin-bottom: 14px; }
.ops-card-title { font-size: 1.05rem; font-weight: 800; color: white; margin-bottom: 6px; font-family:'Outfit',sans-serif; }
.ops-card-subtitle { font-size: 0.78rem; color: rgba(255,255,255,0.65); margin-bottom: 14px; font-weight: 600; }
.ops-card-spec { font-size: 0.82rem; color: rgba(255,255,255,0.9); line-height: 1.6; }

/* ─── FLEET PREVIEW STRIP ─── */
.flt-preview-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
.flt-preview-card {
    background: white; border: 1px solid var(--border);
    border-radius: 14px; overflow: hidden; box-shadow: 0 4px 14px rgba(6, 24, 46, 0.04);
    transition: all 0.25s ease;
}
.flt-preview-card:hover { transform: translateY(-4px); box-shadow: 0 14px 32px rgba(6, 24, 46, 0.12); border-color: #90CAF9; }
.flt-preview-img { position: relative; height: 190px; background: #0B2545; overflow: hidden; }
.flt-preview-img img { width:100%; height:100%; object-fit:cover; transition: transform 0.4s ease; }
.flt-preview-card:hover .flt-preview-img img { transform: scale(1.06); }
.flt-preview-body { padding: 20px; }
.flt-preview-name { font-size: 1.1rem; font-weight: 800; color: var(--navy); margin-bottom: 4px; font-family:'Outfit',sans-serif; }
.flt-preview-imo { font-size: 0.76rem; color: var(--muted); margin-bottom: 14px; font-weight: 600; }
.flt-preview-specs { display: flex; justify-content: space-between; font-size: 0.8rem; background: #F8FAFC; padding: 10px 12px; border-radius: 8px; border: 1px solid #E2E8F0; }

/* ─── WHY TRUST DECK ─── */
.why-trust-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 52px; align-items: center; }
.why-trust-cards { display: grid; grid-template-columns: 1fr 1fr; gap: 18px; }
.trust-card {
    background: white; border: 1px solid var(--border);
    border-radius: 14px; padding: 22px;
    transition: all 0.25s ease;
}
.trust-card:hover { transform: translateY(-3px); border-color: #90CAF9; box-shadow: 0 10px 24px rgba(6, 24, 46, 0.08); }
.trust-icon { width: 40px; height: 40px; background: var(--sky); border-radius: 10px; display: grid; place-items: center; color: var(--blue); font-size: 1rem; margin-bottom: 12px; }
.trust-title { font-size: 0.92rem; font-weight: 800; color: var(--navy); margin-bottom: 4px; font-family:'Outfit',sans-serif; }
.trust-desc { font-size: 0.78rem; color: var(--muted); line-height: 1.55; }

/* ─── NEWS GRID ─── */
.news-deck-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
.news-deck-card {
    background: white; border: 1px solid var(--border);
    border-radius: 14px; overflow: hidden;
    transition: all 0.25s ease; box-shadow: 0 4px 14px rgba(6, 24, 46, 0.04);
}
.news-deck-card:hover { transform: translateY(-4px); box-shadow: 0 14px 32px rgba(6, 24, 46, 0.1); border-color: #90CAF9; }
.news-deck-img { height: 180px; position: relative; overflow: hidden; background: #0B2545; }
.news-deck-img img { width:100%; height:100%; object-fit:cover; transition: transform 0.4s ease; }
.news-deck-card:hover .news-deck-img img { transform: scale(1.06); }
.news-deck-body { padding: 20px; }
.news-deck-cat { font-size: 0.7rem; font-weight: 800; color: var(--blue); text-transform: uppercase; letter-spacing: 0.6px; margin-bottom: 6px; }
.news-deck-title { font-size: 0.98rem; font-weight: 800; color: var(--navy); line-height: 1.4; margin-bottom: 10px; font-family:'Outfit',sans-serif; }
.news-deck-desc { font-size: 0.8rem; color: var(--muted); line-height: 1.6; margin-bottom: 16px; }

/* ─── CTA CONVERSION BAR ─── */
.cta-banner {
    background: linear-gradient(135deg, #0284C7 0%, #0B2545 100%);
    border-radius: 20px; padding: 48px; color: white;
    display: flex; justify-content: space-between; align-items: center; gap: 32px;
    box-shadow: 0 16px 40px rgba(2, 132, 199, 0.25);
    margin-bottom: 80px;
}
.cta-banner h3 { font-size: 1.8rem; font-weight: 900; color: white; margin-bottom: 8px; font-family:'Outfit',sans-serif; }
.cta-banner p { color: rgba(255, 255, 255, 0.85); font-size: 0.95rem; max-width: 540px; }

@media (max-width: 1024px) {
    .hm-hero-layout { grid-template-columns: 1fr; gap: 36px; }
    .svc-deck-grid, .flt-preview-grid, .news-deck-grid { grid-template-columns: 1fr 1fr; }
    .ops-grid { grid-template-columns: 1fr 1fr; }
    .why-trust-grid { grid-template-columns: 1fr; gap: 36px; }
    .cta-banner { flex-direction: column; text-align: center; }
}
@media (max-width: 640px) {
    .svc-deck-grid, .flt-preview-grid, .news-deck-grid, .ops-grid, .why-trust-cards { grid-template-columns: 1fr; }
}
</style>
@endsection

@section('content')

{{-- HERO SECTION --}}
<section class="hm-hero">
    <div class="hm-container">
        <div class="hm-hero-layout">
            <div>
                <div class="hm-hero-eyebrow"><span class="dot-live"></span> {{ __t('7/24 Canlı Operasyon Masası', '24/7 Live Duty Operations Desk') }}</div>
                <h1>{!! __t('İskenderun\'dan Antalya\'ya<br><span>Profesyonel Gemi Acenteliği</span>', 'Professional Shipping Agency<br>in <span>Mediterranean & Turkish Ports</span>') !!}</h1>
                <p class="hm-hero-desc">{{ __t('İskenderun, Ceyhan, Mersin, Taşucu ve Antalya başta olmak üzere tüm Türkiye limanlarında şeffaf DA/CA raporlaması, güvenilir operasyon ve 7/24 kesintisiz nöbet hizmeti.', '24/7 Shipping agency attendance, transparent DA/CA statements, and zero-delay handling across Iskenderun, Mersin, Antalya and all Turkish ports.') }}</p>
                
                <div class="hm-hero-btns">
                    <a href="{{ route('contact') }}" class="btn-primary"><i class="fa-solid fa-file-invoice-dollar"></i> {{ __t('Proforma Teklif İste', 'Request Proforma Quote') }}</a>
                    <a href="{{ route('about') }}" class="btn-outline-white"><i class="fa-solid fa-building"></i> {{ __t('Kurumsal Profil', 'Corporate Profile') }}</a>
                </div>

                <div class="hm-hero-stats">
                    <div><div class="hm-stat-num">100<span>%</span></div><div class="hm-stat-lbl">{{ __t('Güvenilir Hizmet', 'Reliable Service') }}</div></div>
                    <div><div class="hm-stat-num">4<span>K+</span></div><div class="hm-stat-lbl">{{ __t('Yıllık Gemi Uğrağı', 'Annual Vessel Calls') }}</div></div>
                    <div><div class="hm-stat-num">12<span>+</span></div><div class="hm-stat-lbl">{{ __t('Ana Terminal & Liman', 'Key Terminals & Ports') }}</div></div>
                    <div><div class="hm-stat-num">24<span>/7</span></div><div class="hm-stat-lbl">{{ __t('Canlı Operasyon', 'Duty Operations') }}</div></div>
                </div>
            </div>


        </div>
    </div>
</section>



{{-- SERVICES SECTION --}}
<section class="sec">
    <div class="hm-container">
        <div style="display:flex; justify-content:space-between; align-items:flex-end; margin-bottom:36px; flex-wrap:wrap; gap:16px;">
            <div>
                <div class="sec-label">{{ __t('Uzmanlık Alanlarımız', 'Our Expertise') }}</div>
                <h2 class="sec-title">{{ __t('Geniş Denizcilik Hizmet Portföyümüz', 'Comprehensive Maritime Services') }}</h2>
            </div>
            <a href="{{ route('services.index') }}" class="btn-outline">{{ __t('Tüm Hizmetler', 'View All Services') }} <i class="fa-solid fa-arrow-right"></i></a>
        </div>

        <div class="svc-deck-grid">
            <div class="svc-deck-card">
                <div class="svc-deck-icon"><i class="fa-solid fa-anchor"></i></div>
                <h3 class="svc-deck-title">{{ __t('Akdeniz & Terminal Acenteliği', 'Mediterranean & Terminal Agency') }}</h3>
                <p class="svc-deck-desc">{{ __t('İskenderun Körfezi, Ceyhan Botaş/Toros ve Mersin terminallerinde kesintisiz acentelik, liman izinleri, pilotaj ve rıhtım operasyonu.', 'Seamless agency, port clearance, pilotage and terminal operations in Iskenderun Gulf, Ceyhan and Mersin.') }}</p>
                <ul class="svc-deck-bullets">
                    <li><i class="fa-solid fa-circle-check"></i> {{ __t('7/24 Liman & Terminal Bildirim Takibi', '24/7 Port & Terminal Clearance') }}</li>
                    <li><i class="fa-solid fa-circle-check"></i> {{ __t('Kılavuz Kaptan & Römorkör İzni', 'Pilotage & Tugboat Permits') }}</li>
                </ul>
                <a href="{{ route('services.show', 'akdeniz-limanlari-terminal-acenteligi') }}" class="svc-deck-action">{{ __t('Hizmet Detayları', 'Service Details') }} <i class="fa-solid fa-arrow-right"></i></a>
            </div>

            <div class="svc-deck-card">
                <div class="svc-deck-icon"><i class="fa-solid fa-ship"></i></div>
                <h3 class="svc-deck-title">{{ __t('Liman & Gemi Acenteliği', 'Port & Vessel Agency') }}</h3>
                <p class="svc-deck-desc">{{ __t('İskenderun, Mersin, Taşucu, Antalya ve tüm Türk limanlarında gemi giriş-çıkış idari işlemleri, yük operasyonu ve fener harçları yönetimi.', 'Complete port state formalities, cargo operations, light dues and owner representation at Iskenderun, Mersin, Antalya and all Turkish ports.') }}</p>
                <ul class="svc-deck-bullets">
                    <li><i class="fa-solid fa-circle-check"></i> {{ __t('Sahil Sağlık & Gümrük Onayları', 'Health & Customs Clearance') }}</li>
                    <li><i class="fa-solid fa-circle-check"></i> {{ __t('Draft Sörvey & Yük Gözetimi', 'Draft Survey & Cargo Supervision') }}</li>
                </ul>
                <a href="{{ route('services.show', 'gemi-acenteligi-liman-hizmetleri') }}" class="svc-deck-action">{{ __t('Hizmet Detayları', 'Service Details') }} <i class="fa-solid fa-arrow-right"></i></a>
            </div>

            <div class="svc-deck-card">
                <div class="svc-deck-icon"><i class="fa-solid fa-gas-pump"></i></div>
                <h3 class="svc-deck-title">{{ __t('Bunkering & Kumanya', 'Bunkering & Provisions') }}</h3>
                <p class="svc-deck-desc">{{ __t('Demir sahasında veya rıhtımda ISO standartlarına uygun VLSFO, MGO yakıt ikmali, taze kumanya ve yedek parça teslimatı.', 'ISO compliant VLSFO, MGO fuel bunkering, fresh provisions and spare parts delivery at anchorage or berth.') }}</p>
                <ul class="svc-deck-bullets">
                    <li><i class="fa-solid fa-circle-check"></i> {{ __t('Barge & İkmal Koordinasyonu', 'Barge & Supply Logistics') }}</li>
                    <li><i class="fa-solid fa-circle-check"></i> {{ __t('Gümrüklü Transit Yedek Parça', 'Customs Bonded Spare Parts') }}</li>
                </ul>
                <a href="{{ route('services.show', 'yakit-ve-kumanya-ikmali') }}" class="svc-deck-action">{{ __t('Hizmet Detayları', 'Service Details') }} <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

{{-- LIVE OPERATIONAL MAPS --}}
<section class="ops-deck">
    <div class="hm-container">
        <div style="text-align:center; margin-bottom:48px;">
            <div class="sec-label" style="color:var(--cyan); justify-content:center;">{{ __t('Operasyon Bölgelerimiz', 'Operational Regions') }}</div>
            <h2 class="sec-title" style="color:white;">{{ __t('İskenderun\'dan Antalya\'ya Akdeniz Limanları', 'Mediterranean Ports: From Iskenderun to Antalya') }}</h2>
        </div>

        <div class="ops-grid">
            <div class="ops-card">
                <div class="ops-card-icon"><i class="fa-solid fa-anchor"></i></div>
                <div class="ops-card-title">İskenderun Limanları</div>
                <div class="ops-card-subtitle">İskenderun Port · İsdemir</div>
                <div class="ops-card-spec">Dökme Yük & Sıvı Yük<br>Maks Draft: 18.0 m<br>7/24 Rıhtım & Demir Acenteliği</div>
            </div>

            <div class="ops-card">
                <div class="ops-card-icon"><i class="fa-solid fa-gas-pump"></i></div>
                <div class="ops-card-title">Ceyhan Petrol Terminalleri</div>
                <div class="ops-card-subtitle">Botaş · BTC · Haydar Aliyev</div>
                <div class="ops-card-spec">Ham Petrol, Tanker & Kimyasal<br>SBM Şamandıraları & Rıhtım<br>Güvenli Demirleme & İkmal</div>
            </div>

            <div class="ops-card">
                <div class="ops-card-icon"><i class="fa-solid fa-boxes-stacked"></i></div>
                <div class="ops-card-title">Mersin Uluslararası Limanı</div>
                <div class="ops-card-subtitle">MIP · Ataş Terminali</div>
                <div class="ops-card-spec">Ro-Ro & Genel Kargo<br>Draft: 15.8 m<br>Hızlı Gümrük & Tahliye</div>
            </div>

            <div class="ops-card">
                <div class="ops-card-icon"><i class="fa-solid fa-ship"></i></div>
                <div class="ops-card-title">Antalya & Taşucu Limanları</div>
                <div class="ops-card-subtitle">Port Akdeniz · Taşucu Seka</div>
                <div class="ops-card-spec">Yolcu, Ro-Ro & Proje Kargo<br>Kruvaziyer & Dökme Yük<br>VIP Acentelik & Transit</div>
            </div>
        </div>
    </div>
</section>

{{-- WHY NAVEXMAR / TRUST DECK --}}
<section class="sec">
    <div class="hm-container">
        <div class="why-trust-grid">
            <div>
                <div class="sec-label">{{ __t('Güven ve Şeffaflık', 'Trust & Transparency') }}</div>
                <h2 class="sec-title">{{ __t('Neden Armatörler NAVEXMAR\'ı Tercih Ediyor?', 'Why Owners Choose NAVEXMAR?') }}</h2>
                <p style="color:var(--muted); font-size:0.94rem; line-height:1.7; margin-bottom:24px;">
                    {{ __t('BIMCO ve FONASBA üyeliklerimiz, uzman operasyon kadromuzla gemi uğraklarınızda sıfır hatayla hizmet sunuyoruz.', 'With our BIMCO and FONASBA memberships and expert operational staff, we deliver zero-error agency attendance for your port calls.') }}
                </p>
                <a href="{{ route('about') }}" class="btn-primary"><i class="fa-solid fa-building"></i> {{ __t('Kurumsal Profilimizi İnceleyin', 'Explore Corporate Profile') }}</a>
            </div>

            <div class="why-trust-cards">
                <div class="trust-card">
                    <div class="trust-icon"><i class="fa-solid fa-clock"></i></div>
                    <div class="trust-title">{{ __t('7/24 Kesintisiz Nöbet', '24/7 Duty Desk') }}</div>
                    <div class="trust-desc">{{ __t('Acil arıza, tıbbi nakil ve ikmallere 30 dakika içinde yerinde müdahale.', 'On-site response within 30 minutes for emergencies, medical evacuations and supply.') }}</div>
                </div>

                <div class="trust-card">
                    <div class="trust-icon"><i class="fa-solid fa-file-contract"></i></div>
                    <div class="trust-title">{{ __t('Şeffaf DA/CA Hesapları', 'Transparent DA/CA') }}</div>
                    <div class="trust-desc">{{ __t('BIMCO standartlarında detaylı masraf ve dijital fatura dökümleri.', 'BIMCO standard disbursement statements with digital voucher attachments.') }}</div>
                </div>

                <div class="trust-card">
                    <div class="trust-icon"><i class="fa-solid fa-certificate"></i></div>
                    <div class="trust-title">{{ __t('Uluslararası Standartlar', 'International Standards') }}</div>
                    <div class="trust-desc">{{ __t('BIMCO ve FONASBA standartlarında yüksek kaliteli acentelik hizmetleri.', 'High quality shipping agency attendance in line with BIMCO and FONASBA standards.') }}</div>
                </div>

                <div class="trust-card">
                    <div class="trust-icon"><i class="fa-solid fa-shield-check"></i></div>
                    <div class="trust-title">{{ __t('Sıfır Gecikme Prensibi', 'Zero Delay Principle') }}</div>
                    <div class="trust-desc">{{ __t('Bürokratik onaylar önceden tamamlanarak demoraj riskleri engellenir.', 'Pre-cleared administrative approvals to eliminate charterer demurrage risks.') }}</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CONVERSION CTA BANNER --}}
<div class="hm-container">
    <div class="cta-banner">
        <div>
            <h3>{{ __t('Geminize Özel Proforma Liman Hesabı İster Misiniz?', 'Need a Custom Proforma PDA for Your Vessel?') }}</h3>
            <p>{{ __t('İskenderun, Mersin, Antalya ve tüm liman uğraklarınız için 2 saat içinde detaylı proforma hesap (PDA) hazırlayalım.', 'Let us prepare a detailed proforma disbursement account (PDA) within 2 hours for your Iskenderun, Mersin, Antalya or any Turkish port call.') }}</p>
        </div>
        <div style="display:flex; gap:12px; flex-wrap:wrap;">
            <a href="{{ route('contact') }}" class="btn-primary" style="background:white; color:var(--navy) !important;"><i class="fa-solid fa-paper-plane"></i> {{ __t('Teklif İste', 'Request Quote') }}</a>
            <a href="tel:{{ \App\Models\SiteSetting::get('mobile', '+905327009090') }}" class="btn-outline-white"><i class="fa-solid fa-phone"></i> {{ \App\Models\SiteSetting::get('mobile', '+90 532 700 90 90') }}</a>
        </div>
    </div>
</div>

@endsection
