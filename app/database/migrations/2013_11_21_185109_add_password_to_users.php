<?php
// Brett declares that migrations are a hassle.


use Illuminate\Database\Migrations\Migration;

class AddPasswordToUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        //Schema::table('users', function($t) { $t->string('passwordl'); });
        Schema::table('users', function($t) { 
		$t->string('password')->after('email'); 
	});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
        Schema::table('users', function($t) {
                $t->dropColumn('passwordl');
        });
	}

}
