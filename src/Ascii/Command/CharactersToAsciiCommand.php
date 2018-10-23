<?php

namespace Ascii\Command;

use Ascii\Domain\Service\Parser\AsciiParser;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CharactersToAsciiCommand extends Command
{

    protected function configure()
    {
        $this
            ->setName('ascii:character-to-ascii')
            ->setDescription('Write the equivalence of the character in ASCII')
            ->addArgument('word', InputArgument::REQUIRED);
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @throws \Exception
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $asciiParser=new AsciiParser();
        $characterToAscii=$asciiParser->parse( $input->getArgument('word'));
        foreach ($characterToAscii as $item){
            $output->writeln($item->getCharacter().' '.$item->getAscii());
        }
    }
}