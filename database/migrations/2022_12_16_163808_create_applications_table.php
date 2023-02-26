<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_id')->constrained('subjects')->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->string('applicant_name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('mobile');
            $table->string('village')->nullable();
            $table->string('union')->nullable();
            $table->string('upazila')->nullable();
            $table->string('zila')->nullable();
            $table->string('post_office')->nullable();
            $table->string('application_subject');
            $table->string('nid');
            $table->text('address')->nullable();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('applications');
    }
}
