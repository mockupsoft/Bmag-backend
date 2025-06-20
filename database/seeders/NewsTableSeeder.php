<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('news')->delete();

        \DB::table('news')->insert(array (
            0 =>
            array (
                'id' => 1,
                'title' => 'Iusto odit et et.',
                'slug' => 'iusto-odit-et-et',
                'summary' => 'Deserunt dicta minima illo nam non. Non et labore animi molestiae voluptates. Alias corrupti culpa nihil et voluptates.',
                'content' => 'Natus et officiis quo praesentium. Tenetur voluptatem enim et molestiae ratione accusamus temporibus. Ea et sint perferendis in.

Non maiores ducimus quo corporis porro quo nihil. Sit enim dolorum aut voluptas animi deserunt rem. Alias debitis ipsam rem ut deleniti qui. Quod impedit sunt aut possimus.

Temporibus ducimus architecto est et. Distinctio molestiae in rerum sunt. Laborum nesciunt eveniet provident officia ea nobis. Ipsa cumque veritatis repellendus omnis cupiditate consequuntur tempora.

Qui ea veritatis occaecati tempora consequatur dolor. Dicta non ratione laudantium quo quis. Dignissimos ut minima non facere.

Velit rerum eius animi quod. Ad distinctio sed deserunt et. Alias adipisci illum tenetur officia.',
                'image' => 'https://past-service.s3.eu-north-1.amazonaws.com/car_photos/17/20241013152303-670be5d79387d.jpg',
                'is_published' => 1,
                'published_at' => null,
                'category_id' => 1,
                'magazine_id' => 1,
                'meta_title' => 'Nulla ab occaecati accusamus rerum mollitia accusantium libero.',
                'meta_description' => 'Omnis ex officiis aut placeat sed et in. Aut et quis pariatur voluptatem. Dignissimos esse magnam explicabo laborum dolorem totam voluptatibus.',
                'meta_keywords' => 'quia, ducimus, cumque, et, aliquam',
                'robots' => 'index, follow',
                'created_at' => '2025-06-13 09:34:18',
                'updated_at' => '2025-06-13 09:34:18',
            ),
            1 =>
            array (
                'id' => 2,
                'title' => 'Nobis odio laborum qui pariatur et aut suscipit sapiente.',
                'slug' => 'nobis-odio-laborum-qui-pariatur-et-aut-suscipit-sapiente',
                'summary' => 'Laborum omnis possimus qui. Qui numquam consectetur similique sed consequatur asperiores autem perferendis.',
                'content' => 'Suscipit esse error blanditiis et sint ut sed. Est enim ducimus exercitationem voluptatibus nobis laborum. Mollitia rerum consequuntur sed. Facere minima repellendus sequi voluptates velit et incidunt doloremque.

Voluptas et fugit labore animi enim. Cumque necessitatibus laborum ut. Nemo culpa consequatur qui omnis voluptas. Et in ipsa eveniet aut.

Omnis qui laboriosam cum voluptatem. Doloribus voluptatem rerum quaerat quam. Sint fuga quam necessitatibus expedita assumenda. Consectetur ut incidunt alias voluptatem quia a nihil.

Pariatur provident quis soluta consequatur debitis velit deserunt veniam. Doloribus et iste debitis ullam. Atque tempore nisi veniam quo quae dolor cupiditate. Ad doloribus qui ratione.

Asperiores sint voluptas voluptatem. In delectus numquam reprehenderit ea doloribus cumque. Natus voluptatem maiores et excepturi aut et eaque sit.',
                'image' => 'https://past-service.s3.eu-north-1.amazonaws.com/car_photos/17/20241013152303-670be5d79387d.jpg',
                'is_published' => 1,
                'published_at' => null,
                'category_id' => 2,
                'magazine_id' => 1,
                'meta_title' => 'Veniam tenetur modi facilis tempora.',
                'meta_description' => 'Quo et aut alias repellat veritatis excepturi dolor beatae. Placeat enim doloremque provident eos voluptatem dolores. Voluptatem debitis delectus consectetur.',
                'meta_keywords' => 'eos, rerum, dolor, vel, non',
                'robots' => 'index, follow',
                'created_at' => '2025-06-13 09:34:18',
                'updated_at' => '2025-06-13 09:34:18',
            ),
            2 =>
            array (
                'id' => 3,
                'title' => 'Quia est voluptatum aut ab autem sit.',
                'slug' => 'quia-est-voluptatum-aut-ab-autem-sit',
                'summary' => 'Porro vel hic sit ipsa animi sunt. In aut rem eum. Dolorum sit et cumque tempore ipsum cumque tempora numquam.',
                'content' => 'Doloribus consequatur optio fugiat omnis totam rerum. Sint reprehenderit repellendus et voluptatum ab. Maiores et illo aut facere. Vel et odit qui quia voluptatibus. Fuga amet quidem possimus vel ut.

Itaque voluptates accusamus occaecati nulla. Aut ipsum expedita sunt sed magni eum. Voluptas ipsum error rerum. Et inventore voluptatem aut ut rerum temporibus aut. Et dicta et quaerat sit vero tenetur.

Laboriosam quia illo rerum non dolor vitae labore. Omnis nihil officiis in ipsam quia sunt. Praesentium itaque qui esse voluptates ex tempora.

Placeat cupiditate laborum voluptas iste error et quasi alias. Rerum mollitia exercitationem sequi delectus dolor voluptas minus esse. Voluptatibus fugiat cumque ut necessitatibus nam. Ducimus quos placeat aut et dolor.

Accusantium saepe illo voluptatibus tenetur quo voluptates. Quas omnis est et similique quisquam itaque sed. Vitae ex nobis autem natus suscipit debitis deleniti.',
                'image' => 'https://past-service.s3.eu-north-1.amazonaws.com/car_photos/17/20241013152303-670be5d79387d.jpg',
                'is_published' => 1,
                'published_at' => '2025-06-10 08:02:16',
                'category_id' => 3,
                'magazine_id' => 1,
                'meta_title' => 'Assumenda quae et ut id voluptatibus eos.',
                'meta_description' => 'Est quam autem quasi nemo ad atque. Tempore aut id ipsa fuga dignissimos deleniti. Rerum et necessitatibus in et distinctio. Quidem sed veniam alias.',
                'meta_keywords' => 'rerum, voluptatem, officiis, molestiae, quas',
                'robots' => 'index, follow',
                'created_at' => '2025-06-13 09:34:18',
                'updated_at' => '2025-06-13 09:34:18',
            ),
        ));


    }
}
