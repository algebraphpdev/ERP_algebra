<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lastName', 50);
            $table->string('firstName', 50);
            $table->string('extension', 10);
            $table->string('email', 100);
            $table->unsignedBigInteger('office_id')->index();
            $table->unsignedBigInteger('employee_id')->index()->nullable();
            $table->string('jobTitle', 50);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('office_id')->references('id')->on('offices');

        });

        Schema::table('employees', function (Blueprint $table) {
            $table->foreign('employee_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
