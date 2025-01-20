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
        Schema::create('catagories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->integer('status')->default(0);
            $table->integer('priority')->default(0);
            $table->date('due_date')->nullable();
            $table->date('completed_at')->nullable();
            $table->integer('progress')->default(0);
            $table->integer('duration')->default(0);
            $table->integer( 'total_cost')->default(0);
            $table->boolean( 'is_active')->default(true);
            $table->boolean('is_public')->default(false);
            $table->boolean('is_billable')->default(false);
            $table->boolean('is_completed')->default(false);
            $table->boolean('is_archived')->default(false);
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
        Schema::dropIfExists(table: 'catagories');

    }
};
