<?php

namespace Ascii\Domain\Model\Character;

class Character
{
    private $character;
    private $ascii;

    /**
     * Character constructor.
     * @param $character
     * @param $ascii
     */
    public function __construct($character, $ascii)
    {
        $this->character = $character;
        $this->ascii = $ascii;
    }

    /**
     * @return mixed
     */
    public function getCharacter()
    {
        return $this->character;
    }

    /**
     * @return mixed
     */
    public function getAscii()
    {
        return $this->ascii;
    }

}