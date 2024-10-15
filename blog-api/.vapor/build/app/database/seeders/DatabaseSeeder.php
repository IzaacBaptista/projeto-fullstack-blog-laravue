<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Helpers\JsonReader;
use App\Models\Category;
use App\Models\Author;
use App\Models\Article;
use App\Models\Content;
use App\Models\Reference;
use App\Models\User;
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
                    'email' => $authorData['author-email'] ?? null,
                    'phone' => $authorData['author-phone'] ?? null
                ]);

                $usuario = User::create([
                    'name' => $authorData['author-name'],
                    'email' => $authorData['author-email'],
                    'type' => 1
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
                    'image' => '/images/categories/' . strtolower(str_replace([' ', '/'], '-', $articleData['category'][0]['title'])) . '.jpg'
                ]);


                $article = Article::create([
                    'id_category' => $category->id ?? null,
                    'id_author' => $author->id ?? null,
                    'data' => $articleData['data'] ?? null,
                    'time_read' => $articleData['time_read'] ?? null,
                    'title' => $articleData['title'] ?? null,
                    'blockquote' => $articleData['blockquote'] ?? null,
                    'image' => '/images/featured/featured-' . $articleData['id'] . '.jpg',
                    'updated_at' => $articleData['updated_at'] ?? null
                ]);

                $contentKeys = preg_grep('/^content-\d+$/', array_keys($articleData));
                foreach ($contentKeys as $key) {
                    $contentNumber = explode('-', $key)[1];
                    Content::create([
                        'article_id' => $article->id,
                        'content_number' => $contentNumber,
                        'content' => $articleData[$key],
                    ]);
                }

                $referenceKeys = preg_grep('/^referencia-\d+$/', array_keys($articleData));
                foreach ($referenceKeys as $key) {
                    $referenceNumber = explode('-', $key)[1];
                    Reference::create([
                        'article_id' => $article->id,
                        'reference_number' => $referenceNumber,
                        'reference' => $articleData[$key],
                    ]);
                }

            }
        } else {
            dd($json->export()['articles']);
        }
    }
}
