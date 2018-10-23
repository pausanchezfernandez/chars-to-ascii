<?php

namespace Ascii\Application\Command\Add;

use Ascii\Domain\Model\Word\Word;
use Ascii\Domain\Model\Word\WordFull;
use Ascii\Domain\Model\Word\WordId;
use Ascii\Domain\Model\Word\WordOcurredOn;

class AddWordCommandHandler
{
    /**@var AddWordService */
    private $service;

    /**
     * AddWordCommandHandler constructor.
     * @param AddWordService $service
     */
    public function __construct(AddWordService $service)
    {
        $this->service = $service;
    }

    /**
     * @param AddWordCommand $command
     * @throws \Exception
     */
    public function handle(AddWordCommand $command)
    {
        $this->service->add(
            new Word(
                WordId::generate(),
                WordOcurredOn::generate(),
                new WordFull($command->getName())
            )
        );
    }
}