<?php declare(strict_types = 1);
namespace Blog\Application;
use Blog\Domain\Model\PostRepository;

/**
 * @author Freek Lijten
 */
class RetractPostHandler
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
     * @param RetractPost $command
     */
    public function handle(RetractPost $command)
    {
        $draft = $this->postRepository->byId($command->postId);
        $draft->retract();

        $this->postRepository->save($draft);
    }
}