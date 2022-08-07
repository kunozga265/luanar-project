<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatasetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datasets', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->text('abstract')->nullable();
            $table->string('file');
            $table->string('type_id')->nullable();
            $table->string('downloadCount')->default(0);
            $table->integer('journal_id')->nullable();
            $table->boolean('verified')->default(0);
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
        Schema::dropIfExists('datasets');
    }
}
