<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('tr_TR');

        foreach (range(1, 3) as $i) {
            $title = $faker->sentence(6);
            News::create([
                'title'             => $title,
                'slug'              => Str::slug($title),
                'summary'           => $faker->text(120),
                'content'           => $faker->paragraphs(5, true),
                'image'             => "https://past-service.s3.eu-north-1.amazonaws.com/car_photos/17/20241013152303-670be5d79387d.jpg",
                'is_published'      => $faker->boolean(80), // %80 ihtimalle yayınlanmış
                'published_at'      => $faker->dateTimeBetween('-1 week', 'now'),
                'category_id'       => null, // Kategori sistemin varsa örnek olarak eklenebilir
                'meta_title'        => $faker->sentence(6),
                'meta_description'  => $faker->text(160),
                'meta_keywords'     => implode(', ', $faker->words(5)),
            ]);
        }
    }
}
