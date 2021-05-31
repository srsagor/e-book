<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_books', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('volume')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('series')->nullable();
            $table->integer('item_type_id')->nullable();
            $table->string('subjec_heading')->nullable();
            $table->string('author')->nullable();
            $table->string('publisher')->nullable();
            $table->string('issn')->nullable();
            $table->string('isbn')->nullable();
            $table->string('corporate_autor')->nullable();
            $table->integer('total_page')->nullable();
            $table->integer('price')->nullable();
            $table->string('language')->nullable();
            $table->string('pdf')->nullable();
            $table->string('cover_image')->nullable();
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
        Schema::dropIfExists('e_books');
    }
}
