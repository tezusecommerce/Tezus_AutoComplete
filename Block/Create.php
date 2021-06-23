<?php

namespace Tezus\AutoComplete\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Create extends Template {

  /** @var ScopeConfigInterface */
  protected $_scopeConfig;

  public function __construct(Context $context, ScopeConfigInterface $scopeConfig) {
    $this->setTemplate('Tezus_AutoComplete::create.phtml');
    $this->_scopeConfig = $scopeConfig;
    parent::__construct($context);
  }

  public function getLoadPageTime() {
    return $this->_scopeConfig->getValue('tezus_autocomplete/settings/load_page_time');
  }

  public function getCustomState() {
    return $this->_scopeConfig->getValue('tezus_autocomplete/custom_fields_customer_create/create_custom_state');
  }

  public function getCustomCity() {
    return $this->_scopeConfig->getValue('tezus_autocomplete/custom_fields_customer_create/create_custom_city');
  }

  public function getCustomStreet() {
    return $this->_scopeConfig->getValue('tezus_autocomplete/custom_fields_customer_create/create_custom_street');
  }

  public function getCustomQuarter() {
    return $this->_scopeConfig->getValue('tezus_autocomplete/custom_fields_customer_create/create_custom_quarter');
  }

  public function getCustomAdditionalInfo() {
    return $this->_scopeConfig->getValue('tezus_autocomplete/custom_fields_customer_create/create_custom_additional_info');
  }
}
