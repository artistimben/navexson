<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'NAVEXMAR Admin Panel')</title>
    
    <link rel="icon" type="image/jpeg" href="{{ asset('images/artisan.jpeg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        :root {
            --adm-bg: #F8FAFC;
            --adm-sidebar: #0F172A;
            --adm-sidebar-hover: #1E293B;
            --adm-card: #FFFFFF;
            --adm-primary: #2563EB;
            --adm-primary-hover: #1D4ED8;
            --adm-accent: #0284C7;
            --adm-text: #0F172A;
            --adm-muted: #64748B;
            --adm-border: #E2E8F0;
            --adm-border-dark: #334155;
            --adm-success: #10B981;
            --adm-warning: #F59E0B;
            --adm-danger: #EF4444;
            --adm-radius: 12px;
            --adm-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05), 0 1px 2px -1px rgba(0, 0, 0, 0.05);
            --adm-shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.07), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--adm-bg);
            color: var(--adm-text);
            display: flex;
            min-height: 100vh;
            font-size: 0.92rem;
            line-height: 1.5;
            -webkit-font-smoothing: antialiased;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background-color: var(--adm-sidebar);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0; bottom: 0; left: 0;
            z-index: 100;
            overflow-y: auto;
            border-right: 1px solid rgba(255,255,255,0.05);
        }

        .sidebar-brand {
            padding: 22px 20px;
            font-size: 1.15rem;
            font-weight: 800;
            color: #FFFFFF;
            display: flex;
            align-items: center;
            gap: 10px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            letter-spacing: -0.2px;
        }
        .sidebar-brand i { color: #38BDF8; font-size: 1.3rem; }

        .sidebar-section-title {
            font-size: 0.66rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            color: #64748B;
            padding: 22px 20px 8px;
        }

        .sidebar-menu {
            list-style: none;
            padding: 8px 12px 24px;
        }

        .sidebar-item { margin-bottom: 3px; }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
            color: #94A3B8;
            font-weight: 600;
            font-size: 0.86rem;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.15s ease;
        }

        .sidebar-link:hover {
            background-color: var(--adm-sidebar-hover);
            color: #F8FAFC;
        }

        .sidebar-link.active {
            background-color: var(--adm-primary);
            color: #FFFFFF;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.35);
        }

        .sidebar-link.active i { color: #FFFFFF; }
        .sidebar-link i { font-size: 1rem; width: 20px; text-align: center; }

        .badge-count {
            margin-left: auto;
            background: #EF4444;
            color: #FFFFFF;
            font-size: 0.72rem;
            font-weight: 800;
            padding: 2px 8px;
            border-radius: 99px;
        }

        /* Main Area */
        .main-wrapper {
            margin-left: 260px;
            flex: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        /* Topbar */
        .topbar {
            height: 64px;
            background-color: #FFFFFF;
            border-bottom: 1px solid var(--adm-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 32px;
            position: sticky;
            top: 0;
            z-index: 90;
            box-shadow: 0 1px 2px 0 rgba(0,0,0,0.03);
        }

        .topbar-title {
            font-weight: 700;
            font-size: 1.1rem;
            color: var(--adm-text);
            letter-spacing: -0.3px;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .user-avatar {
            width: 36px; height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--adm-primary), #0284C7);
            display: flex; align-items: center; justify-content: center;
            font-weight: 800; color: #FFFFFF;
            font-size: 0.9rem;
            box-shadow: 0 2px 6px rgba(37, 99, 235, 0.25);
        }

        .logout-btn {
            background: #FEF2F2;
            color: var(--adm-danger);
            border: 1px solid #FCA5A5;
            padding: 7px 14px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.82rem;
            cursor: pointer;
            display: flex; align-items: center; gap: 6px;
            transition: all 0.15s ease;
        }
        .logout-btn:hover { background: var(--adm-danger); color: #FFFFFF; border-color: var(--adm-danger); }

        /* Admin Lang Switcher */
        .adm-lang-switcher {
            display: inline-flex;
            align-items: center;
            gap: 2px;
            background: #F1F5F9;
            border: 1px solid #CBD5E1;
            padding: 3px 6px;
            border-radius: 8px;
            font-size: 0.74rem;
            font-weight: 700;
        }
        .adm-lang-btn {
            color: #64748B;
            padding: 3px 8px;
            border-radius: 6px;
            text-decoration: none;
            transition: all 0.15s ease;
        }
        .adm-lang-btn:hover { color: #0F172A; }
        .adm-lang-btn.active {
            color: #FFFFFF;
            background: var(--adm-primary);
        }

        /* Content Body */
        .content-body { padding: 32px; flex: 1; }

        .alert-success {
            background: #ECFDF5;
            border: 1px solid #A7F3D0;
            color: #065F46;
            padding: 14px 20px;
            border-radius: 10px;
            margin-bottom: 24px;
            display: flex; align-items: center; gap: 10px;
            font-weight: 500;
        }

        .alert-danger {
            background: #FEF2F2;
            border: 1px solid #FECACA;
            color: #991B1B;
            padding: 14px 20px;
            border-radius: 10px;
            margin-bottom: 24px;
            font-weight: 500;
        }

        /* Generic Card Container */
        .admin-card {
            background: var(--adm-card);
            border: 1px solid var(--adm-border);
            border-radius: var(--adm-radius);
            box-shadow: var(--adm-shadow);
            padding: 28px;
        }

        /* Generic Table Styling */
        .admin-table-container {
            background-color: var(--adm-card);
            border: 1px solid var(--adm-border);
            border-radius: var(--adm-radius);
            box-shadow: var(--adm-shadow);
            overflow: hidden;
        }

        .admin-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 0.88rem;
        }

        .admin-table th {
            background-color: #F8FAFC;
            padding: 14px 20px;
            color: var(--adm-muted);
            font-weight: 700;
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid var(--adm-border);
        }

        .admin-table td {
            padding: 16px 20px;
            border-bottom: 1px solid var(--adm-border);
            color: var(--adm-text);
        }

        .admin-table tr:last-child td { border-bottom: none; }
        .admin-table tr:hover td { background-color: #F1F5F9; }

        .btn-action {
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex; align-items: center; gap: 5px;
            border: none; cursor: pointer;
            transition: all 0.15s ease;
        }

        .btn-edit { background: #E0F2FE; color: #0284C7; }
        .btn-edit:hover { background: #0284C7; color: #FFFFFF; }
        
        .btn-delete { background: #FEE2E2; color: #EF4444; }
        .btn-delete:hover { background: #EF4444; color: #FFFFFF; }

        .btn-view { background: #EFF6FF; color: #2563EB; }
        .btn-view:hover { background: #2563EB; color: #FFFFFF; }

        /* Form Styling */
        .admin-form-group { margin-bottom: 20px; }
        
        .admin-form-label {
            display: block;
            font-weight: 600;
            font-size: 0.86rem;
            margin-bottom: 7px;
            color: #334155;
        }

        .admin-form-control {
            width: 100%;
            padding: 11px 15px;
            background: #FFFFFF;
            border: 1px solid #CBD5E1;
            border-radius: 8px;
            color: #0F172A;
            font-family: inherit;
            font-size: 0.9rem;
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
        }

        .admin-form-control:focus {
            outline: none;
            border-color: var(--adm-primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
        }

        .btn-submit {
            background: var(--adm-primary);
            color: #FFFFFF;
            padding: 11px 24px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 0.88rem;
            border: none;
            cursor: pointer;
            display: inline-flex; align-items: center; gap: 8px;
            transition: background 0.15s ease, transform 0.15s ease, box-shadow 0.15s ease;
            box-shadow: 0 2px 4px rgba(37, 99, 235, 0.2);
        }
        .btn-submit:hover {
            background: var(--adm-primary-hover);
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(37, 99, 235, 0.3);
        }
    </style>
    @yield('styles')
</head>
<body>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-brand" style="display:flex; align-items:center; gap:10px;">
            <img src="{{ asset('images/artisan.jpeg') }}" alt="NAVEX Logo" style="height: 36px; width: 36px; object-fit: cover; border-radius: 8px;">
            <span>NAVEXMAR</span>
            <span style="font-size:0.75rem; color:#94A3B8; font-weight:600; margin-left: auto;">{{ __t('PANEL', 'ADMIN') }}</span>
        </div>

        <ul class="sidebar-menu">
            <!-- Genel -->
            <li class="sidebar-item">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-chart-pie"></i> Dashboard
                </a>
            </li>

            <!-- Talepler -->
            <div class="sidebar-section-title">{{ __t('Talepler & Mesajlar', 'Inquiries & Messages') }}</div>
            <li class="sidebar-item">
                <a href="{{ route('admin.quotes.index') }}" class="sidebar-link {{ request()->routeIs('admin.quotes.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-calculator"></i> {{ __t('Teklif Talepleri', 'Quote Requests') }}
                    @php $newQuotes = \App\Models\QuoteRequest::where('status', 'Yeni')->count(); @endphp
                    @if($newQuotes > 0)
                        <span class="badge-count">{{ $newQuotes }}</span>
                    @endif
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.messages.index') }}" class="sidebar-link {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-envelope"></i> {{ __t('Gelen Mesajlar', 'Inbox Messages') }}
                    @php $unread = \App\Models\ContactMessage::where('is_read', false)->count(); @endphp
                    @if($unread > 0)
                        <span class="badge-count">{{ $unread }}</span>
                    @endif
                </a>
            </li>

            <!-- İçerik Yönetimi -->
            <div class="sidebar-section-title">{{ __t('İçerik Yönetimi', 'Content Management') }}</div>
            <li class="sidebar-item">
                <a href="{{ route('admin.services.index') }}" class="sidebar-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-anchor"></i> {{ __t('Hizmetler', 'Services') }}
                </a>
            </li>

            <li class="sidebar-item">
                <a href="{{ route('admin.news.index') }}" class="sidebar-link {{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-newspaper"></i> {{ __t('Haber & Duyurular', 'News & Bulletins') }}
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.about.index') }}" class="sidebar-link {{ request()->routeIs('admin.about.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-building"></i> {{ __t('Hakkımızda Sayfası', 'About Page') }}
                </a>
            </li>

            <li class="sidebar-item">
                <a href="{{ route('admin.gallery.index') }}" class="sidebar-link {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-images"></i> {{ __t('Görsel Galerisi', 'Media Gallery') }}
                </a>
            </li>

            <!-- Sistem -->
            <div class="sidebar-section-title">{{ __t('Sistem Ayarları', 'System Settings') }}</div>
            <li class="sidebar-item">
                <a href="{{ route('admin.settings.index') }}" class="sidebar-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-gears"></i> {{ __t('Genel Site Ayarları', 'Site Settings') }}
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.profile.index') }}" class="sidebar-link {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-user-gear"></i> {{ __t('Profil / Şifre', 'Profile / Password') }}
                </a>
            </li>

            <li class="sidebar-item" style="margin-top: 24px;">
                <a href="{{ route('home') }}" target="_blank" class="sidebar-link" style="color: #38BDF8; background: rgba(56, 189, 248, 0.1);">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i> {{ __t('Siteyi Görüntüle', 'View Main Site') }}
                </a>
            </li>
        </ul>
    </aside>

    <!-- Main Content Area -->
    <div class="main-wrapper">
        <header class="topbar">
            <div>
                <h3 class="topbar-title">@yield('header_title', __t('Yönetim Paneli', 'Admin Dashboard'))</h3>
            </div>
            <div class="user-menu">
                {{-- Admin Language Switcher --}}
                <div class="adm-lang-switcher">
                    <a href="{{ route('lang.switch', 'tr') }}" class="adm-lang-btn {{ app()->getLocale() === 'tr' ? 'active' : '' }}">TR</a>
                    <a href="{{ route('lang.switch', 'en') }}" class="adm-lang-btn {{ app()->getLocale() === 'en' ? 'active' : '' }}">EN</a>
                </div>

                <div style="text-align: right;">
                    <div style="font-weight: 700; font-size: 0.88rem; color: var(--adm-text);">{{ Auth::user()->name ?? 'Yönetici' }}</div>
                    <div style="font-size: 0.75rem; color: var(--adm-muted);">{{ Auth::user()->email ?? '' }}</div>
                </div>
                <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name ?? 'N', 0, 1)) }}</div>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fa-solid fa-right-from-bracket"></i> {{ __t('Çıkış', 'Logout') }}
                    </button>
                </form>
            </div>
        </header>

        <div class="content-body">
            @if(session('success'))
                <div class="alert-success">
                    <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert-danger">
                    <ul style="margin-left: 20px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    @yield('scripts')
</body>
</html>
