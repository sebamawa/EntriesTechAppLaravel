<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned(); //una entry tiene (es de) un usuario
            $table->integer('category_id')->unsigned(); //una entry tiene (pertenece a) una categoria
            $table->date('date');
            $table->string('name', 128);
            $table->string('slug', 128)->unique();
            $table->mediumText('excerpt')->nullable(); //extracto
            $table->text('body');

            //$table->timestamps();

            //Table relations

            //el campo 'user_id' hace referencia al campo 'id' de la tabla 'users'
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')  //indica que si se elimina un usuario se va a eliminar
                ->onUpdate('cascade'); //todas sus entradas

            $table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entries');
    }
}
