<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDatetacheColumnInTachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('taches', function (Blueprint $table) {
            Schema::table('taches', function (Blueprint $table) {
                // Change the data type of the `datetache` column to datetime
                $table->dateTime('datetache')->change();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('taches', function (Blueprint $table) {
            Schema::table('taches', function (Blueprint $table) {
                // If you want to revert the change, you can use the `date` data type instead
                $table->date('datetache')->change();
            });
        });
    }
}
