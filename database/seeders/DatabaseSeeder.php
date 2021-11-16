<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{User, Post, Category};
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Mochamad Rizky',
            'username' => 'rizkyzet',
            'email' => 'rizkyzetzet121@gmail.com',
            'password' => bcrypt('qwer121')
        ]);
        User::factory(3)->create();

        // User::insert([[
        //     'name' => 'Mochamad Rizky',
        //     'email' => 'rizkyzetzet121@gmail.com',
        //     'password' => Hash::make('qwer121')
        // ], [
        //     'name' => 'Sandhika Galih',
        //     'email' => 'sandhika@gmail.com',
        //     'password' => Hash::make('qwer121')
        // ]]);

        DB::table('categories')->insert([[
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ], [
            'name' => 'Web Design',
            'slug' => 'web-design'
        ], [
            'name' => 'Personal',
            'slug' => 'personal'
        ]]);

        Post::factory(20)->create();

        // Post::insert([
        //     [
        //         'category_id' => 1,
        //         'user_id' => 1,
        //         'title' => 'Judul Pertama',
        //         'slug' => 'judul-pertama',
        //         'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, odio consequuntur vero, quaerat fuga, sequi illo incidunt doloribus in magni velit.',
        //         'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, odio consequuntur vero, quaerat fuga, sequi illo incidunt doloribus in magni velit. Deserunt quaerat aliquam repudiandae doloribus in explicabo facilis, cumque doloremque excepturi, sequi ipsam cupiditate hic officiis dolor corrupti architecto eius quasi ex eum itaque. Atque consequatur recusandae rerum ex? Possimus rerum distinctio impedit pariatur, error, adipisci quisquam cum repudiandae expedita, corrupti maxime tenetur iusto rem exercitationem magni odit.</p><p>Nemo repudiandae necessitatibus sapiente hic consectetur! Impedit obcaecati distinctio repudiandae quibusdam quos, maxime, perspiciatis modi eum quaerat earum dolor minus eveniet exercitationem nesciunt pariatur aperiam reprehenderit necessitatibus, est provident porro aliquam deserunt! Eligendi, reprehenderit voluptatem.</p><p>Corporis neque dolore quibusdam voluptates possimus eveniet sapiente quod libero laborum voluptatem officiis, fugiat fuga delectus provident dolorem ipsa, eaque expedita, aliquid quaerat ipsum amet illo asperiores beatae itaque. Necessitatibus voluptas officiis dolor illum, cumque veritatis itaque dignissimos perspiciatis a quo debitis labore culpa autem nostrum.</p>'
        //     ], [
        //         'category_id' => 1,
        //         'user_id' => 1,
        //         'title' => 'Judul ke Dua',
        //         'slug' => 'judul-ke-dua',
        //         'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, odio consequuntur vero, quaerat fuga, sequi illo incidunt doloribus in magni velit.',
        //         'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, odio consequuntur vero, quaerat fuga, sequi illo incidunt doloribus in magni velit. Deserunt quaerat aliquam repudiandae doloribus in explicabo facilis, cumque doloremque excepturi, sequi ipsam cupiditate hic officiis dolor corrupti architecto eius quasi ex eum itaque. Atque consequatur recusandae rerum ex? Possimus rerum distinctio impedit pariatur, error, adipisci quisquam cum repudiandae expedita, corrupti maxime tenetur iusto rem exercitationem magni odit.</p><p>Nemo repudiandae necessitatibus sapiente hic consectetur! Impedit obcaecati distinctio repudiandae quibusdam quos, maxime, perspiciatis modi eum quaerat earum dolor minus eveniet exercitationem nesciunt pariatur aperiam reprehenderit necessitatibus, est provident porro aliquam deserunt! Eligendi, reprehenderit voluptatem.</p><p>Corporis neque dolore quibusdam voluptates possimus eveniet sapiente quod libero laborum voluptatem officiis, fugiat fuga delectus provident dolorem ipsa, eaque expedita, aliquid quaerat ipsum amet illo asperiores beatae itaque. Necessitatibus voluptas officiis dolor illum, cumque veritatis itaque dignissimos perspiciatis a quo debitis labore culpa autem nostrum.</p>'

        //     ],
        //     [
        //         'category_id' => 2,
        //         'user_id' => 2,
        //         'title' => 'Judul ke Tiga',
        //         'slug' => 'judul-ke-tiga',
        //         'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, odio consequuntur vero, quaerat fuga, sequi illo incidunt doloribus in magni velit.',
        //         'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, odio consequuntur vero, quaerat fuga, sequi illo incidunt doloribus in magni velit. Deserunt quaerat aliquam repudiandae doloribus in explicabo facilis, cumque doloremque excepturi, sequi ipsam cupiditate hic officiis dolor corrupti architecto eius quasi ex eum itaque. Atque consequatur recusandae rerum ex? Possimus rerum distinctio impedit pariatur, error, adipisci quisquam cum repudiandae expedita, corrupti maxime tenetur iusto rem exercitationem magni odit.</p><p>Nemo repudiandae necessitatibus sapiente hic consectetur! Impedit obcaecati distinctio repudiandae quibusdam quos, maxime, perspiciatis modi eum quaerat earum dolor minus eveniet exercitationem nesciunt pariatur aperiam reprehenderit necessitatibus, est provident porro aliquam deserunt! Eligendi, reprehenderit voluptatem.</p><p>Corporis neque dolore quibusdam voluptates possimus eveniet sapiente quod libero laborum voluptatem officiis, fugiat fuga delectus provident dolorem ipsa, eaque expedita, aliquid quaerat ipsum amet illo asperiores beatae itaque. Necessitatibus voluptas officiis dolor illum, cumque veritatis itaque dignissimos perspiciatis a quo debitis labore culpa autem nostrum.</p>'
        //     ]
        // ]);
    }
}
