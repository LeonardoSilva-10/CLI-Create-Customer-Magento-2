<?php

namespace Leonardo\CliCreate\Console\Command;

interface ImportInterface
{
    /**
     * @param $importGetDataCsv
     * @return mixed
     */
    public function getDataCsv($importGetDataCsv);
    /**
     * @param $importGetDataJson
     * @return mixed
     */
    public function getDataJson($importGetDataJson);
}
