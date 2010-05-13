<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Andimo</title>
<link href="<?php e(url('/css/reset.css')); ?>" rel="stylesheet" media="screen, projection" type="text/css" />
<link href="<?php e(url('/css/main.css')); ?>" rel="stylesheet" media="screen, projection" type="text/css" />
<!--[if lte IE 7]>
<link href="<?php e(url('/css/iecss.css')); ?>" rel="stylesheet"  media="screen,projection" type="text/css" />
<![endif]-->
</head>
<body id="home">
<div id="outer">
    <div class="top">
        <h1 id="logo"><a href="<?php e(url()); ?>">Andimo<em></em></a></h1>
        <ul id="nav">
            <!-- add class of current to list element and remove anchor on current page -->
            <?php foreach ($navigation as $nav): ?>
                <li<?php if($nav['current'] == 'yes') echo ' class="current"';  ?>><a href="<?php e(url('/' . $context->getLanguage() . '/' . $nav['url_self'])); ?>"><?php e($nav['navigation_name']); ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <ul class="flags">
        <li class="dan"><a title="Danish" href="<?php e(url('/da')); ?>">Danish<em></em></a></li>
        <li class="eng"><a title="English" href="<?php e(url('/en')); ?>">English<em></em></a></li>
    </ul>
    <div id="header">
        <h2>Nonprofit co-operative societies</h2>
        <p><img src="<?php e($context->document()->picture()); ?>" alt="Example of co-operation" width="901" height="279" /><b></b></p>
    </div>
    <!-- end header -->
    <div id="main">
        <?php echo $content; ?>
    </div>
    <!-- end main -->
    <div id="footer">
        <p class="web"><a href="mailto:rasmus@andimo.org">Webmaster</a></p>
        <p class="cred"><a href="http://andimo.org/">Credits</a></p>
        <address>
        Andimo . Liflandsgade 1B, 3. tv . 2300 Copenhagen S . Denmark
        </address>
    </div>
</div>
</body>
</html>
