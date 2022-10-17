<?php
namespace Leonardo\CliCreate\Model;

interface CreateInterface{
    /**
     * @param $userdata
     * @return mixed
     */
    public function createCustomer($userdata);
}
