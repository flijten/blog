<?php declare(strict_types = 1);
namespace Blog\Application;
use Blog\Domain\Model\PostRepository;

/**
 * @author Freek Lijten
 */
class PublishPostHandler
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
     * @param PublishDraft $command
     */
    public function handle(PublishDraft $command)
    {
        $draft = $this->postRepository->byId($command->postId);
        $draft->publish($command->postDateTime);

        $this->postRepository->save($draft);
    }
}