<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\QuoteRequest;
use App\Models\Service;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        if (SiteSetting::get('page_contact_active', '1') !== '1') {
            abort(404);
        }
        $services = Service::where('is_active', true)->get();
        return view('contact', compact('services'));
    }

    public function sendContact(Request $request)
    {
        if (SiteSetting::get('page_contact_active', '1') !== '1') {
            abort(404);
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        ContactMessage::create($validated);

        return redirect()->back()->with('success', 'Mesajınız başarıyla iletildi. En kısa sürede sizinle iletişime geçeceğiz.');
    }

    public function sendQuote(Request $request)
    {
        if (SiteSetting::get('page_contact_active', '1') !== '1') {
            abort(404);
        }
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'vessel_name' => 'required|string|max:255',
            'vessel_type' => 'required|string|max:255',
            'grt' => 'nullable|integer',
            'port_or_strait' => 'required|string|max:255',
            'eta_date' => 'nullable|string',
            'requested_services' => 'nullable|array',
            'notes' => 'nullable|string',
        ]);

        QuoteRequest::create($validated);

        return redirect()->back()->with('quote_success', 'Acentelik / Navlun teklif talebiniz alınmıştır! Operasyon ekibimiz 2 saat içinde detaylı CTP / Proforma maliyet teklifinizi iletecektir.');
    }
}
