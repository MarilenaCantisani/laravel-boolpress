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
        $categories = [
            ['name' => 'Intrattenimento', 'color' => 'warning'],
            ['name' => 'Cultura', 'color' => 'success'],
            ['name' => 'Scienza', 'color' => 'info'],
            ['name' => 'Politica', 'color' => 'secondary'],
            ['name' => 'Medicina', 'color' => 'danger'],
            ['name' => 'News', 'color' => 'primary']

        ];
        foreach ($categories as $category) {
            $newCategory = new Category();

            $newCategory->name = $category['name'];
            $newCategory->color = $category['color'];
            $newCategory->slug = Str::slug($category['name'], '-');

            $newCategory->save();
        }
    }
}
