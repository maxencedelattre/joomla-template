<?php
/**
 * @package      Template Joomla pour le site web de ###ENTREPRISE###
 *
 * @version      1.0.0
 * @copyright    Copyright (C) 2018 ETD Solutions. All rights reserved.
 * @license      Apache-2.0
 * @author       ETD Solutions http://www.etd-solutions.com
 **/

// No direct access.
defined('_JEXEC') or die('Restricted access');

$app   = JFactory::getApplication();
$error = $this->error;

$this->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/template.css');
?>
<!doctype html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo $error->getCode(); ?> - <?php echo htmlspecialchars($error->getMessage(), ENT_QUOTES, 'UTF-8'); ?></title>
        <!--[if lt IE 9]><script src="<?php echo JUri::root(true); ?>/media/jui/js/html5.js"></script><![endif]-->
        <link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/template.css" rel="stylesheet" />
        <link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/views/error.css" rel="stylesheet" />
    </head>
    <body>
        <main class="text-center">
            <div class="body">
                <img id="logo-error" src="<?php echo JUri::root(); ?>templates/<?php echo $this->template; ?>/img/logo.png" alt="Logo <?php echo htmlspecialchars($app->get('sitename')); ?>"/>
                <h2><?php echo JText::_('JERROR_LAYOUT_PAGE_NOT_FOUND'); ?></h2>
                <h3><?php echo JText::_('JERROR_LAYOUT_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'); ?></h3>
                <p><?php echo JText::_('JERROR_LAYOUT_NOT_ABLE_TO_VISIT'); ?></p>
                <ul>
                    <li><?php echo JText::_('JERROR_LAYOUT_AN_OUT_OF_DATE_BOOKMARK_FAVOURITE'); ?></li>
                    <li><?php echo JText::_('JERROR_LAYOUT_MIS_TYPED_ADDRESS'); ?></li>
                    <li><?php echo JText::_('JERROR_LAYOUT_SEARCH_ENGINE_OUT_OF_DATE_LISTING'); ?></li>
                    <li><?php echo JText::_('JERROR_LAYOUT_YOU_HAVE_NO_ACCESS_TO_THIS_PAGE'); ?></li>
                </ul>
                <div>
                    <a href="<?php echo $this->baseurl; ?>" title="<?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?>"><?php echo JText::_('JERROR_LAYOUT_HOME_PAGE'); ?></a>
                </div>
                <h3><?php echo JText::_('JERROR_LAYOUT_PLEASE_CONTACT_THE_SYSTEM_ADMINISTRATOR'); ?></h3>
                <p>#<?php echo $error->getCode(); ?>&nbsp;<?php echo htmlspecialchars($error->getMessage(), ENT_QUOTES, 'UTF-8'); ?></p>

                <?php if ($this->debug) :
                    echo "<strong>" . $error->getFile() . ":" . $error->getLine() . '</strong><br>';
                    echo $this->renderBacktrace();
                endif; ?>
                <div class="footer-content">Copyright © <?php echo date('Y'); ?> - Tous droits réservés <?php echo htmlspecialchars($app->get('fromname')); ?></div>
            </div>
        </main>
    </body>
</html>