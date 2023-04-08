<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('manager_line_id')->constrained("manager_lines")->onUpdate("cascade")->onDelete("cascade");
            $table->string('email');
            $table->integer('age');
            $table->enum("gender",["male","female"])->default('male');
            $table->integer('salary');
            $table->date('hired_date');
            $table->string('job_title');
            $table->string('managers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
