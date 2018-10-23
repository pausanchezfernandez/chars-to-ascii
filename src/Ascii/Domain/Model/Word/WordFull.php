<?php

namespace Ascii\Domain\Model\Word;

use Ascii\Domain\Model\Exceptions\InvalidWord;

class WordFull
{
    /** @var string */
    private $word;

    /**
     * WordFull constructor.
     * @param string $word
     * @throws InvalidWord
     */
    public function __construct(string $word)
    {
        $this->guardNameIsNotEmpty($word);
        $this->guardNameIsNotSpace($word);
        $this->word = $word;
    }

    public function getValue()
    {
        return $this->word;
    }

    private function guardNameIsNotEmpty($word)
    {
        if (empty($word)) {
            throw new InvalidWord();
        }
    }

    private function guardNameIsNotSpace($word)
    {
        if (strpos($word, " ")) {
            throw new InvalidWord();
        }
    }


}