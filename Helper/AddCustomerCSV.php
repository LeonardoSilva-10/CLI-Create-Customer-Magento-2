<?php
namespace Leonardo\CliCreate\Helper;

use Leonardo\CliCreate\Helper\Data\AddCustomerInterface;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Customer\Api\Data\CustomerInterfaceFactory;

class AddCustomerCSV implements AddCustomerInterface
{
    /**
     * @param CustomerInterface $customerInterface
     * @param CustomerRepositoryInterface $customerRepositoryInterface
     * @param CustomerInterfaceFactory $customerInterfaceFactory
     */
    public function __construct(protected CustomerInterface $customerInterface,
                                protected CustomerRepositoryInterface $customerRepositoryInterface,
                                protected CustomerInterfaceFactory $customerInterfaceFactory){}

    /**
     * @param $websiteId
     * @param $email
     * @param $firstName
     * @param $lastName
     * @return mixed
     */
    public function addCustomer($websiteId, $email, $firstName, $lastName)
    {
        //TODO: Add Validation via email when account was created
        try {
            $customer = $this->customerInterfaceFactory->create();
            $customer->setWebsiteId((int)$websiteId)
                ->setEmail(implode(',', $email))
                ->setFirstname(implode(',', $firstName))
                ->setLastname(implode(',', $lastName));
            return $this->customerRepositoryInterface->save($customer, null);
        } catch (\Exception $e) {
            return __('Do not possible create account ' . $e->getMessage());
        }
    }
}

