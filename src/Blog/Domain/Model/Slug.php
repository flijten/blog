<?php
namespace Blog\Domain\Model;
use DateTimeImmutable;

/**
 * @author Freek Lijten
 */
class Slug
{
    /**
     * @var DateTimeImmutable
     */
    private $blogDate;
    /**
     * @var PostTitle
     */
    private $blogTitle;

    /**
     * Slug constructor.
     * @param DateTimeImmutable $blogDate
     * @param PostTitle $blogTitle
     */
    public function __construct(DateTimeImmutable $blogDate, PostTitle $blogTitle)
    {
        $this->blogDate = $blogDate;
        $this->blogTitle = $blogTitle;
    }

    public function asString()
    {
        $title = $this->blogTitle->asString();
        $title = preg_replace('/[\s\-\/]+/', '-', $title);
        $title = preg_replace('/[^\w\-\_\.]+/', '', $title);

        return sprintf(
            '%s/%s/%s/%s',
            $this->blogDate->format('Y'),
            $this->blogDate->format('m'),
            $this->blogDate->format('d'),
            preg_replace('/\s+/', '-', $title)
        );
    }
}