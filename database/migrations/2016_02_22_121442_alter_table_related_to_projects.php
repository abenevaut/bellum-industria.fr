<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableRelatedToProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('tasks');

        Schema::table('projects', function(Blueprint $table){
            $table->dropColumn('description');
            $table->dropColumn('entite_id');
        });

        Schema::table('projects', function(Blueprint $table){
            $table->integer('entite_id');
            $table->date('ended_at');
        });

        Schema::create('milestones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id');
            $table->integer('gitlab_milestone_id');
            $table->date('due_date');
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
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_id');
            $table->string('name');
            $table->string('description');
            $table->string('status');
            $table->timestamps();
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->string('description');
        });

        Schema::drop('milestones');
    }
}
