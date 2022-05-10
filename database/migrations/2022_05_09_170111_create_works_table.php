<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->string('companyName');
            $table->string('designation');
            $table->date('startDate');
            $table->date('endDate');
            $table->string('description');
            $table->unsignedBigInteger('profile_id');
            $table->timestamps();

            $table->foreign('profile_id')
            ->references('id')
            ->on('profiles')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('works');
    }
}
