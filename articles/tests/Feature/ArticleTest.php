<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Tag;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_article()
    {
        $tag = Tag::factory()->create();
        $articleData = [
            'title' => 'Test Article',
            'content' => 'This is a test article content.',
            'author' => 'Test Author',
            'status' => 'draft',
            'category' => 'technology',
            'tags' => [$tag->id],
        ];

        $response = $this->post('/articles', $articleData);

        $response->assertStatus(302); // Redirect after creation
        $this->assertDatabaseHas('articles', [
            'title' => 'Test Article',
            'content' => 'This is a test article content.',
            'author' => 'Test Author',
            'status' => 'draft',
            'category' => 'technology',
        ]);

        $article = \App\Models\articles::where('title', 'Test Article')->first();
        $this->assertDatabaseHas('article_tag', [
            'article_id' => $article->id,
            'tag_id' => $tag->id,
        ]);
    }

    public function test_can_view_articles_index()
    {
        $response = $this->get('/articles');
        $response->assertStatus(200);
    }

    public function test_can_view_single_article()
    {
        $article = \App\Models\articles::factory()->create();

        $response = $this->get("/articles/{$article->id}");
        $response->assertStatus(200);
    }
}