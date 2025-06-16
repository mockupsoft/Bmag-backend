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
                'id' => 1,
                'magazine_id' => 1,
                'title' => 'Haziran 2025 Sayısı',
                'slug' => 'haziran-2025-sayisi',
                'issue_number' => 45,
                'issue_date' => '2025-06-01',
                'cover_image' => 'https://past-service.s3.eu-north-1.amazonaws.com/car_photos/17/20241013152303-670be5d79387d.jpg',
                'pdf_path' => 'pdfs/june2025.pdf',
                'barcode' => '9780000000001',
                'price' => 50.0,
                'vat_price' => 9.0,
                'stock' => 100,
                'is_published' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'magazine_id' => 1,
                'title' => 'Mayıs 2025 Sayısı',
                'slug' => 'mayis-2025-sayisi',
                'issue_number' => 44,
                'issue_date' => '2025-05-01',
                'cover_image' => 'https://past-service.s3.eu-north-1.amazonaws.com/car_photos/17/20241013152303-670be5d79387d.jpg',
                'pdf_path' => 'pdfs/may2025.pdf',
                'barcode' => '9780000000002',
                'price' => 50.0,
                'vat_price' => 9.0,
                'stock' => 80,
                'is_published' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'magazine_id' => 1,
                'title' => 'Nisan 2025 Sayısı',
                'slug' => 'nisan-2025-sayisi',
                'issue_number' => 43,
                'issue_date' => '2025-04-01',
                'cover_image' => 'https://past-service.s3.eu-north-1.amazonaws.com/car_photos/17/20241013152303-670be5d79387d.jpg',
                'pdf_path' => 'pdfs/apr2025.pdf',
                'barcode' => '9780000000003',
                'price' => 50.0,
                'vat_price' => 9.0,
                'stock' => 70,
                'is_published' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 =>
            array (
                'id' => 4,
                'magazine_id' => 1,
                'title' => 'Mart 2025 Sayısı',
                'slug' => 'mart-2025-sayisi',
                'issue_number' => 42,
                'issue_date' => '2025-03-01',
                'cover_image' => 'https://past-service.s3.eu-north-1.amazonaws.com/car_photos/17/20241013152303-670be5d79387d.jpg',
                'pdf_path' => 'pdfs/mar2025.pdf',
                'barcode' => '9780000000004',
                'price' => 50.0,
                'vat_price' => 9.0,
                'stock' => 60,
                'is_published' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 =>
            array (
                'id' => 5,
                'magazine_id' => 1,
                'title' => 'Şubat 2025 Sayısı',
                'slug' => 'subat-2025-sayisi',
                'issue_number' => 41,
                'issue_date' => '2025-02-01',
                'cover_image' => 'https://past-service.s3.eu-north-1.amazonaws.com/car_photos/17/20241013152303-670be5d79387d.jpg',
                'pdf_path' => 'pdfs/feb2025.pdf',
                'barcode' => '9780000000005',
                'price' => 50.0,
                'vat_price' => 9.0,
                'stock' => 50,
                'is_published' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));


    }
}
