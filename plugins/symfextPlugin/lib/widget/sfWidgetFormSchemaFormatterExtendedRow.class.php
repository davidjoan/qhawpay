<?php

/**
 * sfWidgetFormSchemaFormatterExtendedRow
 * 
 * Contains a row format for an extended row.
 *
 * @package    symfext
 * @subpackage widget
 * @author     David Joan Tataje Mendoza <dtataje@qhawpay.pe>
 */
class sfWidgetFormSchemaFormatterExtendedRow extends sfWidgetFormSchemaFormatterExt
{
  protected
    $rowFormat = "<td class=\"label\">\n  <span %class%>%label%</span>\n</td>\n  <td class=\"field\">\n  %field%%help%%hidden_fields% \n</td>\n";
}
