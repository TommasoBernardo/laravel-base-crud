<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 50; $i++) { 
            $newBook = new Book();
            $newBook->isbn = $faker->isbn13();
            $newBook->title = $faker->word();
            $newBook->author = $faker->sentence(2);
            $newBook->publication_date = $faker->date();
            $newBook->description = $faker->paragraph();
            $newBook->genre = $faker->word();
            $newBook->cover_image = $faker->imageUrl();
            $newBook->save();
        }

        
    }
}
