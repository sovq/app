<?php
$app = F::app();
$dir = dirname(__FILE__) . '/';

/**
 * classes
 */
$app->registerClass('StructuredDataAPIClient', $dir . 'StructuredDataAPIClient.class.php');
$app->registerClass('StructuredData', $dir . 'StructuredData.class.php');
$app->registerClass('SDRenderableObject', $dir . 'SDRenderableObject.class.php');
$app->registerClass('SDElement', $dir . 'SDElement.class.php');
$app->registerClass('SDElementProperty', $dir . 'SDElementProperty.class.php');
$app->registerClass('SDElementPropertyValue', $dir . 'SDElementPropertyValue.class.php');
$app->registerClass('SDElementPropertyType', $dir . 'SDElementPropertyType.class.php');
$app->registerClass('SDElementPropertyTypeRange', $dir . 'SDElementPropertyTypeRange.class.php');
$app->registerClass('SDElementRendererFactory', $dir . 'SDElementRendererFactory.class.php');
$app->registerClass('SDContext', $dir . 'SDContext.class.php');

require_once( $dir . '../../../lib/HTTP/Request.php');

/**
 * hooks
 */
//$app->registerHook('ParserBeforeInternalParse', 'StructuredData', 'onBeforeInternalParse');
$app->registerHook('ParserFirstCallInit', 'StructuredData', 'onParserFirstCallInit');
$app->registerHook('ParserFirstCallInit', 'StructuredData', 'onParserFirstCallInitParserFunctionHook');

/**
 * controllers
 */
$app->registerClass('StructuredDataController', $dir . 'StructuredDataController.class.php');

/**
 * special pages
 */
$app->registerSpecialPage('StructuredData', 'StructuredDataController');

$wgStructuredDataConfig = array(
	//'baseUrl' => 'http://data.wikia.net/',
	'baseUrl' => 'http://data-stage.wikia.net/',
	'apiPath' => 'api/v0.1/',
	'schemaPath' => 'callofduty',
	'renderersPath' => $dir . 'templates/renderers/',
	'renderers' => array(
		'schema:ImageObject' => 'ImageObject',
		'value_xsd:anyURI' => 'value_anyURI',
		'value_xsd:boolean' => 'value_boolean',
		'@set' => 'container',
		'@list' => 'container',
		'value_default' => 'value_default',
		'sdelement' => 'sdelement',     // default template for SDElement (reference)
		'value_enum' => 'value_enum'
	)
);

/**
 * access rights
 */
$wgAvailableRights[] = 'sdsediting';
$wgGroupPermissions['*']['sdsediting'] = false;
$wgGroupPermissions['staff']['sdsediting'] = true;
$wgGroupPermissions['admin']['sdsediting'] = true;
$wgAvailableRights[] = 'sdsdeleting';
$wgGroupPermissions['*']['sdsdeleting'] = false;
$wgGroupPermissions['staff']['sdsdeleting'] = true;
$wgGroupPermissions['admin']['sdsdeleting'] = true;

define('SD_CONTEXT_DEFAULT', 0);
define('SD_CONTEXT_SPECIAL', 1);
define('SD_CONTEXT_EDITING', 2);

/**
 * DI setup
 */
F::addClassConstructor( 'StructuredDataAPIClient', array( 'baseUrl' => $wgStructuredDataConfig['baseUrl'], 'apiPath' => $wgStructuredDataConfig['apiPath'], 'schemaPath' => $wgStructuredDataConfig['schemaPath'] ) );
F::addClassConstructor( 'StructuredData', array( 'apiClient' => F::build( 'StructuredDataAPIClient' )));
F::addClassConstructor( 'SDElementRendererFactory', array( 'config' => $wgStructuredDataConfig ) );

/**
 * message files
 */
$app->registerExtensionMessageFile('StructuredData', $dir . 'StructuredData.i18n.php' );
