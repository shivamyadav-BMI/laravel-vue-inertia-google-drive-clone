<?php

use App\Models\User;
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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('name', 1024);
            $table->string('path', 1024)->nullable();
            $table->nestedSet();
            $table->boolean('is_folder');
            $table->string('mime')->nullable();
            $table->integer('size')->nullable();
            $table->softDeletes();
            $table->foreignIdFor(User::class, 'createdBy');
            $table->foreignIdFor(User::class, 'updatedBy');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
