<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MattersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matters', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->bigInteger('company_id')->unsigned();
            $table->bigInteger('belong_id')->unsigned();
            $table->timestamps();

            $table->foreign('company_id')
            ->references('id')->on('companies')
            ->onDelete('cascade');
            $table->foreign('belong_id')
            ->references('id')->on('belongs')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matters');
    }
}
