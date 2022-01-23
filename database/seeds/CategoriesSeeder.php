<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Horror', 'Romantico', 'Commedia', 'Thriller', 'Documentario'];

        foreach ($categories as $category) {
            $new_category = new Category();
            $new_category->name = $category;
            $new_category->save();
        }

    }
}
