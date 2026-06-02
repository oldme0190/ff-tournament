public function up(): void
{
    Schema::create('wallet_transactions', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');

        $table->string('type'); // deposit / withdraw / tournament
        $table->integer('amount');

        $table->string('status')->default('success');

        $table->timestamps();
    });
}
