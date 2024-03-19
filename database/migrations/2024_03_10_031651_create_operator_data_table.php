<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('operator_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('operator_id');

            $table->string('fruit_type');
            $table->integer('fruit_weight');
            $table->integer('hours_worked');
            $table->date('date_collection');
            $table->text('observation');
            
            $table->foreign('operator_id')->references('id')
            ->on('operators')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

   
};
