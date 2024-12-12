<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookCategoriesTable extends Migration
{
    public function up()
    {
    Schema::create('book_categories', function (Blueprint $table) {
        $table->id();
        $table->string('name')->unique(); // Nama kategori harus unik
        $table->timestamps(); // created_at dan updated_at
    });
    }


    public function down()
    {
        Schema::dropIfExists('book_categories');
    }
}

