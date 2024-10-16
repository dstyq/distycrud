<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); 
            $table->string('title'); 
            $table->text('description')->nullable();  
            $table->decimal('price', 10, 2);  
            $table->string('brand')->nullable();  
            $table->string('category')->nullable();  
            $table->string('image_url')->nullable();  
            $table->timestamps();  
        });
    }

    public function down()
    {
        Schema::dropIfExists('products'); 
    }
}