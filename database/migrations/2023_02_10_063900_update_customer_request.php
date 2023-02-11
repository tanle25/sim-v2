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
        Schema::table('customer_requests', function (Blueprint $table) {
            //
            $table->foreignId('performed_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->dateTime('performed_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customer_requests', function (Blueprint $table) {
            //
            $table->dropConstrainedForeignId('performed_by');
            $table->dropColumn(['performed_at']);
        });
    }
};
