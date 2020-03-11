<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppraisalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appraisals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('appraisee_id');
            $table->integer('supervisor_id');
            $table->boolean('status')->default(1);
            $table->string('type')->nullable();
            $table->string('reason')->nullable();
            $table->dateTime('period_begin')->nullable();
            $table->dateTime('period_end')->nullable();
            $table->dateTime('deadline')->nullable();
            $table->text('section_1')->nullable();
            $table->text('section_2')->nullable();
            $table->decimal('grade', 5, 2);
            $table->text('significant_achievement')->nullable();
            $table->text('trait')->nullable();
            $table->text('improve')->nullable();
            $table->text('training')->nullable();
            $table->text('section_4')->nullable();
            $table->boolean('submit')->default(0);
            $table->boolean('appraisee_decision')->nullable();
            $table->string('appraisee_signature')->nullable();
            $table->text('appraisee_comment')->nullable();
            $table->dateTime('appraisee_date')->nullable();
            $table->string('supervisor_signature')->nullable();
            $table->text('supervisor_comment')->nullable();
            $table->dateTime('supervisor_date')->nullable();
            $table->string('hod_signature')->nullable();
            $table->dateTime('hod_date')->nullable();
            $table->text('hr_comment')->nullable();
            $table->text('management_decision')->nullable();
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
        Schema::drop('appraisals');
    }
}
