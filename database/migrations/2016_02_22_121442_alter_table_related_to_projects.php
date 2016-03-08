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
            $table->dropColumn('description')
                ->dropColumn('entite_id')
                ->integer('entite_id')
                ->date('ended_at');
        });

        Schema::create('milestones', function (Blueprint $table) {
            $table->increments('id')
                ->integer('project_id')
                ->integer('gitlab_milestone_id')
                ->date('due_date')
                ->timestamps();
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
            $table->increments('id')
                ->string('project_id')
                ->string('name')
                ->string('description')
                ->string('status')
                ->timestamps();
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->string('description');
        });

        Schema::drop('milestones');
    }
}
