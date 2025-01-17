<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            //$table->string('name')
              //  ->nullable();
            $table->string('slug')
                ->index();
            $table->string('image',100)
                ->nullable();
            $table->integer('parent_id')
                ->index()
                ->nullable();
            $table->integer('active')
                ->default(0);
            $table->timestamp('deleted_at')
                ->nullable();
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
        Schema::dropIfExists('categories');
    }
}
