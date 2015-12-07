<?php

// No direct access.
defined('_JEXEC') or die;

// Appli
$app = JFactory::getApplication();

// Feuille de styles
$this->addStyleSheet('http://fonts.googleapis.com/css?family=Open+Sans:400,700%7CYanone+Kaffeesatz:700&subset=latin,latin-ext');
$this->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/template.css');

// Lib JS
$this->addScript($this->baseurl . '/templates/' . $this->template . '/vendor/twbs/bootstrap/dist/js/bootstrap.min.js');

// Google Analytics
//$this->addScriptDeclaration("");

?><!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="<?php echo $this->language ?>"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="<?php echo $this->language ?>"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="<?php echo $this->language ?>"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?php echo $this->language ?>"> <!--<![endif]-->
<head>
    <etdoptimizer:head />
</head>
<body>

<jdoc:include type="modules" name="navigation" />

<jdoc:include type="message" />

<main>
  <jdoc:include type="component" />
</main>

<etdoptimizer:scripts />
</body>
</html>
