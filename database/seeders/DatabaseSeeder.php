<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::create ([
        //     'name' => 'Rizki Iqbal Muladi',
        //     'email' => 'roxashiqbal12@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        // User::create ([
        //     'name' => 'Ario Yusuf Muladi',
        //     'email' => 'arioyusufmuladi@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        User::factory(5)->create();

        Category::create ([
            'name' => 'Programming',
            'slug' => 'programming'
        ]);


        Category::create ([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Category::create ([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Category::create ([
            'name' => 'Vacation',
            'slug' => 'vacation'
        ]);

        Category::create ([
            'name' => 'Horror',
            'slug' => 'horror'
        ]);

        Post::factory(30)->create();

        // Post::create ([
        //     'title' => 'Halaman Pertama',
        //     'slug' => 'halaman-pertama',
        //     'category_id' => 1,
        //     'user_id' => 1,
        //     'excerpt' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Ad perferendis amet eaque facilis similique ducimus id, ab ea distinctio nobis odio quidem. Beatae nulla sequi temporibus aut dolores',
        //     'body' => '<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad perferendis amet eaque facilis similique ducimus id, ab ea distinctio nobis odio quidem. Beatae nulla sequi temporibus aut dolores, enim doloribus necessitatibus,</p> <p>ut eligendi vel nobis! Odit porro ratione totam, molestiae atque quia perferendis vitae unde asperiores enim repudiandae rerum ipsa quisquam maiores, delectus in eum ducimus eaque deserunt pariatur? Placeat porro earum doloribus vel impedit consequatur totam, minus harum ipsam libero saepe,</p><p> labore nulla voluptatibus consequuntur? Labore, sit pariatur dolorem consequatur consectetur nostrum asperiores rem assumenda repellat et, quidem, porro odio nihil nisi quia ea velit esse totam? Ratione, ipsa!</p>'
        // ]);

        // Post::create ([
        //     'title' => 'Halaman Kedua',
        //     'slug' => 'halaman-kedua',
        //     'category_id' => 2,
        //     'user_id' => 1,
        //     'excerpt' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Ad perferendis amet eaque facilis similique ducimus id, ab ea distinctio nobis odio quidem. Beatae nulla sequi temporibus aut dolores',
        //     'body' => '<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad perferendis amet eaque facilis similique ducimus id, ab ea distinctio nobis odio quidem. Beatae nulla sequi temporibus aut dolores, enim doloribus necessitatibus,</p> <p>ut eligendi vel nobis! Odit porro ratione totam, molestiae atque quia perferendis vitae unde asperiores enim repudiandae rerum ipsa quisquam maiores, delectus in eum ducimus eaque deserunt pariatur? Placeat porro earum doloribus vel impedit consequatur totam, minus harum ipsam libero saepe,</p><p> labore nulla voluptatibus consequuntur? Labore, sit pariatur dolorem consequatur consectetur nostrum asperiores rem assumenda repellat et, quidem, porro odio nihil nisi quia ea velit esse totam? Ratione, ipsa!</p>'
        // ]);


        // Post::create ([
        //     'title' => 'Halaman Ketiga',
        //     'slug' => 'halaman-ketiga',
        //     'category_id' => 2,
        //     'user_id' => 2,
        //     'excerpt' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Ad perferendis amet eaque facilis similique ducimus id, ab ea distinctio nobis odio quidem. Beatae nulla sequi temporibus aut dolores',
        //     'body' => '<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad perferendis amet eaque facilis similique ducimus id, ab ea distinctio nobis odio quidem. Beatae nulla sequi temporibus aut dolores, enim doloribus necessitatibus,</p> <p>ut eligendi vel nobis! Odit porro ratione totam, molestiae atque quia perferendis vitae unde asperiores enim repudiandae rerum ipsa quisquam maiores, delectus in eum ducimus eaque deserunt pariatur? Placeat porro earum doloribus vel impedit consequatur totam, minus harum ipsam libero saepe,</p><p> labore nulla voluptatibus consequuntur? Labore, sit pariatur dolorem consequatur consectetur nostrum asperiores rem assumenda repellat et, quidem, porro odio nihil nisi quia ea velit esse totam? Ratione, ipsa!</p>'
        // ]);
    }
}
