<?php

namespace Laasri\Repositories\Post;

interface PostRepositoryInterface {

    /**
     * Get all posts.
     *
     * @return mixed
     */
    public function getAll();

    /**
     * Get post with a matching slug.
     *
     * @param $slug
     * @return mixed
     */
    public function findBySlug($slug);

    /**
     * Get all posts with a given tag name.
     *
     * @param $tag
     * @return mixed
     */
    public function findByTag($tag);
}