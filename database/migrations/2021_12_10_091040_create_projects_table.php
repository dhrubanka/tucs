<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_id');
            $table->string('title');
            $table->text('description');
            $table->string('domain');
            $table->string('url')->nullable();
            $table->string('project_file')->nullable();
            $table->string('approval')->default('N');
            $table->text('remark')->nullable();
            $table->string('permission');
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
        Schema::dropIfExists('projects');
    }
}
