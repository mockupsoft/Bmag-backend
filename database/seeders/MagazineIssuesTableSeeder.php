<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MagazineIssuesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('magazine_issues')->delete();

        \DB::table('magazine_issues')->insert(array (
            0 =>
            array (
                'id' => 8,
                'magazine_id' => 1,
                'issue_date' => '2025-06-24',
                'description' => 'Temmuz 2025 Sayısı',
                'issue_code' => 123,
                'cover_image' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1750788142.jpeg',
                'pdf_path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1750788142.webp',
                'barcode' => '123213',
                'price' => 123.0,
                'vat_price' => 123.0,
                'stock' => 123,
                'is_published' => 0,
                'created_at' => '2025-06-24 18:02:22',
                'updated_at' => '2025-06-24 18:02:22',
            ),
            1 =>
            array (
                'id' => 9,
                'magazine_id' => 1,
                'issue_date' => '2025-06-24',
                'description' => 'Ağustos 2025 Sayısı',
                'issue_code' => 1312,
                'cover_image' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1750788299.jpeg',
                'pdf_path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1750788300.webp',
                'barcode' => '13213',
                'price' => 123.0,
                'vat_price' => 123.0,
                'stock' => 12,
                'is_published' => 0,
                'created_at' => '2025-06-24 18:04:59',
                'updated_at' => '2025-06-24 18:05:00',
            ),
        ));


    }
}
