<?php
declare(strict_types=1);

namespace Leonardo\CliCreate\Console\Command;

use Magento\Framework\Exception\NoSuchEntityException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Leonardo\CliCreate\Model\ImportSaveData;

class ImportFile extends Command
{
    /**
     * @param ImportSaveData $importSaveData
     */
    public function __construct(protected ImportSaveData $importSaveData) { parent::__construct();}
    /**
     * @return void
     */
    protected function configure(): void
    {
        $this->setName('customer:import');
        $this->setDescription('This is Command for import file with data for create customers');
        $this->addArgument('profile-name', InputArgument::REQUIRED, __('Profile Name'));
        $this->addArgument('source', InputArgument::REQUIRED, __('Source'));
        parent::configure();
    }
    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @throws NoSuchEntityException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if($input->getArgument('profile-name')){
            $response = $this->importSaveData->getDataCsv($input->getArgument('source'));
            $output->writeln($response);
        }
        else {
            $output->writeln('Error, try again');
        }
    }
}
