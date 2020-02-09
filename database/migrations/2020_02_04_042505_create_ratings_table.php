<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedInteger('rating');
            $table->unsignedBigInteger('persInfo_id')->nullable();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->unsignedBigInteger('publication_id')->nullable();
            $table->unsignedBigInteger('intProp_id')->nullable();
            $table->unsignedBigInteger('supervision_id')->nullable();
            $table->unsignedBigInteger('teaching_id')->nullable();
            $table->unsignedBigInteger('consultation_id')->nullable();
            $table->unsignedBigInteger('comSer_id')->nullable();
            $table->unsignedBigInteger('pastAgency_id')->nullable();
            $table->timestamps();

            $table->foreign('persInfo_id')->references('id')->on('personal_information')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('publication_id')->references('id')->on('publications')->onDelete('cascade');
            $table->foreign('intProp_id')->references('id')->on('intellectual_properties')->onDelete('cascade');
            $table->foreign('supervision_id')->references('id')->on('supervisions')->onDelete('cascade');
            $table->foreign('teaching_id')->references('id')->on('teachings')->onDelete('cascade');
            $table->foreign('consultation_id')->references('id')->on('consultations')->onDelete('cascade');
            $table->foreign('comSer_id')->references('id')->on('community_services')->onDelete('cascade');
            $table->foreign('pastAgency_id')->references('id')->on('past_agencies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
}
