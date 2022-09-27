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
            $table->string("photo")->nullable();
            $table->string("name");
            $table->text("description")->nullable();
            $table->string("duration")->nullable();
            $table->string("startDate")->nullable();
            $table->string("endDate")->nullable();
            $table->string("currency");
            $table->double("budget");
            $table->boolean('verified')->default(0);
            $table->integer("author_id");
            $table->integer("donor_id");
            $table->json("deliverables")->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
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
