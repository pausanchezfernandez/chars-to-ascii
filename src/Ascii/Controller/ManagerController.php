<?php

namespace Ascii\Controller;

use Ascii\Application\Command\Add\AddWordCommand;
use Ascii\Application\Command\Add\AddWordCommandHandler;
use Ascii\Application\Command\Add\AddWordService;
use Ascii\Application\Query\FindAll\FindAllWordsCommandHandler;
use Ascii\Domain\Service\Parser\AsciiParser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class ManagerController extends Controller
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
     * @var AddWordCommandHandler
     */
    private $addWord;

    /**
     * CharacterToAsciiController constructor.
     * @param AsciiParser $asciiParser
     * @param FindAllWordsCommandHandler $findWords
     * @param AddWordCommandHandler $addWord
     */
    public function __construct(AsciiParser $asciiParser, FindAllWordsCommandHandler $findWords, AddWordCommandHandler $addWord)
    {
        $this->asciiParser = $asciiParser;
        $this->findWords = $findWords;
        $this->addWord = $addWord;
    }

    public function addWord(Request $request)
    {

        $defaultData = array('message' => 'Add new word');
        $form = $this->createFormBuilder($defaultData)
            ->add('word', TextType::class)
            ->add('send', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            try {
                $data=$form->getData();
                $command = new AddWordCommand($data['word']);
                $this->addWord->handle($command);


            } catch (\Exception $e) {
                echo 'Excepción capturada: ', $e->getMessage(), "\n";

            }
        }

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

        return $this->render('ascii/table-manager.html.twig', [
            'words' => $wordsParse,
            'form' => $form->createView(),
        ]);
    }

}