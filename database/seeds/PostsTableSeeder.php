<?php

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 50; $i++) {
            $post = new Post();
            $post->title = $faker->text(100);
            $post->content = $faker->paragraphs(3, true);
            $post->slug = Str::slug($post->title, '-');
            $post->url = $faker->imageUrl(200, 200);
            $post->save();
        }
    }
}