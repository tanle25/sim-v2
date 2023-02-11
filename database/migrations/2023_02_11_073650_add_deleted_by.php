<?php

use App\Models\User;
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
        Schema::table('sims', function (Blueprint $table) {
            //
            // $table->foreignIdFor(User::class)->nullable()->after('deleted_at')->constrained()->cascadeOnDelete();
            $table->foreignId('deleted_by')->nullable()->after('deleted_at')->constrained('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sims', function (Blueprint $table) {
            //
            $table->foreignId('deleted_by');
        });
    }
};
