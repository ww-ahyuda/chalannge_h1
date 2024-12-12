<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->unsignedBigInteger('book_category_id');
            $table->string('thumbnail')->nullable();
            $table->text('description');
            $table->string('author');
            $table->timestamps();

            $table->foreign('book_category_id')->references('id')->on('book_categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('books');
    }
    
}
