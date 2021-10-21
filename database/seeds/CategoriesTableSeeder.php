<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_name = ['Intrattenimento', 'Cultura', 'Scienza', 'Politica', 'Medicina', 'News'];
        foreach ($category_name as $name) {
            $category = new Category();

            $category->name = $name;
            $category->slug = Str::slug($name, '-');
            $category->save();
        }
    }
}
