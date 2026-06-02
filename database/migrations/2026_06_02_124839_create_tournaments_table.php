public function up(): void
{
    Schema::create('tournaments', function (Blueprint $table) {
        $table->id();
        $table->string('title'); // BR Match / CS Match
        $table->integer('entry_fee')->default(0);
        $table->integer('prize')->default(0);
        $table->string('type'); // BR / CS
        $table->integer('slots')->default(100);
        $table->timestamps();
    });
}
