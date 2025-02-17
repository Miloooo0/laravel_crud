<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class AlumnoFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'dni' => $this->generarDNI(),
            'email' => fake()->unique()->safeEmail(),
            'fechaNacimiento' => fake()->date('Y-m-d', '2005-12-31'),
            'idiomas'=> $this->faker->numberBetween(1,5),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
    private function generarDNI() {
        $numero = str_pad(mt_rand(10000000, 99999999), 8, '0', STR_PAD_LEFT);
        $letra = $this->calcularLetraDNI($numero);
        return $numero . $letra;
    }

    // Método para calcular la letra del DNI
    private function calcularLetraDNI($numero) {
        $letras = "TRWAGMYFPDXBNJZSQVHLCKE"; // Letras del DNI en orden
        return $letras[$numero % 23]; // Se obtiene la letra correspondiente
    }


}
