<?php
// database/migrations/xxxx_xx_xx_create_posts_table.php
// database/migrations/xxxx_xx_xx_create_contacts_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('subject')->nullable();
            $table->text('message');
            $table->boolean('read')->default(false); // marque comme lu ou non
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('contacts');
    }
};
