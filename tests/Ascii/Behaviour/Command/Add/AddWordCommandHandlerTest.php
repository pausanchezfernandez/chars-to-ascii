<?php

namespace Tests\Ascii\Behaviour\Command\Add;

use Ascii\Application\Command\Add\AddWordCommand;
use Ascii\Application\Command\Add\AddWordCommandHandler;
use Ascii\Application\Command\Add\AddWordService;
use Ascii\Domain\Model\Word\Word;
use Ascii\Domain\Model\Word\WordFull;
use Ascii\Domain\Model\Word\WordId;
use Ascii\Domain\Model\Word\WordOcurredOn;
use Ascii\Domain\Model\Word\WordRepository;
use Mockery;
use Ramsey\Uuid\Uuid;
use Tests\AsciiTestCase;

class AddWordCommandHandlerTest extends AsciiTestCase
{
     /**
      * @test
      * @expectedException \Ascii\Domain\Model\Exceptions\InvalidWord
      */
     public function shouldNotAddWordOnInvalidName()
     {
         $command= new AddWordCommand("test test");
         $wordRepository=Mockery::mock(WordRepository::class );
         $commandHandler=new AddWordCommandHandler(new AddWordService($wordRepository));
         $commandHandler->handle($command);
     }

    /**
     * @test
     * @expectedException \Ascii\Domain\Model\Exceptions\InvalidWord
     */
    public function shouldNotAddEmptyWordOnInvalidName()
    {
        $command= new AddWordCommand("");
        $wordRepository=Mockery::mock(WordRepository::class );
        $commandHandler=new AddWordCommandHandler(new AddWordService($wordRepository));
        $commandHandler->handle($command);
    }

    public function shouldAddWord()
    {
        $command= new AddWordCommand("pepito");
        $wordRepository=Mockery::mock(WordRepository::class );
        $commandHandler=new AddWordCommandHandler(new AddWordService($wordRepository));
        $wordRepository->shouldReceive('add')->andReturnNull();
        $commandHandler->handle($command);
    }


}