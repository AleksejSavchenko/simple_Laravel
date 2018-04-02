<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call('UserTableSeeder');
        $this->call('ArticleTableSeeder');
        $this->call('RoleTableSeeder');

    }
}


class UserTableSeeder extends Seeder {

    public function run()
    {
        $users_count = 1;
        while($users_count <= 10){
            DB::table('users')->insert([
                'name' => $users_count === 1 ? 'admin' : 'user_' . $users_count,
                'email' => $users_count === 1 ? 'admin@gmail.com' : 'user' . $users_count.'@gmail.com',
                'password' => bcrypt('secret'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $users_count++;
        }

        $this->command->info('Таблица пользователей загружена данными!');
    }
}

class ArticleTableSeeder extends Seeder {

    public function run()
    {
        $article_count = 1;
        while($article_count <= 10){
            DB::table('articles')->insert([
                'title' => 'Заголовок ' . $article_count,
                'desc' => 'Описание ' . $article_count. '-й статьи.',
                'text' => 'Текст ' . $article_count. '-й статьи.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $article_count++;
        }

        $this->command->info('Таблица со статьями загружена данными!');
    }
}

class RoleTableSeeder extends Seeder {

    public function run()
    {
        $role_count = 1;
        while($role_count <= 2){
            DB::table('roles')->insert([
                'role' => $role_count === 1 ? 'admin' : 'user',
                'level_access' => $role_count,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $role_count++;
        }

        $this->command->info('Таблица roles загружена данными!');
    }
}