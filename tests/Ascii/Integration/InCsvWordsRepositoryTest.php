<?php

namespace Tests\Ascii\Integration;

use Ascii\Domain\Model\Word\Word;
use Ascii\Domain\Model\Word\WordFull;
use Ascii\Domain\Model\Word\WordId;
use Ascii\Domain\Model\Word\WordOcurredOn;
use Ascii\Infrastructure\CSV\InCsvWordsRepository;
use Ramsey\Uuid\Uuid;
use Tests\AsciiTestCase;

class InCsvWordsRepositoryTest extends AsciiTestCase
{
    /** @var InCsvWordsRepository */
    private $csvRepository;


    public function setUp()
    {
        $this->csvRepository = new InCsvWordsRepository();
    }

    /** @test */
    public function shouldDeleteAndAddWord()
    {
        $uuid = Uuid::uuid4()->toString();
        $idWord=new WordId($uuid);
        $beforeCount = $this->csvRepository->count();
        $word =  new Word(
            $idWord,
            WordOcurredOn::generate(),
            new WordFull("pepitoborrado")
        );
        $this->csvRepository->add($word);
        $this->assertEquals($beforeCount+1, $this->csvRepository->count());
        $this->csvRepository->delete($idWord);
        $beforeCount = $this->csvRepository->count();
        $this->assertEquals($beforeCount, $this->csvRepository->count());
    }

    /** @test */
    public function ShouldReturnArrayWord()
    {
        $words=$this->csvRepository->findAll();
        $this->assertEquals(true, is_array($words));
    }



}