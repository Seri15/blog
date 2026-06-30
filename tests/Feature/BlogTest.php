<?php

namespace Tests\Feature;

use App\Models\Blog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BlogTest extends TestCase
{
    use RefreshDatabase;
    public function test_blog_can_be_updated_without_uploading_a_new_image(): void
    {
        $blog = Blog::create([
            'image' => 'old-image.jpg',
            'title' => 'Old title',
            'content' => 'Old content',
        ]);

        $response = $this->put(route('blogs.update', $blog), [
            'title' => 'Updated title',
            'content' => 'Updated content',
        ]);

        $response->assertRedirect(route('blogs.index'));
        $this->assertDatabaseHas('blogs', [
            'id' => $blog->id,
            'title' => 'Updated title',
            'content' => 'Updated content',
            'image' => 'old-image.jpg',
        ]);
    }
}
