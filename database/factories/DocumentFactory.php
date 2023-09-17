<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Document;
use Illuminate\Support\Str;

class DocumentFactory extends Factory
{
    protected $model = Document::class;

    public function definition()
    {
        return [
            'id' => (string) Str::uuid(),
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'tanggal_signing' => $this->faker->date,
            'jabatan_signing' => $this->faker->jobTitle,
            'nama_signing' => $this->faker->name,
            'signing' => Str::random(10) . '.' . 'png', // Gantilah dengan ekstensi file yang sesuai
        ];
    }
}
