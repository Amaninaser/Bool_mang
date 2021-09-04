<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatedaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datedays', function (Blueprint $table) {
            $table->id();
            $table->date('date_from');
            $table->date('date_to');
            $table->foreignId('trainer_id')->constrained('trainers', 'id')->cascadeOnDelete();
            $table->enum('day', ['الخميس','الأربعاء','الثلاثاء','الإثنين','الأحد','السبت','الجمعة']);
            $table->time('start_time');
            $table->time('end_time');
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
        Schema::dropIfExists('datedays');
    }
}
