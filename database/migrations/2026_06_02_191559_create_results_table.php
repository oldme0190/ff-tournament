public function up(): void
{
    Schema::create('results', function (Blueprint $table) {
        $table->id();
        $table->foreignId('tournament_id')->constrained()->onDelete('cascade');
        $table->foreignId('user_id')->constrained()->onDelete('cascade');

        $table->integer('kills')->default(0);
        $table->boolean('is_winner')->default(false);

        $table->timestamps();
    });
}
