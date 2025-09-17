<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_article()
    {
        $articleData = [
            'title' => 'Test Article',
            'content' => 'This is a test article content.',
            'author' => 'Test Author',
            'status' => 'draft',
            'category' => 'technology'
        ];

        $response = $this->post('/articles', $articleData);

        $response->assertStatus(302); // Redirect after creation
        $this->assertDatabaseHas('articles', $articleData);
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