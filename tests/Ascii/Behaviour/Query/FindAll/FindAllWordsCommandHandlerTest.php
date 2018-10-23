<?php

namespace Tests\Ascii\Behaviour\Query\FindAll;

use Ascii\Application\Query\FindAll\FindAllWordsCommandHandler;
use Ascii\Application\Query\FindAll\FindAllWordsService;
use Ascii\Domain\Model\Word\Word;
use Ascii\Domain\Model\Word\WordFull;
use Ascii\Domain\Model\Word\WordId;
use Ascii\Domain\Model\Word\WordOcurredOn;
use Ascii\Domain\Model\Word\WordRepository;
use Mockery;
use Ramsey\Uuid\Uuid;
use Tests\AsciiTestCase;

class FindAllWordsCommandHandlerTest extends AsciiTestCase
{

    /**
     * @test
     */
    public function shouldFindAllWords()
    {
        $uuid = Uuid::uuid4()->toString();
        $idWord=new WordId($uuid);
        $word =  new Word(
            $idWord,
            WordOcurredOn::generate(),
            new WordFull("pepitoborrado")
        );

        $wordRepository = Mockery::mock(WordRepository::class );
        $commandHandler=new FindAllWordsCommandHandler(new FindAllWordsService($wordRepository));
        $wordRepository
            ->shouldReceive('findAll')
            ->andReturnValues([
                $word->getWordId(),
                $word->getWordOcurredOn(),
                $word->getWordFull()
                ]);
        $commandHandler->handle();
    }
}