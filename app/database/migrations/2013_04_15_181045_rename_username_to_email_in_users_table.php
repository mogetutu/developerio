<?php

use Illuminate\Database\Migrations\Migration;

class RenameUsernameToEmailInUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::up('users', function($table) {
			$table->string('email');
			
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
		Schema::rename('username_to_email_in_users');
	}

}
