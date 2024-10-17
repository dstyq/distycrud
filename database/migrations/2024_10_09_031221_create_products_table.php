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
            $table->string('category')->nullable(); 
            $table->decimal('price', 10, 2); 
            $table->decimal('rating', 8, 2)->nullable();
            $table->integer('stock')->default(0); 
            $table->string('brand')->nullable(); 
            $table->string('sku')->nullable(); 
            $table->json('images')->nullable();
            $table->text('warrantyInformation')->nullable(); 
            $table->text('shippingInformation')->nullable();
            $table->string('availabilityStatus')->nullable(); 
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('products'); 
    }
}
