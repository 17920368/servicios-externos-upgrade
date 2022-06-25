<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instances', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('responsible');
            $table->string('email');
            $table->integer('phone');
            $table
                ->foreignId('scope_id')
                ->nullable()
                ->constrained('scopes')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table
                ->foreignId('sector_id')
                ->nullable()
                ->constrained('sectors')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table
                ->foreignId('sector_type_id')
                ->nullable()
                ->constrained('sectors_types')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table
                ->foreignId('size_id')
                ->nullable()
                ->constrained('sizes')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table
                ->foreignId('classification_id')
                ->nullable()
                ->constrained('classifications')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table
                ->foreignId('area_id')
                ->nullable()
                ->constrained('areas')
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
        Schema::dropIfExists('instances');
    }
}
