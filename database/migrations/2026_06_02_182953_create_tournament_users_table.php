public function up(): void
{
    Schema::create('tournament_users', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('tournament_id')->constrained()->onDelete('cascade');
        $table->timestamps();
    });
}
