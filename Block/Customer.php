<?php

namespace Tezus\AutoComplete\Block;

use Magento\Customer\Block\Address\Edit;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Customer extends Edit {

	/** @var ScopeConfigInterface */
	protected $_scopeConfig;

	public function __construct(
		Context $context, 
		\Magento\Directory\Helper\Data $directoryHelper,
		\Magento\Framework\Json\EncoderInterface $jsonEncoder,
		\Magento\Framework\App\Cache\Type\Config $configCacheType,
		\Magento\Directory\Model\ResourceModel\Region\CollectionFactory $regionCollectionFactory,
		\Magento\Directory\Model\ResourceModel\Country\CollectionFactory $countryCollectionFactory,
		\Magento\Customer\Model\Session $customerSession,
		\Magento\Customer\Api\AddressRepositoryInterface $addressRepository,
		\Magento\Customer\Api\Data\AddressInterfaceFactory $addressDataFactory,
		\Magento\Customer\Helper\Session\CurrentCustomer $currentCustomer,
		\Magento\Framework\Api\DataObjectHelper $dataObjectHelper,
		ScopeConfigInterface $scopeConfig
	) {
		$this->setTemplate('Tezus_AutoComplete::customer.phtml');
		$this->_scopeConfig = $scopeConfig;
		parent::__construct(
			$context,
			$directoryHelper,
			$jsonEncoder,
			$configCacheType,
			$regionCollectionFactory,
			$countryCollectionFactory,
			$customerSession,
			$addressRepository,
			$addressDataFactory,
			$currentCustomer,
			$dataObjectHelper,
		);
	}

	public function getLoadPageTime() {
		return $this->_scopeConfig->getValue('tezus_autocomplete/settings/load_page_time');
	}

	public function getCustomState() {
		return $this->_scopeConfig->getValue('tezus_autocomplete/custom_fields_customer/custom_state');
	}

	public function getCustomCity() {
		return $this->_scopeConfig->getValue('tezus_autocomplete/custom_fields_customer/custom_city');
	}

	public function getCustomStreet() {
		return $this->_scopeConfig->getValue('tezus_autocomplete/custom_fields_customer/custom_street');
	}

	public function getCustomQuarter() {
		return $this->_scopeConfig->getValue('tezus_autocomplete/custom_fields_customer/custom_quarter');
	}

	public function getCustomAdditionalInfo() {
		return $this->_scopeConfig->getValue('tezus_autocomplete/custom_fields_customer/custom_additional_info');
	}
}
