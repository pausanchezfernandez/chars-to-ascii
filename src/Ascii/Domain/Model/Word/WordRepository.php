<?php

namespace Ascii\Domain\Model\Word;


interface WordRepository
{
    public function add(Word $word);
    public function delete(WordId $id);
    public function findAll();
}