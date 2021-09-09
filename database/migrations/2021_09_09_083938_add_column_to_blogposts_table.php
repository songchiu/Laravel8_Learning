<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToBlogpostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            //"Schema::table" is for adding column to an existing table

            $table->string('title');
            $table->text('content');
        });

        /*
            After doing migration to this table
            we can use "php artisan tinker" to retrieve data is json format

            First, enter "php artisan tinker" in powershell
            Second, enter "BlogPost::find(data's id)"

            If "data id" doesn't exist, system will return "null"
            we can use "BlogPost::findOrFail(data's id)" to get futher information
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            //don't forget to add "dropColumn" !
            //this may be use at "php artisan migrate:rollback"

            $table->dropColumn('title');
            $table->dropColumn('content');
        });
    }
}
