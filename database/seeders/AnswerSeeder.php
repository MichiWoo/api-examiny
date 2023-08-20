<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        Answer::create([
            'description' => 'Es la unión de dos vocales',
            'image' => $faker->imageUrl(640, 480),
            'correct' => 1,
            'question_id' => 1
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 1
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 1
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 1
        ]);

        Answer::create([
            'description' => 'Es la unión de tres vocales',
            'image' => $faker->imageUrl(640, 480),
            'correct' => 1,
            'question_id' => 2
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 2
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 2
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 2
        ]);

        Answer::create([
            'description' => 'Es la unión de vocales y consonantes',
            'image' => $faker->imageUrl(640, 480),
            'correct' => 1,
            'question_id' => 3
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 3
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 3
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 3
        ]);
        
        Answer::create([
            'description' => 'Es una acción realizada',
            'image' => $faker->imageUrl(640, 480),
            'correct' => 1,
            'question_id' => 4
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 4
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 4
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 4
        ]);

        Answer::create([
            'description' => 'Es otra palabla que significa lo mismo',
            'image' => $faker->imageUrl(640, 480),
            'correct' => 1,
            'question_id' => 5
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 5
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 5
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 5
        ]);

        Answer::create([
            'description' => 'Es otra palabla que significa lo contrario',
            'image' => $faker->imageUrl(640, 480),
            'correct' => 1,
            'question_id' => 6
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 6
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 6
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 6
        ]);

        Answer::create([
            'description' => 'Es un número ordinario sin decimales',
            'image' => $faker->imageUrl(640, 480),
            'correct' => 1,
            'question_id' => 7
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 7
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 7
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 7
        ]);

        Answer::create([
            'description' => 'Es un número inferior a 1 que se puede combinar con enteros',
            'image' => $faker->imageUrl(640, 480),
            'correct' => 1,
            'question_id' => 8
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 8
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 8
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 8
        ]);

        Answer::create([
            'description' => 'Es un número que solo se puede dividir entre 1 y si mismo y resulta entero',
            'image' => $faker->imageUrl(640, 480),
            'correct' => 1,
            'question_id' => 9
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 9
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 9
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 9
        ]);

        Answer::create([
            'description' => 'Es una figura redonda',
            'image' => $faker->imageUrl(640, 480),
            'correct' => 1,
            'question_id' => 10
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 10
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 10
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 10
        ]);

        Answer::create([
            'description' => 'Es una figura de cuatro lados iguales',
            'image' => $faker->imageUrl(640, 480),
            'correct' => 1,
            'question_id' => 11
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 11
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 11
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 11
        ]);

        Answer::create([
            'description' => 'Es una figura de tres lados',
            'image' => $faker->imageUrl(640, 480),
            'correct' => 1,
            'question_id' => 12
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 12
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 12
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 12
        ]);

        Answer::create([
            'description' => 'Es una masa de tierra gigante',
            'image' => $faker->imageUrl(640, 480),
            'correct' => 1,
            'question_id' => 13
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 13
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 13
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 13
        ]);

        Answer::create([
            'description' => 'Es una masa de tierra rodeada por agua',
            'image' => $faker->imageUrl(640, 480),
            'correct' => 1,
            'question_id' => 14
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 14
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 14
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 14
        ]);

        Answer::create([
            'description' => 'Es un conjunto de montañas',
            'image' => $faker->imageUrl(640, 480),
            'correct' => 1,
            'question_id' => 15
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 15
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 15
        ]);
        Answer::create([
            'description' => $faker->text(70),
            'image' => $faker->imageUrl(640, 480),
            'correct' => 0,
            'question_id' => 15
        ]);
    }
}
