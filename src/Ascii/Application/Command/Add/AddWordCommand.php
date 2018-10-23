<?php

namespace Ascii\Application\Command\Add;

class AddWordCommand
{
    /** @var string */
    private $name;

    /**
     * AddWordCommand constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}