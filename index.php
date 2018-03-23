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

// App
$app = JFactory::getApplication();

// Feuille de styles
$this->addStyleSheet('http://fonts.googleapis.com/css?family=Open+Sans:400,700');
$this->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/template.css');

// Lib JS
$this->addScript($this->baseurl . '/templates/' . $this->template . '/js/app.min.js');

// MicroData
$this->addCustomTag("<script type=\"application/ld+json\">
{
  \"@context\" : \"http://schema.org\",
  \"@type\" : \"Organization\",
  \"name\" : \"###ENTREPRISE###\",
  \"url\" : \"###ENTREPRISE###\",
  \"sameAs\" : [
    \"https://www.facebook.com/###ENTREPRISE###\",
    \"https://twitter.com/###ENTREPRISE###\",
    \"https://www.linkedin.com/company/###ENTREPRISE###\",
    \"https://www.viadeo.com/fr/company/###ENTREPRISE###\"
 ]
}
</script>");

// Google Analytics sauf pour Page Speed
if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Google Page Speed Insights') === false) {
    $this->addScriptDeclaration("
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', '#################CODE################', 'auto');
  ga('send', 'pageview');");
}
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="<?php echo $this->language ?>" xml:lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="<?php echo $this->language ?>" xml:lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="<?php echo $this->language ?>" xml:lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?php echo $this->language ?>" xml:lang="<?php echo $this->language; ?>"> <!--<![endif]-->
<head>
    <etdoptimizer:head />
</head>
<body>
    <jdoc:include type="modules" name="navigation" />
    <jdoc:include type="message" />

    <main>
      <jdoc:include type="component" />
    </main>

    <etdoptimizer:stylesheets />
    <etdoptimizer:scripts />
</body>
</html>
