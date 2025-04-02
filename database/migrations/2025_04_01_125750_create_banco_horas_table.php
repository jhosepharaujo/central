<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Trainee;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('banco_horas', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Trainee::class);
            $table->text('description')->nullable();
            $table->char('type', 1)->default('C'); // C for credit, D for debit
            $table->integer('minutes');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banco_horas');
    }
};
