<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAfterBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('after_book', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('after_id')->unsigned()->nullable();
            $table->foreign('after_id')->references('id')
                ->on('afters')->onDelete('cascade');
            $table->integer('book_id')->unsigned()->nullable();
            $table->foreign('book_id')->references('id')
                ->on('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('after_book');
    }
}
