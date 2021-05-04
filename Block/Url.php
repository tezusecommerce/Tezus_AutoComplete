<?php

namespace Tezus\AutoComplete\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Url extends Template {

  const URL = "https://brasilapi.com.br/api/cep/v1/";

  public function __construct(Context $context) {
    $this->setTemplate('Tezus_AutoComplete::url.phtml');
    parent::__construct($context);
  }

  public function getAjaxUrl() {
    return $this->getUrl(self::URL);
  }
}
