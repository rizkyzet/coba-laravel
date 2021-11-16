<?php

namespace App\Models;

class Post
{
    private static $blog_posts = [
        [

            'title' => 'Judul Post Pertama',
            'slug' => 'judul-post-pertama',
            'author' => 'Muhamad Rizki',
            'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quo nihil qui natus obcaecati doloribus, totam quisquam
            quas sed iusto possimus optio vitae soluta ea exercitationem veniam vero placeat quidem fuga. Architecto eligendi
            voluptate nam, illo magni rem quas accusamus dolor ex molestiae. Illo quas, nihil quibusdam, dolorem voluptatum sint
            voluptatibus dolores optio quam est ipsam architecto magni eum? Assumenda, quod quisquam aliquid, explicabo sequi
            deserunt iusto reiciendis officia quidem vitae hic itaque provident dolorum vel voluptas. Officia quis voluptate
            omnis.'
        ], [
            'title' => 'Judul Post Kedua',
            'slug' => 'judul-post-kedua',
            'author' => 'Sandhika Galih',
            'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatibus blanditiis ratione et culpa! Dolor
            accusantium et magni quam quos at, iusto a. At non nihil consequatur maiores tenetur? Veniam, quaerat. Perspiciatis
            corporis nulla ut totam quod nobis distinctio minima laborum sit, numquam cupiditate, odio eaque hic ab cumque illo
            expedita molestiae atque, et nemo vel impedit veritatis? Dignissimos voluptates adipisci nulla, necessitatibus totam
            numquam odit ad magnam facere, quae, cupiditate animi labore illo doloribus aliquid ea nesciunt ipsa hic optio
            omnis? Mollitia accusamus quibusdam sapiente eveniet veritatis, eius ea repellat.'
        ], [
            'title' => 'Judul Post Ketiga',
            'slug' => 'judul-post-ketiga',
            'author' => 'Eko Kurniawan Khannedy',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident molestiae dolorem, eveniet ducimus minima
            voluptatibus, aspernatur error veniam animi nihil maiores explicabo porro aperiam inventore, ad id? Reprehenderit
            nobis, excepturi tenetur repudiandae quod aspernatur placeat velit et laboriosam facere dolorem nihil doloribus
            aperiam perferendis, saepe repellat vel quia dolor, fugiat incidunt ab maxime explicabo tempora? Vero architecto
            inventore placeat ratione id qui illo iusto veniam, libero asperiores delectus amet ipsam repellat vitae eaque
            praesentium, fugiat a nemo reprehenderit eius odio illum. Porro accusantium aspernatur sed, quam odio minus.'
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
        //     if ($p['slug'] === $slug) {
        //         $post = $p;
        //     }
        // }
        return $posts->firstWhere('slug', $slug);
    }
}
