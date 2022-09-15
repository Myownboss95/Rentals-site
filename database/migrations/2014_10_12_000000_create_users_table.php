<?php

use App\Models\Plan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->foreignIdFor(Plan::class)->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique()->index();
            $table->enum('status', ['active', 'pending', 'declined', 'suspended'])->default('pending');
            $table->string('phone')->unique()->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('zip_code')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 60)->index();
            $table->rememberToken();
            $table->boolean('is_admin')->default(0);
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
