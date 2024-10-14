<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pembelian');
            $table->integer('jumlah_pembelian');
            $table->date('tanggal');
            $table->unsignedBigInteger('material_id');
            $table->unsignedBigInteger('supplier_id');
            $table->text('deskripsi')->nullable();
            $table->timestamps();

            $table->foreign('material_id')->references('id')->on('materials')->onDelete('cascade');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('purchase_orders');
    }
}
