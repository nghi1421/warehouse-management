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
        Schema::table('users', function (Blueprint $table) {
            $table->string('address', 100);
            $table->date('dob')->nullable();
            $table->string('phone_number', 15);
            $table->string('avatar')->nullable();
            $table->boolean('working', true);
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('unit', 20);
            $table->timestamps();
        });

        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });

        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->string('phone_number', 15);
            $table->timestamps();
        });

        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('block_name', 50);
            $table->string('shelf_name', 50);
            $table->unique(['block_name', 'shelf_name']);
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('imports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->tinyInteger('status');
            $table->timestamps();
        });

        Schema::create('import_details', function (Blueprint $table) {
            $table->unsignedBigInteger('import_id');
            $table->foreign('import_id')->references('id')->on('imports');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->integer('amount');
            $table->primary(['import_id', 'category_id']);
        });

        Schema::create('exports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->tinyInteger('status');
            $table->timestamps();
        });

        Schema::create('export_details', function (Blueprint $table) {
            $table->unsignedBigInteger('export_id');
            $table->foreign('export_id')->references('id')->on('exports');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->integer('amount');
            $table->primary(['export_id', 'category_id']);
        });


        Schema::create('goods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('import_id');
            $table->foreign('import_id')->references('id')->on('imports');
            $table->unsignedBigInteger('export_id')->nullable();
            $table->foreign('export_id')->references('id')->on('exports');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedBigInteger('position_id')->nullable();
            $table->foreign('position_id')->references('id')->on('positions');
            $table->date('expiry_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('reservations');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('imports');
        Schema::dropIfExists('import_details');
        Schema::dropIfExists('exports');
        Schema::dropIfExists('export_details');
        Schema::dropIfExists('shelves');
        Schema::dropIfExists('blocks');
        Schema::dropIfExists('positions');
        Schema::dropIfExists('goods');
    }
};