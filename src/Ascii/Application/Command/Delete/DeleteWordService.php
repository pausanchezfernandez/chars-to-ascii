<?php

namespace Ascii\Application\Command\Delete;

use Ascii\Domain\Model\Word\WordId;
use Ascii\Domain\Model\Word\WordRepository;

class DeleteWordService
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

    public function delete(WordId $id)
    {
        $this->wordRepository->delete($id);
    }
}