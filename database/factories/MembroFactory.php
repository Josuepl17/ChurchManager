<?php

namespace Database\Factories;


use App\Models\membros;
use Illuminate\Database\Eloquent\Factories\Factory;

class MembroFactory extends Factory
{
    protected $model = membros::class;

    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 100), // Ajuste conforme necessário
            'empresa_id' => $this->faker->numberBetween(1, 50), // Ajuste conforme necessário
            'nome' => $this->faker->firstName,
            'sobrenome' => $this->faker->lastName,
            'funcao' => $this->faker->jobTitle,
            'endereco' => $this->faker->address,
            'telefone' => $this->faker->phoneNumber,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
