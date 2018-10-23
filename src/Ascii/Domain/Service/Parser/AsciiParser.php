<?php

namespace Ascii\Domain\Service\Parser;

use Ascii\Domain\Model\Character\Character;

class AsciiParser
{

    public function parse(string $word): array
    {
        $characters=str_split($word);
        $parsed = [];
        foreach ($characters as $character){
            try {
                $parsed[] = new Character(
                    $character,
                    ord($character));

            }catch (\Exception $exception) {
                throw new \Exception('Invalid data recieved');
            }
        }

        return $parsed;
    }

    public function sumAscii($parsed)
    {
        $sum=0;
        foreach($parsed as $item){
            $sum=$sum+$item->getAscii();
        }
        return $sum;
    }

}