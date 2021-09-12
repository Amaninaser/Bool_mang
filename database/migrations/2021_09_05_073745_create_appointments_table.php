<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trainer_id')->constrained('trainers','id')->cascadeOnDelete();
            $table->foreignId('trainee_id')->nullable()->constrained('trainees','id');
            $table->foreignId('date_id')->nullable()->constrained('datedays','id');
            $table->enum('status', ['Reserve', 'Complete', 'Cancel']);
            $table->enum('color', ['yellow', 'Gray', 'LightGray', 'blue', 'purple']);
            $table->enum('text_color', ['SlateBlue','blue', 'purple']);
            $table->dateTime('Time_from');
            $table->dateTime('Time_To');
            $table->enum('audience', ['presence', 'absence'])->nullable();
            $table->text('details')->nullable();
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
        Schema::dropIfExists('appointments');
    }
}
