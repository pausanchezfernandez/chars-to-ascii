<?php

namespace Ascii\Infrastructure\CSV;

use Ascii\Domain\Model\Word\Word;
use Ascii\Domain\Model\Word\WordId;
use Port\Csv\CsvWriter;
use Port\Csv\CsvReader;
use Ascii\Domain\Model\Word\WordOcurredOn;
use Ascii\Domain\Model\Word\WordFull;

class ReadAndWriteCsv
{
    private $fileCsv;
    private $reader;

    public function __construct()
    {
        $this->fileCsv  = __DIR__.'/file/words.csv';
        $file = new \SplFileObject($this->fileCsv);
        $this->reader = new CsvReader($file, ';', '"', '\\');
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function read():array
    {
        $words = [];
        foreach ($this->reader as $row) {
                $words[] = new Word(
                    new WordId($row[0]),
                    new WordOcurredOn($row[1]),
                    new WordFull($row[2])
                );
        }

        return $words;
    }

    public function deregister($id):array
    {
        $words = [];
        foreach ($this->reader as $row) {
            if($id->getValue()->toString()!=$row[0]) {
                $words[] = new Word(
                    new WordId($row[0]),
                    new WordOcurredOn($row[1]),
                    new WordFull($row[2])
                );
            }
        }

        return $words;
    }


    public function write($word)
    {
        $writer = new CsvWriter();
        $writer->setStream(fopen($this->fileCsv, 'a'));
        $writer->writeItem([$word->getWordId()->getValue()->toString(), $word->getWordOcurredOn()->getValue(), $word->getWordFull()->getValue()]);
        $writer->finish();
    }

    public function writeArray($words)
    {
        $writer = new CsvWriter();
        $writer->setStream(fopen( $this->fileCsv, 'a+'));
        foreach ($words as $word) {
            $writer->writeItem( [$word->getWordId()->getValue()->toString(), $word->getWordOcurredOn()->getValue(), $word->getWordFull()->getValue()]);
        }
        $writer->finish();
    }

    public function count()
    {
        $words = [];
        foreach ($this->reader as $row) {
            $words[] = new Word(
                new WordId($row[0]),
                new WordOcurredOn($row[1]),
                new WordFull($row[2])
            );
        }
        return count($words);
    }

}