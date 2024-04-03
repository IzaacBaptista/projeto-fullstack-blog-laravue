<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Helpers\JsonReader;
use App\Models\Category;
use App\Models\Author;
use App\Models\Article;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(JsonReader $json)
    {
        $json->read(storage_path('app/seeds/central/authors.json'));

        if ($json->export()['authors']) {

            foreach ($json->export()['authors'] as $authorData) {
                $author = Author::firstOrCreate([
                    'id_user' => 3,
                    'name' => $authorData['author-name'] ?? null,
                    'surname' => $authorData['author-surname'] ?? null,
                    'about' => $authorData['author-about'] ?? null,
                    'image' => $authorData['author-image'] ?? null,
                    'linkedin' => $authorData['author-linkedin'] ?? null,
                    'github' => $authorData['author-github'] ?? null,
                    'instagram' => $authorData['author-instagram'] ?? null,
                    'contact' => $authorData['author-contact'] ?? null
                ]);
            }
        } else {
            dd($json->export()['authors']);
        }

        $json->read(storage_path('app/seeds/central/articles.json'));

        if ($json->export()['articles']) {

            foreach ($json->export()['articles'] as $articleData) {
                $category = Category::firstOrCreate([
                    'name' => $articleData['category'][0]['title'],
                    'image' => '/images/categories/' . strtolower(str_replace(' ', '-', $articleData['category'][0]['title'])) . '.jpg'
                ]);

                $content = '';

                foreach ($articleData as $key => $value) {
                    if (strpos($key, 'content-') === 0) {
                        $content .= "<p>$value</p>";
                    } elseif (strpos($key, 'referencia-') === 0) {
                        $content .= "<p>- $value</p>";
                    }
                }

                $content = rtrim($content);

                Article::create([
                    'id_category' => $category->id ?? null,
                    'id_author' => $author->id ?? null,
                    'data' => $articleData['data'] ?? null,
                    'time_read' => $articleData['time_read'] ?? null,
                    'title' => $articleData['title'] ?? null,
                    'content' => $content ?? null,
                    'blockquote' => $articleData['blockquote'] ?? null,
                    'image' => '/images/featured/featured-' . $articleData['id'] . '.jpg',
                    'updated_at' => $articleData['updated_at'] ?? null
                ]);
            }
        } else {
            dd($json->export()['articles']);
        }
    }
}
