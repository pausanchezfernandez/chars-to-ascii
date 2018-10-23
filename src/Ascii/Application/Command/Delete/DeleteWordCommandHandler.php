<?php

namespace Ascii\Application\Command\Delete;

use Ascii\Domain\Model\Word\WordId;

class DeleteWordCommandHandler
{
    /**@var DeleteWordService */
    private $service;

    /**
     * AddWordCommandHandler constructor.
     * @param DeleteWordService $service
     */
    public function __construct(DeleteWordService $service)
    {
        $this->service = $service;
    }

    /**
     * @param DeleteWordCommand $command
     * @throws \Exception
     */
    public function handle(DeleteWordCommand $command)
    {
        $this->service->delete(
            new WordId($command->getId())
        );
    }
}