<?php

/**
 * @file
 * CustomModalController class.
 */

namespace Drupal\custom_modal\Controller;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\OpenModalDialogCommand;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Response;

class CustomModalController extends ControllerBase {

  public function modal($js = 'nojs') {
    if ($js == 'ajax') {
      $options = [
        'dialogClass' => 'popup-dialog-class',
        'width' => '50%',
      ];
      $response = new AjaxResponse();
      $response->addCommand(new OpenModalDialogCommand(t('Modal title'), t('The modal text'), $options));
    }
    else {
      $response = new Response();
      $response->setContent('The modal text (Javascript is not enabled)');
    }

    return $response;
  }
}