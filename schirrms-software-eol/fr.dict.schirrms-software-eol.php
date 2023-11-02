<?php
/**
 * Localized data
 *
 * @copyright   Copyright (C) 2013 XXXXX
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

Dict::Add('FR FR', 'French', 'Français', array(
  // Dictionary entries go here
  // OS Version
  'Class:OSVersion/Attribute:comment' => 'Commentaire',
  'Class:OSVersion/Attribute:date_release' => 'Date de sortie de l\'OS',
  'Class:OSVersion/Attribute:date_end_full_support' => 'Date officielle de fin de support \'Complet\'',
  'Class:OSVersion/Attribute:date_end_normal_support' => 'Date officielle de fin de maintenance',
  'Class:OSVersion/Attribute:date_end_ext_support' => 'Date officielle de fin de support étendu',
  'Class:OSVersion/Attribute:date_end_custom_support' => 'Date de fin de support retenue par l\'entreprise',
  'Class:OSVersion/Attribute:endoflife_api' => 'URL de l\'API endoflife',
  'Class:OSVersion/Attribute:endoflife_api+' => 'Positionnez cette URL pour chercher les dates officielles directement depuis \'endoflife.date\'. l\'URL devrait être sous la  forme \'https://endoflife.date/api/product/cycle.json\'',
  // Software
  'Class:Software/Attribute:comment' => 'Commentaire',
  'Class:Software/Attribute:date_release' => 'Date de sortie du Logiciel',
  'Class:Software/Attribute:date_end_full_support' => 'Date officielle de fin de support \'Complet\'',
  'Class:Software/Attribute:date_end_normal_support' => 'Date officielle de fin de maintenance',
  'Class:Software/Attribute:date_end_ext_support' => 'Date officielle de fin de support étendu',
  'Class:Software/Attribute:latest_release' => 'Version la plus récente de cette branche',
  'Class:Software/Attribute:date_latest_release' => 'Date de sortie de la version la plus récente',
  'Class:Software/Attribute:date_end_custom_support' => 'Date de fin de support retenue par l\'entreprise',
  'Class:Software/Attribute:date_end_custom_support+' => 'Dans certains cas, la date de fin de vie retenue par l\'entreprise est différente de la date de fin de vie officielle. Si ce champ n\'est pas renseigné, la date de fin de vie officielle est retenue.',
	'Class:Software/Attribute:endoflife_api' => 'URL de l\'API endoflife',
  'Class:Software/Attribute:endoflife_api+' => 'Positionnez cette URL pour chercher les dates officielles directement depuis \'endoflife.date\'. l\'URL devrait être sous la  forme \'https://endoflife.date/api/product/cycle.json\'',
	'UI:datewithlongremainingdays_days' => ' %1$d jour(s) restant(s) ',
	'UI:datewithlongremainingyears_days' => ' %1$d an(s) et %2$d mois restant(s) ',
	'UI:datewithlongremainingdays_latedays' => ' Expiré depuis %1$d jour(s) ',
	'UI:datewithlongremainingyears_latedays' => ' Expiré depuis %1$d an(s) et %2$d mois ',
));
?>
