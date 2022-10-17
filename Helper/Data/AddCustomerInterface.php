<?php
namespace Leonardo\CliCreate\Helper\Data;

interface AddCustomerInterface{
    /**
     * @param $websiteId
     * @param $email
     * @param $firstName
     * @param $lastName
     * @return mixed
     */
    public function addCustomer($websiteId, $email, $firstName, $lastName);
}
