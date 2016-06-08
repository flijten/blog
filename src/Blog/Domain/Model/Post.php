<?php declare(strict_types=1);
namespace Blog\Domain\Model;
use Ramsey\Uuid\Uuid;

/**
 * @author Freek Lijten
 */
class Post
{
    /**
     * @var PostId
     */
    private $postId;

    /**
     * @var PostTitle
     */
    private $title;

    /**
     * @var PostIntroduction
     */
    private $introduction;

    /**
     * @var PostContent
     */
    private $content;

    private function __construct(){} // Nope!

    private function __clone(){} // Njet!

    /**
     * @param PostTitle $title
     * @param PostIntroduction $introduction
     * @param PostContent $content
     * @return Post
     */
    public static function draft(PostTitle $title, PostIntroduction $introduction, PostContent $content)
    {
        $draft = new self();
        $draft->postId = new PostId(Uuid::uuid4());
        $draft->title = $title;
        $draft->introduction = $introduction;
        $draft->content = $content;

        return $draft;
    }
}