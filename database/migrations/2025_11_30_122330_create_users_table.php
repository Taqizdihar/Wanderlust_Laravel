<?php
public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->string('username')->nullable(); // kalau perlu
        $table->string('password');
        $table->enum('role', ['admin', 'ptw', 'tourist'])->default('tourist');
        $table->timestamps();
    });
}
