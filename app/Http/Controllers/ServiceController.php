<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ServiceController extends Controller
{
    public function index()
    {
        if (SiteSetting::get('page_services_active', '1') !== '1') {
            abort(404);
        }
        $query = Service::query();
        if (Schema::hasTable('services')) {
            if (Schema::hasColumn('services', 'is_active')) {
                $query->where('is_active', true);
            }
            if (Schema::hasColumn('services', 'sort_order')) {
                $query->orderBy('sort_order');
            }
            $services = $query->get();
        } else {
            $services = collect();
        }

        return view('services.index', compact('services'));
    }

    public function show($slug)
    {
        if (SiteSetting::get('page_services_active', '1') !== '1') {
            abort(404);
        }
        $aliases = [
            'teknik-ve-makine-destegi' => 'teknik-survey-bakim-onarim',
        ];

        $targetSlug = $aliases[$slug] ?? $slug;

        $serviceQuery = Service::where('slug', $targetSlug);
        if (Schema::hasColumn('services', 'is_active')) {
            $serviceQuery->where('is_active', true);
        }
        $service = $serviceQuery->first();

        if (!$service) {
            $fallbackQuery = Service::where('slug', $slug);
            if (Schema::hasColumn('services', 'is_active')) {
                $fallbackQuery->where('is_active', true);
            }
            $service = $fallbackQuery->first();
        }

        if (!$service) {
            $service = Service::firstOrFail();
        }

        $allQuery = Service::query();
        if (Schema::hasColumn('services', 'is_active')) {
            $allQuery->where('is_active', true);
        }
        $services = $allQuery->get();

        return view('services.show', compact('service', 'services'));
    }
}
