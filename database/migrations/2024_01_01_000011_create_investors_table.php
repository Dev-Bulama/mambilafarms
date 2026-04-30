<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('investors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('reference_number')->unique();
            $table->string('full_name');
            $table->date('date_of_birth');
            $table->string('bvn_rc_number');
            $table->string('tax_id')->nullable();
            $table->string('phone_primary');
            $table->string('phone_alternate')->nullable();
            $table->text('address');
            $table->string('city_state')->nullable();
            $table->string('country');
            $table->string('communication_prefs')->nullable();
            $table->enum('investor_type', ['Individual Investor','Corporate or Institutional Investor','Joint Investor','Foreign Investor','Diaspora Investor']);
            $table->enum('tier', ['Starter','Bronze','Silver','Gold','Platinum','Diamond','Custom']);
            $table->string('custom_amount')->nullable();
            $table->string('payment_method')->default('Bank Transfer');
            $table->text('notes')->nullable();
            $table->enum('status', ['pending','approved','active','suspended','completed'])->default('pending');
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('investors'); }
};
