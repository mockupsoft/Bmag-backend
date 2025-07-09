<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Role::create(['name' => 'freelance editor', 'guard_name' => 'api']);
        //Role::create(['name' => 'editor', 'guard_name' => 'api']);
        //Role::create(['name' => 'chief editor', 'guard_name' => 'api']);
        //Permission::create(['name' => 'create post', 'guard_name' => 'api']);
        //Permission::create(['name' => 'edit post', 'guard_name' => 'api']);
        //Permission::create(['name' => 'publish post', 'guard_name' => 'api']);
        //$role = Role::findByName('editor', 'api');
        //$role->givePermissionTo(['create post', 'edit post']);

        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);
        $this->call(ModelHasRolesTableSeeder::class);
        $this->call(ModelHasPermissionsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(MagazinesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(MagazineIssuesTableSeeder::class);
        $this->call(SubscribersTableSeeder::class);
        $this->call(UserFavoritesTableSeeder::class);
        $this->call(SettingSeeder::class);
    }
}
