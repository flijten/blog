<?php declare(strict_types=1);
namespace Blog\Domain\Model;
use DateTimeImmutable;
use Ramsey\Uuid\Uuid;

/**
 * @author Freek Lijten
 */
final class Post
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

    /**
     * @var bool
     */
    private $published = false;

    /**
     * @var DateTimeImmutable
     */
    private $postDateTime;

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

    /**
     * @param DateTimeImmutable $postDateTime
     */
    public function publish(DateTimeImmutable $postDateTime)
    {
        $this->postDateTime = $postDateTime;
        $this->published = true;
    }

    /**
     * @return PostId
     */
    public function getPostId() : PostId
    {
        return $this->postId;
    }

    /**
     * @return PostTitle
     */
    public function getTitle() : PostTitle
    {
        return $this->title;
    }

    /**
     * @return PostIntroduction
     */
    public function getIntroduction() : PostIntroduction
    {
        return $this->introduction;
    }

    /**
     * @return PostContent
     */
    public function getContent() : PostContent
    {
        return $this->content;
    }

    /**
     * @return bool
     */
    public function isPublished() : bool
    {
        return $this->published;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getPostDateTime() : DateTimeImmutable
    {
        return $this->postDateTime;
    }
}