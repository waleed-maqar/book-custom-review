<?php

use App\Models\Book;
use App\Models\Report;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Book::class)->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignIdFor(User::class)->nullable()->constrained()
                ->onDelete('set null')
                ->onUpdate('cascade');
            $table->foreignIdFor(Report::class)->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->boolean('seen')->default(false); // if report seen by an admin or a moderator
            $table->enum('action', ['ignore', 'suspend', 'delete'])->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('book_reports');
    }
};