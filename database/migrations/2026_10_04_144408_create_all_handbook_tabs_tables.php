<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Prosedur Taktis Table
        Schema::create('tactical_procedures', function (Blueprint $table) {
            $table->id();
            $table->string('category')->default('General'); // Traffic Stop, Pursuit, Felony Stop, Active Shooter
            $table->string('title');
            $table->text('steps');
            $table->text('rules')->nullable();
            $table->timestamps();
        });

        // 2. Incident Command Structure Table
        Schema::create('incident_commands', function (Blueprint $table) {
            $table->id();
            $table->string('role_name');
            $table->string('rank_required');
            $table->text('responsibilities');
            $table->text('sop_guidelines')->nullable();
            $table->timestamps();
        });

        // 3. Proses Hukum Steps Table
        Schema::create('legal_procedures', function (Blueprint $table) {
            $table->id();
            $table->integer('step_number')->default(1);
            $table->string('stage_name'); // Arrest, Miranda, Searching, MDT Booking, Detention
            $table->text('guideline_text');
            $table->timestamps();
        });

        // 4. Alur Court Verdict Table
        Schema::create('court_verdicts', function (Blueprint $table) {
            $table->id();
            $table->integer('step_number')->default(1);
            $table->string('case_type')->default('Court Trial'); // Judicial, Mediation, Appeal
            $table->string('stage_name');
            $table->text('description');
            $table->text('required_evidence')->nullable();
            $table->timestamps();
        });

        // 5. Kualifikasi Promosi Table
        Schema::create('promotion_qualifications', function (Blueprint $table) {
            $table->id();
            $table->string('from_rank');
            $table->string('to_rank');
            $table->string('category_type')->default('Administrative'); // Administrative, Performance, Examination
            $table->text('requirements_list');
            $table->timestamps();
        });

        // 6. Beranda Announcements Table
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('type')->default('Notice'); // Notice, Urgent, Update
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 7. Contraband Rates / Kalkulator Settings Table
        Schema::create('contraband_rates', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->integer('fine_per_unit')->default(0);
            $table->integer('jail_per_unit')->default(0);
            $table->string('category')->default('Contraband'); // Narcotics, Ammunition, Money, Hostage
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contraband_rates');
        Schema::dropIfExists('announcements');
        Schema::dropIfExists('promotion_qualifications');
        Schema::dropIfExists('court_verdicts');
        Schema::dropIfExists('legal_procedures');
        Schema::dropIfExists('incident_commands');
        Schema::dropIfExists('tactical_procedures');
    }
};
