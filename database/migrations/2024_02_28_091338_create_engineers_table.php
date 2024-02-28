<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEngineersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('engineers', function (Blueprint $table) {
            $table->id();
            $table->integer('status')->default(0);
            $table->unsignedBigInteger('user_id'); // Добавление столбца user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('first_name');
            $table->string('second_name');
            $table->string('patronymic');
            $table->integer('region');
            $table->string('gender');
            $table->string('citizenship');
            $table->date('birthday');
            $table->integer('phone');
            $table->integer('iin');
            $table->string('id_card', 255);
            $table->integer('id_number');
            $table->integer('form_of_treatment');
            $table->integer('average_rating');
            $table->string('employment_record', 255);
            $table->integer('work_experience'); // стаж работы
            $table->integer('experience_in_management'); // Стаж в руководстве
            $table->unsignedBigInteger('company_id'); // Добавление столбца user_id
            $table->foreign('company_id')->references('id')->on('companies');
            $table->json('additional_data')->default('[]');
            $table->json('education_data')->default('[]');
            $table->json('state_qualification_data')->default('[]');
            $table->json('work_experience_data')->default('[]');
            $table->json('qualification_data')->default('[]');
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
        Schema::dropIfExists('engineers');
    }
}
