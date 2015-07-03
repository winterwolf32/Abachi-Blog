<?php

namespace Laasri\Repositories\Post;

use Carbon\Carbon;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Kurenai\DocumentParser;

class Manager {

    /**
     * @var Collection
     */
    protected $posts;
    /**
     * @var Filesystem
     */
    protected $filesystem;
    /**
     * @var Document
     */
    protected $parser;

    /**
     * @param Collection $posts
     * @param Filesystem $filesystem
     * @param DocumentParser $parser
     */
    public function __construct(Collection $posts, Filesystem $filesystem, DocumentParser $parser)
    {
        $this->posts = $posts;
        $this->filesystem = $filesystem;
        $this->parser = $parser;
    }

    /**
     * Get a collection of posts.
     *
     * @return static
     */
    public function posts()
    {
        return $this->posts->make(

            array_map([$this, 'parse'], $this->getFiles())

        )->sortByDesc([$this, 'sort'])->values();
    }

    /**
     * Sort the collection.
     *
     * @param $item
     * @return int
     */
    public function sort($item)
    {
        return Carbon::createFromFormat('j M Y', $item['date'])->timestamp;
    }

    /**
     * Get all files from the posts directory.
     *
     * @return array
     */
    private function getFiles()
    {
        return $this->filesystem->files();
    }

    /**
     * Parse the file content.
     *
     * @param $file
     * @return array
     */
    private function parse($file)
    {
        $post = $this->parser->parse(
            $this->getContent($file)
        );

        return [
            'title'   => $post->get('title'),
            'date'    => $post->get('date'),
            'slug'    => $post->get('slug'),
            'tags'    => $this->getTags($post->get('tags')),
            'excerpt' => $post->get('excerpt'),
            'content' => $post->getHtmlContent()
        ];

    }

    /**
     * Get a single file content.
     *
     * @param $file
     * @return string
     */
    private function getContent($file)
    {
        return $this->filesystem->get($file);
    }

    /**
     * Parse the tag string to an array.
     *
     * @param $tags
     * @return array
     */
    private function getTags($tags)
    {
        return explode(', ', $tags);
    }
}