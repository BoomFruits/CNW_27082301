<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Book;
class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('vi');
        for($i = 0 ; $i < 30 ;$i++){
            Book::create([
                'title' => $faker->text,
                'author' => $faker->sentence(1,true),
                'genre' => $faker->sentence(1, true),
                'PublicationYear'=>$faker->date(),
                'ISBN' => $faker -> numberBetween(1000,9999),
                'CoverImageURL' => $faker ->url,
            ]);
        }
    }
}
