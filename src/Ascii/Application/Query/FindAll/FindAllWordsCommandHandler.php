<?php

namespace Ascii\Application\Query\FindAll;

class FindAllWordsCommandHandler
{
    /**@var FindAllWordsService */
    private $service;

    /**
     * AddWordCommandHandler constructor.
     * @param FindAllWordsService $service
     */
    public function __construct(FindAllWordsService $service)
    {
        $this->service = $service;
    }

    /**
     * @throws \Exception
     */
    public function handle()
    {
        return $this->service->findAll();
    }
}