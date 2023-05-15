<?php

namespace App\Models;

class Post
{
    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "author" => "Rizki Iqbal",
            "slug" => "judul-post-pertama",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque earum omnis mollitia! Veritatis non cupiditate fuga magnam exercitationem vero! Tenetur pariatur, officiis vitae quidem nostrum harum reprehenderit inventore atque sequi debitis non soluta vel, dolorem saepe consequuntur porro sapiente voluptates reiciendis, ipsum tempore possimus eligendi corrupti. Suscipit eligendi et numquam totam necessitatibus. Recusandae eligendi ratione ullam iste fugiat ducimus dignissimos doloremque voluptas consequuntur! Cum magnam a atque pariatur modi, expedita nam illum iure alias nostrum recusandae tempora dolorum perspiciatis voluptatum et quaerat nobis excepturi quibusdam aut voluptatem libero ad. Tempora inventore possimus vel. Autem est ipsam nesciunt asperiores optio quos!"
        ],
        [
            "title" => "Judul Post Kedua",
            "author" => "Bukan Rizki Iqbal",
            "slug" => "judul-post-kedua",
            "body" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut possimus tempora fugit accusantium atque nostrum dolorem explicabo perferendis totam itaque illum, magnam aperiam nesciunt deserunt. Doloribus maiores corrupti rem laudantium praesentium ipsum officiis quisquam atque! Non, quisquam libero doloribus voluptas dolorum iste beatae eos eveniet officiis ullam assumenda incidunt nobis dicta asperiores distinctio, velit laudantium adipisci. Magnam enim nam minima, voluptas vel quisquam iure necessitatibus quas tempore vitae, asperiores cumque vero quidem laboriosam laudantium aliquam ullam ad quam dolores, corporis autem! Beatae sapiente corporis explicabo debitis! Pariatur ut aliquam impedit, placeat repudiandae assumenda sapiente, quo dignissimos quos ratione magnam itaque molestiae quia dolor. Laboriosam, recusandae ipsa consequuntur cumque tempora voluptas eligendi inventore praesentium, nulla adipisci repellendus enim voluptatem sed quaerat nam officiis, omnis dolore hic dolorem expedita dolores! Et labore maiores voluptatem sapiente accusamus est, quod qui quae, excepturi nobis quisquam illo laboriosam recusandae placeat inventore? Repellat quae delectus deserunt.
            "
        ]
    ];


    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();

        // $post = [];
        // foreach ($posts as $p) {
        //     if ($p["slug"] === $slug) {
        //         $post = $p;
        //     }
        // } //metode purba

        return $posts->firstWhere('slug', $slug); //metode keren mengubah array biasa menjadi collection
    }
}
