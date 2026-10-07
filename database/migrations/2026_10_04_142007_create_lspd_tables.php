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
        // 1. Penal Codes Table
        Schema::create('penal_codes', function (Blueprint $table) {
            $table->id();
            $table->string('category')->default('General');
            $table->string('code')->index(); // e.g. (7)19
            $table->string('title');
            $table->integer('fine')->default(0);
            $table->integer('jail_time')->default(0); // in months
            $table->string('license_action')->nullable(); // e.g. Revoke License / impound
            $table->string('type')->default('Misdemeanor'); // Misdemeanor / Felony / Court Verdict
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // 2. Personnel / Officers Table
        Schema::create('officers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('badge_number')->unique();
            $table->string('rank');
            $table->string('division')->default('Patrol');
            $table->string('duty_status')->default('10-8');
            $table->string('phone_number')->nullable();
            $table->string('avatar_url')->nullable();
            $table->timestamps();
        });

        // 3. Operational Rules Table
        Schema::create('rules', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('title');
            $table->text('content');
            $table->string('importance')->default('Standard'); // Standard, High, Critical
            $table->timestamps();
        });

        // 4. Weapon Classes Table
        Schema::create('weapon_classes', function (Blueprint $table) {
            $table->id();
            $table->string('class_name');
            $table->string('allowed_ranks');
            $table->text('allowed_weapons');
            $table->text('rules')->nullable();
            $table->timestamps();
        });

        // 5. Radio Codes Table
        Schema::create('radio_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('meaning');
            $table->string('category')->default('10-Codes');
            $table->timestamps();
        });

        // 6. Patrol Reports Archive Table
        Schema::create('patrol_reports', function (Blueprint $table) {
            $table->id();
            $table->string('officer_name');
            $table->string('badge_number');
            $table->string('station')->default('71');
            $table->string('rank')->default('Rookie');
            $table->string('incident_date');
            $table->text('incident_details');
            $table->text('bbcode_output')->nullable();
            $table->string('status')->default('Approved');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patrol_reports');
        Schema::dropIfExists('radio_codes');
        Schema::dropIfExists('weapon_classes');
        Schema::dropIfExists('rules');
        Schema::dropIfExists('officers');
        Schema::dropIfExists('penal_codes');
    }
};
