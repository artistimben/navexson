@extends('layouts.admin')

@section('title', 'Site Ayarları - NAVEXMAR Admin')
@section('header_title', 'Genel Site Ayarları & İletişim Bilgileri')

@section('content')

    <div class="admin-card" style="max-width: 950px;">
        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            
            {{-- İletişim Bilgileri --}}
            <h4 style="font-size: 0.95rem; font-weight: 700; color: var(--adm-primary); margin-bottom: 16px; padding-bottom: 8px; border-bottom: 1px solid var(--adm-border);">
                <i class="fa-solid fa-phone"></i> İletişim & Santral Bilgileri
            </h4>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="admin-form-group">
                    <label class="admin-form-label">Santral Telefonu</label>
                    <input type="text" name="phone" class="admin-form-control" value="{{ old('phone', $settings['phone']) }}">
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">7/24 Nöbetçi Telefon / WhatsApp</label>
                    <input type="text" name="mobile" class="admin-form-control" value="{{ old('mobile', $settings['mobile']) }}">
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">Kurumsal E-Posta</label>
                    <input type="email" name="email" class="admin-form-control" value="{{ old('email', $settings['email']) }}">
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">Çalışma Saatleri Metni</label>
                    <input type="text" name="working_hours" class="admin-form-control" value="{{ old('working_hours', $settings['working_hours'] ?? '08:00 – 18:00') }}">
                </div>
            </div>

            <div class="admin-form-group">
                <label class="admin-form-label">Genel Merkez Adresi</label>
                <textarea name="address" class="admin-form-control" rows="2">{{ old('address', $settings['address']) }}</textarea>
            </div>

            <div class="admin-form-group">
                <label class="admin-form-label">Kısa Kurumsal Özet (Footer Metni)</label>
                <textarea name="about_short" class="admin-form-control" rows="2">{{ old('about_short', $settings['about_short']) }}</textarea>
            </div>

            {{-- Ana Sayfa Hero Metinleri --}}
            <h4 style="font-size: 0.95rem; font-weight: 700; color: var(--adm-primary); margin: 28px 0 16px; padding-bottom: 8px; border-bottom: 1px solid var(--adm-border);">
                <i class="fa-solid fa-house"></i> Ana Sayfa Hero Metinleri
            </h4>
            <div class="admin-form-group">
                <label class="admin-form-label">Hero Slogan / Badge Metni</label>
                <input type="text" name="hero_badge" class="admin-form-control" value="{{ old('hero_badge', $settings['hero_badge'] ?? '7/24 Operasyon Hattı Aktif') }}">
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Hero Ana Başlık</label>
                <input type="text" name="hero_title" class="admin-form-control" value="{{ old('hero_title', $settings['hero_title'] ?? 'İskenderun\'dan Antalya\'ya Güvenilir Gemi Acenteniz') }}">
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Hero Alt Açıklama Metni</label>
                <textarea name="hero_desc" class="admin-form-control" rows="2">{{ old('hero_desc', $settings['hero_desc'] ?? 'İskenderun, Mersin ve Antalya başta olmak üzere tüm Türkiye limanlarında 7/24 profesyonel acentelik.') }}</textarea>
            </div>

            {{-- Sayfa Yönetimi --}}
            <h4 style="font-size: 0.95rem; font-weight: 700; color: var(--adm-primary); margin: 28px 0 16px; padding-bottom: 8px; border-bottom: 1px solid var(--adm-border);">
                <i class="fa-solid fa-file-lines"></i> Sayfa Aktiflik Yönetimi
            </h4>
            <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 28px;">
                <div class="admin-form-group">
                    <label class="admin-form-label" style="display: flex; align-items: center; gap: 8px; cursor: pointer; color: var(--adm-primary);">
                        <input type="checkbox" name="page_about_active" value="1" {{ ($settings['page_about_active'] ?? '1') == '1' ? 'checked' : '' }} style="width: auto;"> Hakkımızda Sayfası
                    </label>
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label" style="display: flex; align-items: center; gap: 8px; cursor: pointer; color: var(--adm-primary);">
                        <input type="checkbox" name="page_services_active" value="1" {{ ($settings['page_services_active'] ?? '1') == '1' ? 'checked' : '' }} style="width: auto;"> Hizmetler Sayfası
                    </label>
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label" style="display: flex; align-items: center; gap: 8px; cursor: pointer; color: var(--adm-primary);">
                        <input type="checkbox" name="page_news_active" value="1" {{ ($settings['page_news_active'] ?? '1') == '1' ? 'checked' : '' }} style="width: auto;"> Haberler Sayfası
                    </label>
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label" style="display: flex; align-items: center; gap: 8px; cursor: pointer; color: var(--adm-primary);">
                        <input type="checkbox" name="page_contact_active" value="1" {{ ($settings['page_contact_active'] ?? '1') == '1' ? 'checked' : '' }} style="width: auto;"> İletişim Sayfası
                    </label>
                </div>
            </div>

            {{-- Sosyal Medya --}}
            <h4 style="font-size: 0.95rem; font-weight: 700; color: var(--adm-primary); margin: 28px 0 16px; padding-bottom: 8px; border-bottom: 1px solid var(--adm-border);">
                <i class="fa-solid fa-share-nodes"></i> Sosyal Medya Bağlantıları
            </h4>
            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px;">
                <div class="admin-form-group">
                    <label class="admin-form-label">LinkedIn URL</label>
                    <input type="text" name="linkedin" class="admin-form-control" value="{{ old('linkedin', $settings['linkedin']) }}">
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">Facebook URL</label>
                    <input type="text" name="facebook" class="admin-form-control" value="{{ old('facebook', $settings['facebook']) }}">
                </div>
                <div class="admin-form-group">
                    <label class="admin-form-label">Instagram URL</label>
                    <input type="text" name="instagram" class="admin-form-control" value="{{ old('instagram', $settings['instagram']) }}">
                </div>
            </div>

            <div style="margin-top: 28px;">
                <button type="submit" class="btn-submit"><i class="fa-solid fa-save"></i> Tüm Ayarları Kaydet</button>
            </div>
        </form>
    </div>

@endsection
