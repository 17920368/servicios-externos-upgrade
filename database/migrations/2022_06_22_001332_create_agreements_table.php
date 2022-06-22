<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgreementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agreements', function (Blueprint $table) {
            $table->id();
            $table->string('invoice');
            $table->date('start-date');
            $table->date('end-date');
            $table->string('status');
            $table
                ->foreignId('agreement_type_id')
                ->nullable()
                ->constrained('agreements_types')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table
                ->foreignId('instance_id')
                ->nullable()
                ->constrained('instances')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table
                ->foreignId('indicator_id')
                ->nullable()
                ->constrained('indicators')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table
                ->foreignId('user_id')
                ->nullable()
                ->constrained('users')
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
        Schema::dropIfExists('agreements');
    }
}
