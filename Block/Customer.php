<?php

namespace Tezus\AutoComplete\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Customer extends Template
{

	/** @var ScopeConfigInterface */
	protected $_scopeConfig;

	public function __construct(Context $context, ScopeConfigInterface $scopeConfig)
	{
		$this->setTemplate('Tezus_AutoComplete::customer.phtml');
		$this->_scopeConfig = $scopeConfig;
		parent::__construct($context);
	}

	public function getLoadPageTime()
	{
		return $this->_scopeConfig->getValue('tezus_autocomplete/settings/load_page_time');
	}

	public function getCustomState()
	{
		return $this->_scopeConfig->getValue('tezus_autocomplete/custom_fields_customer/custom_state');
	}

	public function getCustomCity()
	{
		return $this->_scopeConfig->getValue('tezus_autocomplete/custom_fields_customer/custom_city');
	}

	public function getCustomStreet()
	{
		return $this->_scopeConfig->getValue('tezus_autocomplete/custom_fields_customer/custom_street');
	}

	public function getCustomQuarter()
	{
		return $this->_scopeConfig->getValue('tezus_autocomplete/custom_fields_customer/custom_quarter');
	}

	public function getCustomAdditionalInfo()
	{
		return $this->_scopeConfig->getValue('tezus_autocomplete/custom_fields_customer/custom_additional_info');
	}
}
