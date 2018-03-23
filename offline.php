<?php
/**
 * @package      Template Joomla pour le site web de ###ENTREPRISE###
 *
 * @version      1.0.0
 * @copyright    Copyright (C) 2018 ETD Solutions. All rights reserved.
 * @license      Apache-2.0
 * @author       ETD Solutions http://www.etd-solutions.com
 **/

defined('_JEXEC') or die('Restricted access');

$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$this->language  = $doc->language;
$this->direction = $doc->direction;

// Output as HTML5
$doc->setHtml5(true);

// Add Stylesheets
$this->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/template.css');

// Sitename
$sitename = htmlspecialchars($app->get('sitename'));
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <title><?php echo $sitename; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <jdoc:include type="head" />
    <!--[if lt IE 9]><script src="<?php echo JUri::root(true); ?>/media/jui/js/html5.js"></script><![endif]-->
</head>
<body class="site">
<main>
    <div class="body">
        <h2 id="coming-soon">Site en maintenance !</h2>
        <div class="texte">
            <?php if ($app->get('display_offline_message', 1) == 1 && str_replace(' ', '', $app->get('offline_message')) != '') : ?>
                <div><?php echo $app->get('offline_message'); ?></div>
            <?php elseif ($app->get('display_offline_message', 1) == 2) : ?>
                <div>Le site de <?php echo $sitename; ?> est actuellement en maintenance !<br/>Merci de revenir plus tard.</div>
            <?php endif; ?>
            <div>En attendant, n'hésitez pas à nous contacter : <a href="<?php echo $app->get('mailfrom'); ?>"><?php echo $app->get('mailfrom'); ?></a></div>
        </div>
        <?php if ($app->get('offline_image') && file_exists($app->get('offline_image'))) : ?>
            <img src="<?php echo $app->get('offline_image'); ?>" alt="<?php echo $sitename; ?>" />
        <?php endif; ?>
        <img id="logo-offline" src="<?php echo JUri::root(); ?>templates/<?php echo $this->template; ?>/img/logo.png" alt="Logo <?php echo $sitename; ?>"/>
    </div>
</main>
</body>
</html>