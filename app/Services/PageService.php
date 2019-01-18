<?php

namespace App\Services;

use App\Repositories\PageRepository;

class PageService
{
    protected $pageRepo;

    public function __construct(PageRepository $pageRepo)
    {
        $this->pageRepo = $pageRepo;
    }

    public function getPage($slug)
    {
        $page = $this->pageRepo->getPage([
            'slug' => $slug,
        ]);

        return $page;
    }

    public function getPageUrl($slug)
    {
        return $this->pageRepo->getPageUrl($slug);
    }

    public function checkUrl($urlArr, $lastSlug)
    {
        $resultUrl = '';
        foreach ($urlArr as $url) {
            $page = $this->getPageUrl($url);
            $resultUrl = $resultUrl.$page->slug.'/';
        }

        return $resultUrl.$lastSlug;
    }
}