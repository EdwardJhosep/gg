<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->string('dni'); // Campo para almacenar el DNI del cliente
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // Relación con la tabla de productos
            $table->integer('cantidad'); // Cantidad vendida
            $table->decimal('total', 8, 2); // Total de la venta
            $table->string('estado'); // Campo para almacenar el estado de la venta (por ejemplo: 'pendiente', 'completada', 'cancelada')
            $table->timestamps(); // Campos para created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};


