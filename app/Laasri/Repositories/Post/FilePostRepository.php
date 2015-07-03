<?php

namespace Laasri\Repositories\Post;

use Laasri\Exceptions\EntityNotFoundException;

class FilePostRepository implements PostRepositoryInterface {

    /**
     * @var Manager
     */
    protected $manager;

    /**
     * @param Manager $manager
     */
    public function __construct(Manager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * Get all posts.
     *
     * @return mixed
     */
    public function getAll()
    {
        return $this->manager->posts();
    }

    /**
     * Get post with a matching slug.
     *
     * @param $slug
     * @return mixed
     * @throws EntityNotFoundException
     */
    public function findBySlug($slug)
    {
        $post = $this->manager->posts()->filter(function ($post) use($slug) {
            return $post['slug'] == $slug;
        })->first();

        if(empty($post)){
            throw new EntityNotFoundException;
        }

        return $post;
    }

    /**
     * Get all posts with a given tag name.
     *
     * @param $tag
     * @return mixed
     * @throws EntityNotFoundException
     */
    public function findByTag($tag)
    {
        $posts = $this->manager->posts()->filter(function ($post) use($tag) {
            return in_array($tag, $post['tags']);
        })->values();

        if($posts->isEmpty()){
            throw new EntityNotFoundException;
        }

        return $posts;
    }
}