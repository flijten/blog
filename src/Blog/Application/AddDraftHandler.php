<?php
namespace Blog\Application;
use Assert\InvalidArgumentException;
use Blog\Domain\Model\Post;
use Blog\Domain\Model\PostContent;
use Blog\Domain\Model\PostIntroduction;
use Blog\Domain\Model\PostRepository;
use Blog\Domain\Model\PostTitle;

/**
 * @author Freek Lijten
 */
class AddDraftHandler
{
    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * AddDraftHandler constructor.
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * @param AddDraft $command
     * @throws InvalidArgumentException
     */
    public function handle(AddDraft $command)
    {
        $this->postRepository->newDraft(Post::draft(
            new PostTitle($command->title),
            new PostIntroduction($command->introduction),
            new PostContent($command->content)
        ));
    }
}