<?php

namespace Tests\Ascii\Behaviour\Command\Delete;

use Ascii\Application\Command\Delete\DeleteWordCommand;
use \Ascii\Application\Command\Delete\DeleteWordCommandHandler;
use Ascii\Application\Command\Delete\DeleteWordService;
use Ascii\Domain\Model\Word\WordRepository;
use Mockery;
use Ramsey\Uuid\Uuid;
use Tests\AsciiTestCase;

class DeleteWordCommandHandlerTest extends AsciiTestCase
{
    /**
     * @test
     */
    public function shouldDeleteWord()
    {
        $uuid = Uuid::uuid4()->toString();
        $command= new DeleteWordCommand($uuid);
        $wordRepository = Mockery::mock(WordRepository::class );
        $commandHandler=new DeleteWordCommandHandler(new DeleteWordService($wordRepository));
        $wordRepository->shouldReceive('delete')->andReturnNull();
        $commandHandler->handle($command);
    }

}