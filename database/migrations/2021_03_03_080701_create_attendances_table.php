<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('in_time');
            $table->string('out_time');
            $table->string('date');
            $table->string('month');
            $table->string('year');
            //foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('lists', function(Blueprint $table)
        {
            //$table->dropForeign('user_id'); //

            /*
            $table->dropForeign('attendances_user_id_foreign');
            $table->dropIndex('attendances_user_id_index');
            $table->dropColumn('user_id');
            */
            
        });
        
        

        Schema::dropIfExists('attendances');
    }
}
