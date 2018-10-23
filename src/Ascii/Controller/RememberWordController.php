<?php

namespace Ascii\Controller;

use Ascii\Application\Command\Add\AddWordCommand;
use Ascii\Application\Command\Add\AddWordCommandHandler;
use Ascii\Application\Command\Add\AddWordService;
use Ascii\Domain\Service\Parser\AsciiParser;
use Ascii\Infrastructure\CSV\InCsvWordsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RememberWordController extends Controller
{
    /**
     * @var AsciiParser
     */
    private $asciiParser;
    /**
     * @var AddWordCommandHandler
     */
    private $addWord;

    /**
     * CharacterToAsciiController constructor.
     * @param AsciiParser $asciiParser
     * @param AddWordCommandHandler $addWord
     */
    public function __construct(AsciiParser $asciiParser, AddWordCommandHandler $addWord)
    {
        $this->asciiParser = $asciiParser;
        $this->addWord = $addWord;
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function addWord(Request $request)
    {
        $word=$request->get('word');
        $characterToAscii=$this->asciiParser->parse($word);

        try {
            $command=new AddWordCommand($word);
            $this->addWord->handle($command);
        } catch (\Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";

        }
        return $this->render('ascii/table-message.html.twig', [
            'characterToAscii' => $characterToAscii,
            'wordadded'=>'Word added successfully'
        ]);


    }

}