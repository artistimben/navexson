@extends('layouts.app')
@section('title', 'Hizmetlerimiz | NAVEXMAR — Gemi Acenteliği & Liman Hizmetleri')

@php
$serviceImages = [
    'gemi-acenteligi-liman-hizmetleri'        => 'images/svc_port_agency.jpg',
    'akdeniz-limanlari-terminal-acenteligi'  => 'images/svc_strait_transit.jpg',
    'turk-bogazlari-gecis-acenteligi'         => 'images/svc_strait_transit.jpg',
    'yakit-ve-kumanya-ikmali'                 => 'images/svc_bunkering.jpg',
    'murettebat-degisimi-kara-lojistigi'      => 'images/svc_crew_change.jpg',
    'yuk-ve-konteyner-operasyonlari'          => 'images/svc_cargo.jpg',
    'teknik-survey-bakim-onarim'              => 'images/svc_technical.jpg',
    'teknik-ve-makine-destegi'                => 'images/svc_technical.jpg',
];

$serviceIcons = [
    'gemi-acenteligi-liman-hizmetleri'        => 'fa-ship',
    'akdeniz-limanlari-terminal-acenteligi'  => 'fa-anchor',
    'turk-bogazlari-gecis-acenteligi'         => 'fa-water',
    'yakit-ve-kumanya-ikmali'                 => 'fa-gas-pump',
    'murettebat-degisimi-kara-lojistigi' => 'fa-users',
    'yuk-ve-konteyner-operasyonlari'     => 'fa-boxes-stacked',
    'teknik-survey-bakim-onarim'         => 'fa-screwdriver-wrench',
    'teknik-ve-makine-destegi'           => 'fa-screwdriver-wrench',
];

// Fallback image list (round-robin for unknown slugs)
$fallbackImages = [
    'images/svc_port_agency.jpg',
    'images/svc_strait_transit.jpg',
    'images/svc_bunkering.jpg',
    'images/svc_crew_change.jpg',
    'images/svc_cargo.jpg',
    'images/svc_technical.jpg',
];
@endphp

@section('styles')
<style>
.svc-list-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}
.svc-list-card {
    background: white;
    border: 1px solid var(--border);
    border-radius: var(--r);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    transition: box-shadow 0.25s, transform 0.25s, border-color 0.25s;
}
.svc-list-card:hover {
    box-shadow: var(--shadow-lg);
    transform: translateY(-4px);
    border-color: #BBDEFB;
}
.svc-list-img {
    aspect-ratio: 16/9;
    overflow: hidden;
    position: relative;
}
.svc-list-img img {
    width: 100%; height: 100%;
    object-fit: cover;
    transition: transform 0.5s;
}
.svc-list-card:hover .svc-list-img img { transform: scale(1.05); }

.svc-list-body { padding: 20px; flex: 1; display: flex; flex-direction: column; }
.svc-list-icon {
    width: 40px; height: 40px;
    background: var(--sky); border-radius: var(--r);
    display: grid; place-items: center;
    color: var(--blue); font-size: 0.95rem;
    margin-bottom: 12px;
}
.svc-list-title {
    font-size: 0.96rem; font-weight: 700;
    color: var(--navy); margin-bottom: 8px;
    line-height: 1.3;
}
.svc-list-desc {
    font-size: 0.82rem; color: var(--muted);
    line-height: 1.65; flex: 1; margin-bottom: 14px;
}
.svc-list-link {
    display: inline-flex; align-items: center; gap: 6px;
    color: var(--blue); font-size: 0.82rem; font-weight: 600;
    transition: gap 0.2s;
}
.svc-list-link:hover { gap: 10px; }

@media(max-width: 1024px) { .svc-list-grid { grid-template-columns: 1fr 1fr; } }
@media(max-width: 640px)  { .svc-list-grid { grid-template-columns: 1fr; } }
</style>
@endsection

@section('content')
<div class="page-hero">
    <div class="container">
        <div class="page-hero-badge"><i class="fa-solid fa-anchor"></i> {{ __t('Hizmetler', 'Services') }}</div>
        <h1>{{ __t('Denizin Her Noktasında Yanınızdayız', 'With You at Every Point of the Sea') }}</h1>
        <p>{{ __t('İskenderun\'dan Antalya\'ya terminal acenteliğinden liman operasyonlarına, bunkeringden mürettebat lojistiğine — eksiksiz deniz acenteliği.', 'From Mediterranean terminal attendance to port operations, bunkering and crew logistics — full maritime agency.') }}</p>
    </div>
</div>

<section class="sec sec-alt">
    <div class="container">
        <div class="svc-list-grid">
            @forelse($services as $index => $service)
            @php
                $imgSrc = null;
                if (!empty($service->image)) {
                    $imgSrc = asset(ltrim($service->image, '/'));
                } elseif (!empty($service->image_path)) {
                    $imgSrc = Storage::url($service->image_path);
                } elseif (isset($serviceImages[$service->slug])) {
                    $imgSrc = asset($serviceImages[$service->slug]);
                } else {
                    $imgSrc = asset($fallbackImages[$index % count($fallbackImages)]);
                }
            @endphp
            <div class="svc-list-card">
                <div class="svc-list-img">
                    <img src="{{ $imgSrc }}" alt="{{ $service->title }}" loading="lazy">
                </div>
                <div class="svc-list-body">
                    <div class="svc-list-icon">
                        <i class="fa-solid {{ $serviceIcons[$service->slug] ?? 'fa-anchor' }}"></i>
                    </div>
                    <div class="svc-list-title">{{ $service->title }}</div>
                    <div class="svc-list-desc">{{ Str::limit($service->short_description ?? $service->summary ?? $service->description, 120) }}</div>
                    <a href="{{ route('services.show', $service->slug) }}" class="svc-list-link">
                        {{ __t('Detaylı İncele', 'View Details') }} <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            @empty
            <div style="grid-column:1/-1;text-align:center;padding:60px 20px;color:var(--muted);">
                <i class="fa-solid fa-anchor" style="font-size:2.5rem;margin-bottom:14px;display:block;color:var(--blue);opacity:0.4;"></i>
                <p>{{ __t('Hizmet bilgileri yükleniyor...', 'Loading services information...') }}</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
