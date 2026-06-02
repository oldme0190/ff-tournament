public function up(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->integer('balance')->default(0);
    });
}
