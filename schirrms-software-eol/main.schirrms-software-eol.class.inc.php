<?php

/**
 * Class AttributeDateWithRemainingDays :
 * For a date attribute, display the data and the remaining days between today and this date
 * result can be negative
 * in GetAsHtml, return the result in
 *  * orange if less than 366 days
 *  * red if less than 90 days
 */

 class AttributeDateWithLongRemainingDays extends AttributeDate
{

  private function FormatLongRemainingDays($dRemaining, $oHostObject = null)
  {
    $sRemaining = '';
    if ( $dRemaining !== null && preg_match('/^\d{2,4}-\d{1,2}-\d{1,2}$/', $dRemaining) ) {
      $dExpiration = new DateTime($dRemaining);
      $dControl = new DateTime('');
      $datectrl = $dControl->diff($dExpiration);
      if ( $datectrl->format('%r%a') > -10000 ) {
        $dDateNow = new DateTime(date('Y-m-d'));
        $interval = $dDateNow->diff($dExpiration);
        $iInterval = $interval->format('%r%a');
        if ( $iInterval >= 0 ) {
          $sDiff = Dict::Format('UI:datewithremainingdays_days', $iInterval);
        }
        else {
          $sDiff = Dict::Format('UI:datewithremainingdays_latedays', -$iInterval);
        }
        $sRemaining = "$dRemaining ($sDiff)";
        // add some colorations, but only for active Certificates
        /* $status = null;
        if ( $oHostObject !== null) {
          $nam = $oHostObject->Get('status');
        } */
        // if ( $iInterval <= 366  && $status == 'active' ) {
        if ( $iInterval <= 366 ) {
          $sColor='gold';
  	      if ($iInterval <= 90 ) {
            $sColor='tomato';
          }
          $sRemaining = "<div style=\"color:$sColor;background-color:#404040;\">$sRemaining</div>";
        }
      }
    }
    return $sRemaining;
  }

  public function GetAsHTML($sValue, $oHostObject = null, $bLocalize = true)
  {
    return self::FormatLongRemainingDays($sValue, $oHostObject);
  }
}