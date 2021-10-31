<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->enum('gender', ['male', 'female', 'others']);
            $table->string('phone', 15);
            $table->string('email');
            $table->string('address');
            $table->string('nationality', 50);
            $table->date('date_of_birth')->nullable();
            $table->text('education_background')->nullable();
            $table->enum('prefered_contact_mode', ['email', 'phone', 'none']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
