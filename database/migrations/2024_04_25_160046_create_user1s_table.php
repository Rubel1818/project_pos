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
        Schema::create('user1s', function (Blueprint $table) {
            
                $table->id();
                $table->string('firstName',50);
                $table->string('lastName',50);
                $table->string('email',50)->unique();
                $table->string('password');
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
   
};
