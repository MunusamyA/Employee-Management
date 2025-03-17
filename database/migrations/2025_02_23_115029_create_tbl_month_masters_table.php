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
        Schema::create('tbl_month_masters', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('sal_month'); // Stores month as text (e.g., January)
            $table->integer('sal_year');  // Stores the year
            $table->integer('total_days'); // Stores total days of the month
            $table->integer('sal_holy_days'); // Stores Holy days of the month
            $table->integer('sal_work_days'); // Stores Working days of the month
            
            $table->unsignedBigInteger('created_by'); // User who created the record
            $table->timestamp('created_dtm')->useCurrent(); // Automatically sets current timestamp
            
            $table->unsignedBigInteger('updated_by')->nullable(); // User who updated the record
            $table->timestamp('updated_dtm')->nullable()->useCurrentOnUpdate(); // Auto-updates on modification

            $table->tinyInteger('rec_del_status')->default(0)->comment('0-Active, 1-Inactive'); // Record status
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_month_masters');
    }
};
