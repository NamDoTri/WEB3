<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('critics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("user_id");
            $table->unsignedBigInteger('picture_id');
            $table->string('title');
            $table->text('review');
            $table->integer('agrees')->default(0);
            $table->integer('disagrees')->default(0);
            $table->timestamps();

            $table->index('picture_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('critics');
    }
}
