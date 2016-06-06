<?php
namespace Blog\Domain\Model;

/**
 * @author Freek Lijten
 */
interface PostRepository
{
    /**
     * @param Post $post
     */
    public function newDraft(Post $post);
}