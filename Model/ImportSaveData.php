<?php
namespace Leonardo\CliCreate\Model;

use Leonardo\CliCreate\Console\Command\ImportInterface;
use Leonardo\CliCreate\Model\CreateCustomerWithCSV;
use Magento\Framework\Exception\NoSuchEntityException;

class ImportSaveData implements ImportInterface
{
    /**
     * @param \Leonardo\CliCreate\Model\CreateCustomerWithCSV $createCustomerWithCSV
     */
    public function __construct(protected CreateCustomerWithCSV $createCustomerWithCSV){}
    /**
     * @param $importGetDataCsv
     * @return mixed
     * @throws NoSuchEntityException
     */
    public function getDataCsv($importGetDataCsv): mixed
    {
        //Verification if file it is .csv
        if(!preg_match('/csv/i', $importGetDataCsv)){
            return $this->getDataJson($importGetDataCsv);
        }
        $handle = fopen($importGetDataCsv, "r");
        while(($line = fgetcsv($handle)) !== false) {
            $users[] = $line;
        }
        fclose($handle);
        //get handle from csv and put it in  key
        $key = array_shift($users);
        $user = $this->formatArrayData($users);
        $data = [];
        foreach ($user as $value){
            $data = [
              $key[0] => $value[0],
              $key[1] => $value[1],
              $key[2] => $value[2]
            ];
            $send = $this->createCustomerWithCSV->createCustomer($data);
        }
        return $send;
    }
    /**
     * @param $importGetDataJson
     * @return mixed
     */
    public function getDataJson($importGetDataJson): mixed
    {
        //TODO: Implement function for working with JSON.
        throw new \InvalidArgumentException('Not used JSON this version');
    }
    /**
     * @param $arrayData
     * @return mixed
     */
    public function formatArrayData($arrayData): mixed
    {
        array_pop($arrayData);
        return $arrayData;
    }
}
