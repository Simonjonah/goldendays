<?php

use App\Models\StudentParent;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(StudentParent::class)->constrained('student_parents')->onDelete('cascade')->update('cascade');

            $table->string('fname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('surname')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('bloodgroup')->nullable();
            $table->text('images')->nullable();
            $table->string('genotype')->nullable();
            $table->string('lastschooladdress')->nullable();
            $table->string('preclassname')->nullable();
            $table->string('age')->nullable();
            $table->string('classname')->nullable();
            $table->string('disability')->nullable();
            $table->string('designation')->nullable();
            $table->string('alms')->nullable();
            $table->string('section')->nullable();
            $table->string('academic_session')->nullable();
            $table->string('ref_no')->nullable();
            $table->string('status')->nullable();
            $table->string('role')->nullable();
            $table->string('slug')->nullable();
            $table->string('previouschoolname')->nullable();
            $table->string('ref_no1')->nullable();
            
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
