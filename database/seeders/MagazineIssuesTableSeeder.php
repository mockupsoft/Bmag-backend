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
                'magazine_id' => 3,
                'issue_month' => '2025-06',
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
                'magazine_id' => 3,
                'issue_month' => '2025-07',
                'description' => 'Ağustos 2025 Sayısı',
                'issue_code' => 1312,
                'cover_image' => NULL,
                'pdf_path' => 'https://past-service.s3.eu-north-1.amazonaws.com/bmag/1750862633.pdf',
                'barcode' => '13213',
                'price' => 123.0,
                'vat_price' => 123.0,
                'stock' => 12,
                'is_published' => 0,
                'created_at' => '2025-06-24 18:04:59',
                'updated_at' => '2025-06-25 14:43:54',
            ),
            2 => 
            array (
                'id' => 11,
                'magazine_id' => 2,
                'issue_month' => '2025-08',
                'description' => 'sadsad',
                'issue_code' => 123213,
                'cover_image' => NULL,
                'pdf_path' => NULL,
                'barcode' => '12321311',
                'price' => 123.0,
                'vat_price' => 123.0,
                'stock' => 12,
                'is_published' => 0,
                'created_at' => '2025-06-25 13:02:42',
                'updated_at' => '2025-06-25 13:02:42',
            ),
            3 => 
            array (
                'id' => 12,
                'magazine_id' => 2,
                'issue_month' => '2025-09',
                'description' => 'sadsad',
                'issue_code' => 123213,
                'cover_image' => NULL,
                'pdf_path' => NULL,
                'barcode' => '123213111',
                'price' => 123.0,
                'vat_price' => 123.0,
                'stock' => 12,
                'is_published' => 0,
                'created_at' => '2025-06-25 13:03:13',
                'updated_at' => '2025-06-25 13:03:13',
            ),
        ));
        
        
    }
}