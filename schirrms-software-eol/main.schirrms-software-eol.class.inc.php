<?php

/**
 * Some functions to work with the iTop-Software-EOL extensions
 * 
 * Schirrms 2023 schirrms@schirrms.net
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
				$iYearInterval = $interval->format('%r%y');
				$iMonthInterval = $interval->format('%r%m');
				if ( $iYearInterval > 0 ) {
					$sDiff = Dict::Format('UI:datewithlongremainingyears_days', $iYearInterval, $iMonthInterval);
				} elseif ( $iInterval >= 0 ) {
					$sDiff = Dict::Format('UI:datewithlongremainingdays_days', $iInterval);
				} elseif ( $iYearInterval < 0 ) {
					$sDiff = Dict::Format('UI:datewithlongremainingyears_latedays', -$iYearInterval, -$iMonthInterval);
				} else {
					$sDiff = Dict::Format('UI:datewithlongremainingdays_latedays', -$iInterval);
				}
				$sRemaining = "$dRemaining ($sDiff)";
				// add some colorations
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

// A trigerred class instead of using Method AfterInsert, AfterUpdate and AfterDelete
// iApplicationObjectExtension implementation found in application/applicationextension.inc.php
class OSVersionTriggers implements iApplicationObjectExtension
{
	public function OnIsModified($oObject)
	{
		return false;
	}
	public function OnCheckToWrite($oObject)
	{
		return array();
	}
	public function OnCheckToDelete($oObject)
	{
		return array();
	}
	public function OnDBUpdate($oObject, $oChange = null)
	{
		if (($oObject instanceof Software) === true) {
			SoftwareOSVersionFunct::SetEffectiveSoftwareEOLDate($oObject->GetKey());
		} elseif (($oObject instanceof OSVersion) === true) {
			SoftwareOSVersionFunct::SetEffectiveOSVersionEOLDate($oObject->GetKey());
		}
	}
	public function OnDBInsert($oObject, $oChange = null)
	{
		if (($oObject instanceof Software) === true) {
			SoftwareOSVersionFunct::SetEffectiveSoftwareEOLDate($oObject->GetKey());
		} elseif (($oObject instanceof OSVersion) === true) {
			SoftwareOSVersionFunct::SetEffectiveOSVersionEOLDate($oObject->GetKey());
		}
	}
	public function OnDBDelete($oObject, $oChange = null)
	{
	}
}

class SoftwareOSVersionFunct
{
	/**
	 * Here are the real deal funct for this extension
	 */

	public static function SetEffectiveOSVersionEOLDate($device_id)
	{
		// set date_effective_eol field based on date_end_custom_support
		// or date_end_normal_support if date_end_custom_support is not set
		$oDevice = MetaModel::GetObject('OSVersion', $device_id);
		if (is_object($oDevice))
		{
			$custeoldate = $oDevice->Get('date_end_custom_support');
			if ( $custeoldate === null ) { $custeoldate = $oDevice->Get('date_end_normal_support'); }
			$oDevice->Set('date_effective_eol', $custeoldate);
			// don't forget the DBUpdate...
			$oDevice->DBUpdate();
		}
	}

	public static function SetEffectiveSoftwareEOLDate($device_id)
	{
		// set date_effective_eol field based on date_end_custom_support
		// or date_end_normal_support if date_end_custom_support is not set
		$oDevice = MetaModel::GetObject('Software', $device_id);
		if (is_object($oDevice))
		{
			$custeoldate = $oDevice->Get('date_end_custom_support');
			if ( $custeoldate === null ) { $custeoldate = $oDevice->Get('date_end_normal_support'); }
			$oDevice->Set('date_effective_eol', $custeoldate);
			// don't forget the DBUpdate...
			$oDevice->DBUpdate();
		}
	}
}
