<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgreementsSpecialtiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agreements_specialties', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('agreement_id')
                ->nullable()
                ->constrained('agreements')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table
                ->foreignId('specialty_id')
                ->nullable()
                ->constrained('specialties')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agreements_specialties');
    }
}
