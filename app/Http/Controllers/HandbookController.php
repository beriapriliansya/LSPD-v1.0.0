<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenalCode;
use App\Models\Officer;
use App\Models\Rule;
use App\Models\WeaponClass;
use App\Models\RadioCode;
use App\Models\TacticalProcedure;
use App\Models\IncidentCommand;
use App\Models\LegalProcedure;
use App\Models\CourtVerdict;
use App\Models\PromotionQualification;

class HandbookController extends Controller
{
    /**
     * Display the main LSPD Handbook MDC dashboard.
     */
    public function index()
    {
        $penalCodes = PenalCode::orderBy('code')->get();
        $officers = Officer::orderBy('badge_number')->get();
        $rules = Rule::all();
        $weaponClasses = WeaponClass::all();
        $radioCodes = RadioCode::all();
        $tacticals = TacticalProcedure::all();
        $incidents = IncidentCommand::all();
        $legals = LegalProcedure::orderBy('step_number')->get();
        $verdicts = CourtVerdict::orderBy('step_number')->get();
        $promotions = PromotionQualification::all();

        return view('handbook', compact(
            'penalCodes',
            'officers',
            'rules',
            'weaponClasses',
            'radioCodes',
            'tacticals',
            'incidents',
            'legals',
            'verdicts',
            'promotions'
        ));
    }

    /**
     * API: Get Penal Codes JSON
     */
    public function getPenalCodes()
    {
        return response()->json(PenalCode::orderBy('code')->get());
    }

    /**
     * API: Get Officers / Chain of Command JSON
     */
    public function getOfficers()
    {
        return response()->json(Officer::orderBy('badge_number')->get());
    }

    /**
     * API: Get Rules JSON
     */
    public function getRules()
    {
        return response()->json(Rule::all());
    }

    /**
     * API: Get Weapon Classes JSON
     */
    public function getWeaponClasses()
    {
        return response()->json(WeaponClass::all());
    }

    /**
     * API: Get Radio Codes JSON
     */
    public function getRadioCodes()
    {
        return response()->json(RadioCode::all());
    }

    /**
     * API: Get Tactical Procedures JSON
     */
    public function getTacticals()
    {
        return response()->json(TacticalProcedure::all());
    }

    /**
     * API: Get Incident Commands JSON
     */
    public function getIncidents()
    {
        return response()->json(IncidentCommand::all());
    }

    /**
     * API: Get Legal Procedures & Verdicts JSON
     */
    public function getLegals()
    {
        return response()->json([
            'procedures' => LegalProcedure::orderBy('step_number')->get(),
            'verdicts' => CourtVerdict::orderBy('step_number')->get()
        ]);
    }

    /**
     * API: Get Promotion Qualifications JSON
     */
    public function getPromotions()
    {
        return response()->json(PromotionQualification::all());
    }
}
