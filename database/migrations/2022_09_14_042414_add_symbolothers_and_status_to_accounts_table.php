<?php

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
        Schema::table('accounts', function (Blueprint $table) {
            //
            $table->string('symbol')->nullable()->after('account');
            $table->boolean('status')->default(false)->after('type');
            $table->string('svg')->nullable();
            $table->string('type')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accounts', function (Blueprint $table) {
            //
            $table->dropColumn('symbol');
            $table->dropColumn('status');
            
            // $table->enum('type', ['invested', 'main', 'referral'])->change();
        });
    }
};
