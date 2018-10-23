<?php

namespace Ascii\Controller;

use Ascii\Domain\Service\Parser\AsciiParser;
use Ascii\Infrastructure\CSV\InCsvWordsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CharacterToAsciiController extends Controller
{
    /**
     * @var AsciiParser
     */
    private $asciiParser;
    /**
     * @var InCsvWordsRepository
     */
    private $repository;

    /**
     * CharacterToAsciiController constructor.
     * @param AsciiParser $asciiParser
     * @param InCsvWordsRepository $repository
     */
    public function __construct(AsciiParser $asciiParser, InCsvWordsRepository $repository)
    {
        $this->asciiParser = $asciiParser;
        $this->repository = $repository;
    }

    public function show(Request $request)
    {
        $word=$request->get('word');
        $characterToAscii=$this->asciiParser->parse($word);

        return $this->render('ascii/table.html.twig', [
            'characterToAscii' => $characterToAscii,
        ]);
    }


}