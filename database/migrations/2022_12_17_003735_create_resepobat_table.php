<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResepobatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resepobat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained('datapasien')->cascadeOnDelete();
            $table->foreignId('dataobat_id')->constrained('dataobat')->cascadeOnDelete();
            $table->string('pemakaian')->nullable();
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
        Schema::dropIfExists('resepobat');
    }
}
