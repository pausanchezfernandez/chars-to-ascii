<?php

namespace Ascii\Application\Query\FindAll;

use Ascii\Domain\Model\Word\WordRepository;

class FindAllWordsService
{
    /**@var WordRepository */
    private $wordRepository;

    /**
     * AddWordService constructor.
     * @param WordRepository $wordRepository
     */
    public function __construct(WordRepository $wordRepository)
    {
        $this->wordRepository = $wordRepository;
    }

    public function findAll()
    {
        return $this->wordRepository->findAll();
    }
}