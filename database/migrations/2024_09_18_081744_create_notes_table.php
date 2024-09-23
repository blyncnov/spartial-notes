<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(User::class);

            $table->string("n_title");
            $table->string("n_content");
            $table->string("n_description");
            $table->string("n_passkey")->nullable();
            $table->string("n_geolocation");
            $table->decimal('n_latitude', 10, 8);
            $table->decimal('n_longitude', 11, 8);
            $table->enum("n_visibility", ["private", "public"])->default("public");
            $table->enum("n_label", ["urgent", "simple"])->default("simple");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
