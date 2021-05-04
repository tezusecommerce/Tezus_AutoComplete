<?php

namespace Tezus\AutoComplete\Model\Checkout;

class LayoutProcessorPlugin {
  public function aroundProcess(
    \Magento\Checkout\Block\Checkout\LayoutProcessor $subject,
    \Closure $proceed,
    array $jsLayout
  ) {
    $jsLayoutResult = $proceed($jsLayout);

    $shippingAddress = &$jsLayoutResult['components']['checkout']['children']['steps']['children']['shipping-step']['children']['shippingAddress']['children']['shipping-address-fieldset']['children'];

    unset($shippingAddress['street']['label']);

    // Shipping fields street labels
    $shippingAddress['street']['children']['0']['label'] = __('Endereço *');
    $shippingAddress['street']['children']['1']['label'] = __('Número *');
    $shippingAddress['street']['children']['2']['label'] = __('Complemento');
    $shippingAddress['street']['children']['3']['label'] = __('Bairro *');
    $shippingAddress['postcode']['sortOrder'] = 1;

    //Validation fields street labels
    $shippingAddress['street']['children']['0']['validation'] = ['required-entry' => true, "min_text_len‌​gth" => 1, "max_text_length" => 255];
    $shippingAddress['street']['children']['1']['validation'] = ['required-entry' => true, "min_text_len‌​gth" => 1, "max_text_length" => 255];
    $shippingAddress['street']['children']['3']['validation'] = ['required-entry' => true, "min_text_len‌​gth" => 1, "max_text_length" => 255];

    return $jsLayoutResult;
  }

  /**
   * @param \Magento\Checkout\Block\Checkout\LayoutProcessor $subject
   * @param array $jsLayout
   * @return array
   */

  public function afterProcess(
    \Magento\Checkout\Block\Checkout\LayoutProcessor $subject,
    array $jsLayout
  ) {

    // Change billing field labels for every payment method
    $paymentForms = $jsLayout['components']['checkout']['children']['steps']['children']['billing-step']['children']['payment']['children']['payments-list']['children'];

    foreach ($paymentForms as $paymentMethodForm => $paymentMethodValue) {

      $paymentMethodCode = str_replace('-form', '', $paymentMethodForm);

      $billingAddress = &$jsLayout['components']['checkout']['children']['steps']['children']['billing-step']['children']['payment']['children']['payments-list']['children'][$paymentMethodCode . '-form']['children']['form-fields']['children'];

      if (!isset($jsLayout['components']['checkout']['children']['steps']['children']['billing-step']['children']['payment']['children']['payments-list']['children'][$paymentMethodCode . '-form'])) {
        continue;
      }

      $billingAddress['street']['children'][0]['label'] = __('Endereço *');
      $billingAddress['street']['children'][1]['label'] = __('Número *');
      $billingAddress['street']['children'][2]['label'] = __('Complemento');
      $billingAddress['street']['children'][3]['label'] = __('Bairro *');
      $billingAddress['postcode']['sortOrder'] = 1;

      $billingAddress['street']['children']['0']['validation'] = ['required-entry' => true, "min_text_len‌​gth" => 1, "max_text_length" => 255];
      $billingAddress['street']['children']['1']['validation'] = ['required-entry' => true, "min_text_len‌​gth" => 1, "max_text_length" => 255];
      $billingAddress['street']['children']['3']['validation'] = ['required-entry' => true, "min_text_len‌​gth" => 1, "max_text_length" => 255];
    }

    return $jsLayout;
  }
}
