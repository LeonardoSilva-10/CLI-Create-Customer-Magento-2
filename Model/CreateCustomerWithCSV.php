<?php
namespace Leonardo\CliCreate\Model;

use Leonardo\CliCreate\Helper\AddCustomerCSV;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Phrase;
use Magento\Store\Model\StoreManager;

class CreateCustomerWithCSV implements CreateInterface
{
    /**
     * @param StoreManager $storeManager
     * @param AddCustomerCSV $addCustomerCSV
     */
    public function __construct(protected StoreManager $storeManager, protected AddCustomerCSV $addCustomerCSV){}
    /**
     * @param $userdata
     * @return Phrase|void
     * @throws NoSuchEntityException
     */
    public function createCustomer($userdata){
        $websiteId = $this->storeManager->getStore()->getWebsiteId();
        $clength = count($userdata);

        for($i=0; $i<=$clength; $i++) {
            $fname = array_filter($userdata, function ($k) {
                return $k == 'fname';
            }, ARRAY_FILTER_USE_KEY);

            $lname = array_filter($userdata, function ($k) {
                return $k == 'lname';
            }, ARRAY_FILTER_USE_KEY);

            $emailaddress = array_filter($userdata, function ($k) {
                return $k == 'emailaddress';
            }, ARRAY_FILTER_USE_KEY);

            $this->addCustomerCSV->addCustomer($websiteId, $emailaddress, $fname, $lname);

            return __('successfully register customer
            (* if there is another customer with the same email, not registered.)');
        }
    }
}
