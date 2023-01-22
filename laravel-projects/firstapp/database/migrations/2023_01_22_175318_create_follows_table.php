<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('follows', function (Blueprint $table) {
			$table->id();
			$table->foreignId('user_id')->constrained();
			//create column, then sets it as foreign key of the user table on thi id column.
			$table->unsignedBigInteger('followeduser');
			$table->foreign('followeduser')->references('id')->on('users');
			
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('follows');
	}
};
