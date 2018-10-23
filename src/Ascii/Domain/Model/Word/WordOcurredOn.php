<?php

namespace Ascii\Domain\Model\Word;

class WordOcurredOn
{
    /** @var string */
    private $date;

    /**
     * WordOcurredOn constructor.
     * @param string $date
     */
    public function __construct(string $date)
    {
        $this->date = $date;
    }

    public function getValue()
    {
        return $this->date;
    }

    public static function generate()
    {
        return new WordOcurredOn((new \DateTimeImmutable())->format('Y-m-d H:i:s'));
    }

}