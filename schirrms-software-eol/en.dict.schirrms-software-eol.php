<?php
/**
 * Localized data
 *
 * @copyright   Copyright (C) 2023 Schirrms
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

Dict::Add('EN US', 'English', 'English', array(
  // Dictionary entries go here
  // OS Version
  'Class:OSVersion/Attribute:comment' => 'Comment',
  'Class:OSVersion/Attribute:date_release' => 'OS Release date',
  'Class:OSVersion/Attribute:date_end_full_support' => 'OS official end of full support date',
  'Class:OSVersion/Attribute:date_end_normal_support' => 'OS official end of maintenance support date',
  'Class:OSVersion/Attribute:date_end_ext_support' => 'OS official end of extended support date',
  'Class:OSVersion/Attribute:latest_release' => 'Latest release subversion for this branch',
  'Class:OSVersion/Attribute:date_latest_release' => 'Latest subversion release date',
  'Class:OSVersion/Attribute:date_end_custom_support' => 'OS company defined end of maintenance support date',
  'Class:OSVersion/Attribute:date_end_custom_support+' => 'In some case, the internal company policy can set a different End of Life date than the public one. If not set, the standard EOL will be used.',
  'Class:OSVersion/Attribute:date_effective_eol' => 'Effective EOL date',
	'Class:OSVersion/Attribute:endoflife_api' => 'endoflife API URL',
  'Class:OSVersion/Attribute:endoflife_api+' => 'Set this URL to update official dates directly from \'endoflife.date\'. This URL should be on the form \'https://endoflife.date/api/product/cycle.json\'',
  // Software
  'Class:Software/Attribute:comment' => 'Comment',
  'Class:Software/Attribute:date_release' => 'Software Release date',
  'Class:Software/Attribute:date_end_full_support' => 'Software official end of full support date',
  'Class:Software/Attribute:date_end_normal_support' => 'Software official end of maintenance support date',
  'Class:Software/Attribute:date_end_ext_support' => 'Software official end of extended support date',
  'Class:Software/Attribute:latest_release' => 'Latest release subversion for this branch',
  'Class:Software/Attribute:date_latest_release' => 'Latest subversion release date',
  'Class:Software/Attribute:date_end_custom_support' => 'Software company defined end of maintenance support date',
  'Class:Software/Attribute:date_end_custom_support+' => 'In some case, the internal company policy can set a different End of Life date than the public one. If not set, the standard EOL will be used.',
  'Class:Software/Attribute:date_effective_eol' => 'Effective EOL date',
	'Class:Software/Attribute:endoflife_api' => 'endoflife API URL',
  'Class:Software/Attribute:endoflife_api+' => 'Set this URL to update official dates directly from \'endoflife.date\'. This URL should be on the form \'https://endoflife.date/api/product/cycle.json\'',
	// Common attibutes to localize date duration
	'UI:datewithlongremainingdays_days' => ' %1$d Day(s) Left ',
	'UI:datewithlongremainingyears_days' => ' %1$d Years(s) and %2$d Month(s) Left ',
	'UI:datewithlongremainingdays_latedays' => ' Expired since %1$d Day(s) ',
	'UI:datewithlongremainingyears_latedays' => ' Expired since %1$d Year(s) and %2$d Month(s) ',
));
?>
