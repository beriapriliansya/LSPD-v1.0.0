<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenalCode;
use App\Models\Officer;
use App\Models\Rule;
use App\Models\WeaponClass;
use App\Models\RadioCode;
use App\Models\PatrolReport;
use App\Models\TacticalProcedure;
use App\Models\IncidentCommand;
use App\Models\LegalProcedure;
use App\Models\CourtVerdict;
use App\Models\PromotionQualification;
use App\Models\Announcement;
use App\Models\ContrabandRate;

class AdminController extends Controller
{
    /**
     * Show Admin Login Page
     */
    public function login()
    {
        if (session('admin_authenticated')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    /**
     * Authenticate Admin PIN / Password
     */
    public function authenticate(Request $request)
    {
        $pin = $request->input('pin');
        
        if ($pin === '110011' || $pin === '71503' || $pin === 'admin' || $pin === '123456') {
            session(['admin_authenticated' => true]);
            return redirect()->route('admin.dashboard')->with('success', 'Selamat datang di LSPD Admin Management Console!');
        }

        return back()->with('error', 'PIN / Password Admin salah! Akses ditolak.');
    }

    /**
     * Logout Admin
     */
    public function logout()
    {
        session()->forget('admin_authenticated');
        return redirect()->route('admin.login')->with('info', 'Anda telah keluar dari Admin Console.');
    }

    /**
     * Dashboard Overview
     */
    public function dashboard()
    {
        $totalPenalCodes = PenalCode::count();
        $totalOfficers = Officer::count();
        $activeOfficers = Officer::where('duty_status', '10-8')->count();
        $totalReports = PatrolReport::count();
        $totalRules = Rule::count();
        $totalTactical = TacticalProcedure::count();
        $recentReports = PatrolReport::latest()->take(5)->get();
        $recentOfficers = Officer::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalPenalCodes',
            'totalOfficers',
            'activeOfficers',
            'totalReports',
            'totalRules',
            'totalTactical',
            'recentReports',
            'recentOfficers'
        ));
    }

    /* =========================================================================
     * 1. PENAL CODES MANAGEMENT
     * ========================================================================= */
    public function penalCodes(Request $request)
    {
        $query = PenalCode::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('code', 'like', "%{$search}%")
                  ->orWhere('title', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        if ($request->filled('type')) {
            $query->where('type', $request->input('type'));
        }

        $allPenalCodes = PenalCode::orderBy('code')->get();
        $penalCodes = $query->orderBy('code')->paginate(20)->withQueryString();
        $categories = PenalCode::distinct()->whereNotNull('category')->pluck('category');
        $groupedPenalCodes = $allPenalCodes->groupBy('category');

        return view('admin.penal_codes', compact('penalCodes', 'allPenalCodes', 'categories', 'groupedPenalCodes'));
    }

    public function storePenalCode(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
            'title' => 'required|string',
            'category' => 'required|string',
            'fine' => 'required|numeric',
            'jail_time' => 'required|numeric',
            'type' => 'required|string',
        ]);

