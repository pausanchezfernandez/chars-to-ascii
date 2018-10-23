<?php

namespace Ascii\Domain\Model\Word;

class Word
{
    /** @var WordId */
    private $wordId;
    /** @var WordOcurredOn */
    private $wordOcurredOn;
    /** @var WordFull */
    private $wordFull;

    /**
     * Word constructor.
     * @param WordId $wordId
     * @param WordOcurredOn $wordOcurredOn
     * @param WordFull $wordFull
     */
    public function __construct(WordId $wordId, WordOcurredOn $wordOcurredOn, WordFull $wordFull)
    {
        $this->wordId = $wordId;
        $this->wordOcurredOn = $wordOcurredOn;
        $this->wordFull = $wordFull;
    }

    /**
     * @return WordId
     */
    public function getWordId(): WordId
    {
        return $this->wordId;
    }

    /**
     * @return WordOcurredOn
     */
    public function getWordOcurredOn(): WordOcurredOn
    {
        return $this->wordOcurredOn;
    }

    /**
     * @return WordFull
     */
    public function getWordFull(): WordFull
    {
        return $this->wordFull;
    }
}