<?php

namespace src\App\Helpers;

use Illuminate\Database\Eloquent\Collection;
use src\Model\Post;

class PostPageDivider
{
    public $postPerPage = 9;
    public $previousPosts = 0;
    public $previousPaginationClass = '';
    public $followingPosts = 0;
    public $followingPaginationClass = '';
    public $currentPagePosts;

    public function pageDivide(Collection $posts, $currentPage)
    {
        $postsSortedByDescChunked = $posts->sortByDesc('created_at')->chunk($this->postPerPage);
        $pagesQuantity = $postsSortedByDescChunked->count();

        if ($currentPage <= 0) {
            $currentPage = 1;
        } else if ($currentPage > $pagesQuantity) {
            $currentPage = $pagesQuantity;
        }

        $this->currentPagePosts = $postsSortedByDescChunked[$currentPage - 1];

        if ($currentPage === 1) {
            $this->followingPaginationClass = 'disabled';
            $this->previousPosts = ++$currentPage;
            $this->followingPosts = $currentPage;
        } else if ($currentPage === $pagesQuantity) {
            $this->previousPaginationClass = 'disabled';
            $this->previousPosts = $currentPage;
            $this->followingPosts = --$currentPage;
        } else {
            $this->previousPosts = $currentPage + 1;
            $this->followingPosts = $currentPage - 1;
        }
    }
}