<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvoirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avoirs', function (Blueprint $table) {
            $table->id();
            $table->string('numavoir');
            $table->string('numclient');
            $table->string('designation');
            $table->date('date');
            $table->decimal('montant', 10, 2); // Decimal avec 10 chiffres au total dont 2 chiffres après la virgule
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
        Schema::dropIfExists('avoirs');
    }
}
