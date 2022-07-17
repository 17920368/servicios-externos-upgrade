<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSysadidToAgreementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agreements', function (Blueprint $table) {
            $table
                ->foreignId('sysad_id')
                ->after('indicator_id')
                ->nullable()
                ->constrained('sysad_indicators')
                ->cascadeOnUpdate()
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agreements', function (Blueprint $table) {
            //
        });
    }
}
