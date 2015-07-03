<?php

namespace App\Http\Controllers;

use Laasri\Repositories\Post\PostRepositoryInterface;

class PostsController extends Controller
{
    /**
     * @var PostRepositoryInterface
     */
    protected $posts;

    /**
     * @param PostRepositoryInterface $posts
     */
    public function __construct(PostRepositoryInterface $posts)
    {
        $this->posts = $posts;
    }

    /**
     * Get all the posts.
     *
     * @return mixed
     */
    public function all()
    {
        return $this->posts->getAll();
    }

    /**
     * Get the post with a matching slug.
     *
     * @param $slug
     * @return mixed
     */
    public function post($slug)
    {
        return $this->posts->findBySlug($slug);
    }

    /**
     * Get all posts associated with a given tag.
     *
     * @param $tag
     * @return mixed
     */
    public function tag($tag)
    {
        return $this->posts->findByTag($tag);
    }
}
