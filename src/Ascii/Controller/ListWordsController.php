<?php

namespace Ascii\Controller;

use Ascii\Application\Query\FindAll\FindAllWordsCommandHandler;
use Ascii\Application\Query\FindAll\FindAllWordsService;
use Ascii\Domain\Service\Parser\AsciiParser;
use Ascii\Infrastructure\CSV\InCsvWordsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListWordsController extends Controller
{
    /**
     * @var AsciiParser
     */
    private $asciiParser;

    /**
     * @var FindAllWordsCommandHandler
     */
    private $findWords;

    /**
     * CharacterToAsciiController constructor.
     * @param AsciiParser $asciiParser
     * @param FindAllWordsCommandHandler $findWords
     */
    public function __construct(AsciiParser $asciiParser, FindAllWordsCommandHandler $findWords)
    {
        $this->asciiParser = $asciiParser;
        $this->findWords = $findWords;
    }

    /**
     * @throws \Exception
     */
    public function list(){
        $words=$this->findWords->handle();
        $wordsParse=[];
        foreach($words as $item)
        {
            $paserAscii=$this->asciiParser->parse($item->getWordFull()->getValue());

            $wordsParse[]=[
                'id'=>$item->getWordId()->getValue()->toString(),
                'date'=>$item->getWordOcurredOn()->getValue(),
                'word'=>$item->getWordFull()->getValue(),
                'sum'=>$this->asciiParser->sumAscii($paserAscii)
            ];

        }

        return $this->render('ascii/table-list.html.twig', [
            'words' => $wordsParse,
        ]);
    }

}