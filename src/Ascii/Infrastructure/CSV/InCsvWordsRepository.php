<?php

namespace Ascii\Infrastructure\CSV;

use Ascii\Domain\Model\Word\Word;
use Ascii\Domain\Model\Word\WordId;
use Ascii\Domain\Model\Word\WordRepository;
use Symfony\Component\Config\Definition\Exception\Exception;

class InCsvWordsRepository implements WordRepository
{
    private $toolCsv;
    private $fileCsv;

    public function __construct()
    {
        $this->toolCsv  = new ReadAndWriteCsv();
        $this->fileCsv  = __DIR__.'/file/words.csv';
    }

    /**
     * @param Word $word
     */
    public function add(Word $word)
    {
        try {
            $this->toolCsv->write($word);
        } catch (Exception $e) {
            echo $e->getMessage() . "<br>";
        }

    }

    public function findAll(): array
    {
        return $this->toolCsv->read();
    }

    public function delete(WordId $id)
    {
        $words = $this->toolCsv->deregister($id);
        unlink($this->fileCsv);
        $this->toolCsv->writeArray($words);
    }

    public function count(){
        return $this->toolCsv->count();
    }

}