        PenalCode::create($request->all());
        return back()->with('success', 'Pasal Penal Code berhasil ditambahkan!');
    }

    public function storeCategoryCard(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string',
            'code' => 'nullable|string',
            'title' => 'nullable|string',
            'fine' => 'nullable|numeric',
            'jail_time' => 'nullable|numeric',
            'type' => 'nullable|string',
        ]);

        $categoryName = trim($request->input('category_name'));

        if ($request->filled('code') && $request->filled('title')) {
            PenalCode::create([
                'category' => $categoryName,
                'code' => $request->input('code'),
                'title' => $request->input('title'),
                'fine' => $request->input('fine', 1000),
                'jail_time' => $request->input('jail_time', 10),
                'type' => $request->input('type', 'Misdemeanor'),
                'description' => $request->input('description', ''),
            ]);
            return back()->with('success', "Card Kategori '{$categoryName}' berhasil dibuat dan pasal pertama telah ditambahkan!");
        }

        // Dummy/sample code if no code details entered
        PenalCode::create([
            'category' => $categoryName,
            'code' => '(7)' . rand(80, 99),
            'title' => 'DRAFT PASAL BARU - ' . mb_strtoupper($categoryName),
            'fine' => 1000,
            'jail_time' => 10,
            'type' => 'Misdemeanor',
            'description' => 'Pasal awal untuk kategori baru ini. Silakan edit detail pasal.',
        ]);

        return back()->with('success', "Card Kategori '{$categoryName}' berhasil dibuat!");
    }

    public function updatePenalCode(Request $request, $id)
    {
        $pc = PenalCode::findOrFail($id);
        $request->validate([
            'code' => 'required|string',
            'title' => 'required|string',
            'category' => 'required|string',
            'fine' => 'required|numeric',
            'jail_time' => 'required|numeric',
            'type' => 'required|string',
        ]);

        $pc->update($request->all());
        return back()->with('success', 'Pasal Penal Code berhasil diperbarui!');
    }

    public function destroyPenalCode($id)
    {
        PenalCode::findOrFail($id)->delete();
        return back()->with('success', 'Pasal Penal Code berhasil dihapus!');
    }

    /* =========================================================================
     * 2. OFFICERS / PERSONNEL ROSTER
     * ========================================================================= */
    public function officers(Request $request)
    {
        $query = Officer::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('badge_number', 'like', "%{$search}%")
                  ->orWhere('rank', 'like', "%{$search}%")
                  ->orWhere('division', 'like', "%{$search}%");
            });
        }

        if ($request->filled('division')) {
            $query->where('division', $request->input('division'));
        }

        if ($request->filled('duty_status')) {
            $query->where('duty_status', $request->input('duty_status'));
        }

        if ($request->filled('rank')) {
            $query->where('rank', $request->input('rank'));
        }

        $officers = $query->orderBy('badge_number')->paginate(20)->withQueryString();

        $divisions = Officer::distinct()->whereNotNull('division')->pluck('division');
        $ranks = Officer::distinct()->whereNotNull('rank')->pluck('rank');

        return view('admin.officers', compact('officers', 'divisions', 'ranks'));
    }

    public function storeOfficer(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'badge_number' => 'required|string',
            'rank' => 'required|string',
            'division' => 'required|string',
        ]);

        Officer::create($request->all());
        return back()->with('success', 'Petugas LSPD berhasil ditambahkan ke Roster!');
    }

    public function updateOfficer(Request $request, $id)
    {
        $officer = Officer::findOrFail($id);
        $request->validate([
            'name' => 'required|string',
            'badge_number' => 'required|string',
            'rank' => 'required|string',
            'division' => 'required|string',
        ]);

        $officer->update($request->all());
        return back()->with('success', 'Data Petugas berhasil diperbarui!');
    }

    public function destroyOfficer($id)
    {
        Officer::findOrFail($id)->delete();
        return back()->with('success', 'Petugas berhasil dihapus dari Roster!');
    }

    /* =========================================================================
     * 3. PROSEDUR TAKTIS MANAGEMENT
     * ========================================================================= */
    public function tactical()
    {
        $tacticals = TacticalProcedure::latest()->paginate(15);
        return view('admin.tactical', compact('tacticals'));
    }

    public function storeTactical(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'category' => 'required|string',
            'steps' => 'required|string',
        ]);

        TacticalProcedure::create($request->all());
        return back()->with('success', 'Prosedur Taktis berhasil ditambahkan!');
    }

    public function updateTactical(Request $request, $id)
    {
        $tac = TacticalProcedure::findOrFail($id);
        $request->validate([
            'title' => 'required|string',
            'category' => 'required|string',
            'steps' => 'required|string',
        ]);

        $tac->update($request->all());
        return back()->with('success', 'Prosedur Taktis berhasil diperbarui!');
    }

    public function destroyTactical($id)
    {
        TacticalProcedure::findOrFail($id)->delete();
        return back()->with('success', 'Prosedur Taktis berhasil dihapus!');
    }

    /* =========================================================================
     * 4. RULES & SOPS MANAGEMENT
     * ========================================================================= */
    public function rules()
    {
        $rules = Rule::latest()->paginate(15);
        return view('admin.rules', compact('rules'));
    }

    public function storeRule(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'category' => 'required|string',
            'content' => 'required|string',
        ]);

        Rule::create($request->all());
        return back()->with('success', 'Peraturan & SOP berhasil ditambahkan!');
    }

    public function updateRule(Request $request, $id)
    {
        $rule = Rule::findOrFail($id);
        $request->validate([
            'title' => 'required|string',
            'category' => 'required|string',
            'content' => 'required|string',
        ]);

        $rule->update($request->all());
        return back()->with('success', 'Peraturan & SOP berhasil diperbarui!');
    }

    public function destroyRule($id)
    {
        Rule::findOrFail($id)->delete();
        return back()->with('success', 'Peraturan berhasil dihapus!');
    }

    /* =========================================================================
     * 5. WEAPON CLASSES MANAGEMENT
     * ========================================================================= */
    public function weapons()
    {
        $weapons = WeaponClass::all();
        return view('admin.weapons', compact('weapons'));
    }

    public function storeWeapon(Request $request)
    {
        $request->validate([
            'class_name' => 'required|string',
            'allowed_ranks' => 'required|string',
            'allowed_weapons' => 'required|string',
        ]);

        WeaponClass::create($request->all());
        return back()->with('success', 'Klasifikasi Senjata berhasil ditambahkan!');
    }

    public function updateWeapon(Request $request, $id)
    {
        $weapon = WeaponClass::findOrFail($id);
        $request->validate([
            'class_name' => 'required|string',
            'allowed_ranks' => 'required|string',
            'allowed_weapons' => 'required|string',
        ]);

        $weapon->update($request->all());
        return back()->with('success', 'Klasifikasi Senjata berhasil diperbarui!');
    }

    public function destroyWeapon($id)
    {
        WeaponClass::findOrFail($id)->delete();
        return back()->with('success', 'Klasifikasi Senjata berhasil dihapus!');
    }

    /* =========================================================================
     * 6. INCIDENT COMMAND MANAGEMENT
     * ========================================================================= */
    public function incidentCommands()
    {
        $incidents = IncidentCommand::all();
        return view('admin.incidents', compact('incidents'));
    }

    public function storeIncidentCommand(Request $request)
    {
        $request->validate([
            'role_name' => 'required|string',
            'rank_required' => 'required|string',
            'responsibilities' => 'required|string',
        ]);

        IncidentCommand::create($request->all());
        return back()->with('success', 'Struktur Incident Command berhasil ditambahkan!');
    }

    public function updateIncidentCommand(Request $request, $id)
    {
        $incident = IncidentCommand::findOrFail($id);
        $request->validate([
            'role_name' => 'required|string',
            'rank_required' => 'required|string',
            'responsibilities' => 'required|string',
        ]);

        $incident->update($request->all());
        return back()->with('success', 'Struktur Incident Command berhasil diperbarui!');
    }

    public function destroyIncidentCommand($id)
    {
        IncidentCommand::findOrFail($id)->delete();
        return back()->with('success', 'Struktur Incident Command berhasil dihapus!');
    }

    /* =========================================================================
     * 7. PROSES HUKUM & COURT VERDICT MANAGEMENT
     * ========================================================================= */
    public function legalProcedures()
    {
        $legals = LegalProcedure::orderBy('step_number')->get();
        $verdicts = CourtVerdict::orderBy('step_number')->get();
        return view('admin.legals', compact('legals', 'verdicts'));
    }

    public function storeLegalProcedure(Request $request)
    {
        $request->validate([
            'stage_name' => 'required|string',
            'guideline_text' => 'required|string',
        ]);

        LegalProcedure::create($request->all());
        return back()->with('success', 'Tahapan Proses Hukum berhasil ditambahkan!');
    }

    public function updateLegalProcedure(Request $request, $id)
    {
        $legal = LegalProcedure::findOrFail($id);
        $request->validate([
            'stage_name' => 'required|string',
            'guideline_text' => 'required|string',
        ]);

        $legal->update($request->all());
        return back()->with('success', 'Tahapan Proses Hukum berhasil diperbarui!');
    }

    public function destroyLegalProcedure($id)
    {
        LegalProcedure::findOrFail($id)->delete();
        return back()->with('success', 'Tahapan Proses Hukum berhasil dihapus!');
    }

    /* =========================================================================
     * 8. PROMOSI JABATAN MANAGEMENT
     * ========================================================================= */
    public function promotions()
    {
        $promotions = PromotionQualification::all();
        return view('admin.promotions', compact('promotions'));
    }

    public function storePromotion(Request $request)
    {
        $request->validate([
            'from_rank' => 'required|string',
            'to_rank' => 'required|string',
            'requirements_list' => 'required|string',
        ]);

        PromotionQualification::create($request->all());
        return back()->with('success', 'Kualifikasi Promosi berhasil ditambahkan!');
    }

    public function updatePromotion(Request $request, $id)
    {
        $promotion = PromotionQualification::findOrFail($id);
        $request->validate([
            'from_rank' => 'required|string',
            'to_rank' => 'required|string',
            'requirements_list' => 'required|string',
        ]);

        $promotion->update($request->all());
        return back()->with('success', 'Kualifikasi Promosi berhasil diperbarui!');
    }

    public function destroyPromotion($id)
    {
        PromotionQualification::findOrFail($id)->delete();
        return back()->with('success', 'Kualifikasi Promosi berhasil dihapus!');
    }

    /* =========================================================================
     * 9. PATROL REPORTS MANAGEMENT
     * ========================================================================= */
    public function reports()
    {
        $reports = PatrolReport::latest()->paginate(15);
        return view('admin.reports', compact('reports'));
    }

    public function destroyReport($id)
    {
        PatrolReport::findOrFail($id)->delete();
        return back()->with('success', 'Laporan Patroli berhasil dihapus!');
    }
}
