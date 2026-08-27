<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class AboutAdminController extends Controller
{
    public function index()
    {
        $settings = [
            'about_hero_title'  => SiteSetting::get('about_hero_title', 'NAVEXMAR Hakkında'),
            'about_hero_desc'   => SiteSetting::get('about_hero_desc', 'Türk Boğazları ve Türkiye limanlarında 2006\'dan bu yana faaliyet gösteren köklü gemi acenteliği.'),
            'about_mission'     => SiteSetting::get('about_mission', '2006 yılında İstanbul\'da kurulan NAVEXMAR...'),
            'about_mission_2'   => SiteSetting::get('about_mission_2', 'BIMCO ve FONASBA üyeliği ile...'),
            'about_exp_years'   => SiteSetting::get('about_exp_years', '18+'),
            'about_calls_cnt'   => SiteSetting::get('about_calls_cnt', '4K+'),
            'about_ports_cnt'   => SiteSetting::get('about_ports_cnt', '9'),
            'about_watch_cnt'   => SiteSetting::get('about_watch_cnt', '24/7'),
            
            // Timeline
            'tl_2006_title' => SiteSetting::get('tl_2006_title', 'Kuruluş — İstanbul'),
            'tl_2006_desc'  => SiteSetting::get('tl_2006_desc', 'İstanbul merkezli acentelik faaliyeti başladı.'),
            'tl_2009_title' => SiteSetting::get('tl_2009_title', 'Ambarlı ve İzmit Ofisleri'),
            'tl_2009_desc'  => SiteSetting::get('tl_2009_desc', 'Operasyon ağımıza yeni ofisler eklendi.'),
            'tl_2012_title' => SiteSetting::get('tl_2012_title', 'FONASBA Standartları'),
            'tl_2012_desc'  => SiteSetting::get('tl_2012_desc', 'Uluslararası kalite ve acentelik standartları tescillendi.'),
            'tl_2016_title' => SiteSetting::get('tl_2016_title', 'İzmir & Mersin Büroları'),
            'tl_2016_desc'  => SiteSetting::get('tl_2016_desc', 'Ege ve Akdeniz limanları kapsama alındı.'),
            'tl_2021_title' => SiteSetting::get('tl_2021_title', 'Dijital Dönüşüm'),
            'tl_2021_desc'  => SiteSetting::get('tl_2021_desc', 'Dijital DA/CA ve anlık gemi takip platformu.'),
            'tl_2024_title' => SiteSetting::get('tl_2024_title', 'Trabzon & Karadeniz'),
            'tl_2024_desc'  => SiteSetting::get('tl_2024_desc', 'Karadeniz transit geçiş operasyonları.'),
            
            // Team
            'team_1_name' => SiteSetting::get('team_1_name', 'Mehmet Kaya'),
            'team_1_role' => SiteSetting::get('team_1_role', 'Genel Müdür & Kurucu'),
            'team_1_bio'  => SiteSetting::get('team_1_bio', '22 yıllık denizcilik tecrübesi.'),
            'team_2_name' => SiteSetting::get('team_2_name', 'Ayşe Demir'),
            'team_2_role' => SiteSetting::get('team_2_role', 'Operasyon Direktörü'),
            'team_2_bio'  => SiteSetting::get('team_2_bio', '15 yıldır liman operasyonları uzmanı.'),
            'team_3_name' => SiteSetting::get('team_3_name', 'Ali Yılmaz'),
            'team_3_role' => SiteSetting::get('team_3_role', 'Finans & Disbursement'),
            'team_3_bio'  => SiteSetting::get('team_3_bio', '12 yıllık da/ca raporlama tecrübesi.'),
        ];

        return view('admin.about.index', compact('settings'));
    }

    public function update(Request $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            SiteSetting::set($key, $value);
        }

        return redirect()->back()->with('success', 'Hakkımızda sayfası içerikleri başarıyla güncellendi.');
    }
}
