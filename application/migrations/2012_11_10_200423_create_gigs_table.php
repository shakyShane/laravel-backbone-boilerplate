<?php

class Create_Gigs_Table {    

	public function up()
    {
		Schema::create('gigs', function($table) {
			$table->increments('id');
			$table->string('title');
			$table->text('content');
			$table->text('venue');
			$table->string('location');
			$table->date('date');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('gigs');

    }

}