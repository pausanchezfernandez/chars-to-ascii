<?php

namespace Ascii\Application\Command\Add;

use Ascii\Domain\Model\Word\Word;
use Ascii\Domain\Model\Word\WordRepository;

class AddWordService
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

    public function add(Word $word)
    {
        $this->wordRepository->add($word);
    }
}