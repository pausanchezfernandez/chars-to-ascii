<?php

namespace Ascii\Command;

use Ascii\Application\Command\Delete\DeleteWordCommand;
use Ascii\Application\Command\Delete\DeleteWordCommandHandler;
use Ascii\Application\Command\Delete\DeleteWordService;
use Ascii\Infrastructure\CSV\InCsvWordsRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DeleteWordRegisterCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('ascii:delete-register')
            ->setDescription('Delete a word from the record')
            ->addArgument('uuid', InputArgument::REQUIRED);
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @throws \Exception
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $command=new DeleteWordCommand($input->getArgument('uuid'));
        $delete=new DeleteWordCommandHandler(new DeleteWordService(new InCsvWordsRepository()));
        $delete->handle($command);

        $output->writeln([
            'Word removed from the record',
            '============================',
            'id:'.$input->getArgument('uuid'),
        ]);
    }
}