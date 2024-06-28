<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Book;
use App\Models\Review;
class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('vi');
        $useridList = User::pluck('id')->toArray();
        $bookidList = Book::pluck('BookID')->toArray();
        for($i = 0;$i < 50 ; $i++){
            Review::create([
                'UserID' => $faker->randomElement($useridList),
                'BookID' => $faker->randomElement($bookidList),
                'Rating' => $faker->numberBetween(1,5),
                'ReviewText' => $faker->text,
                'ReviewDate' => now()
            ]);
        }
    }
}
