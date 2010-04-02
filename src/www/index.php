<?php
require_once 'config.local.php';
require_once 'konstrukt/konstrukt.inc.php';
require_once 'bucket.inc.php';
require_once 'Ilib/ClassLoader.php';

class ApplicationFactory {
  public $template_dir;
  function new_k_TemplateFactory($c) {
    return new k_DefaultTemplateFactory($this->template_dir);
  }

  function new_Andimo_CmsFactory()
  {
      return new Andimo_CmsFactory();
  }

}

class Andimo_Document extends k_Document
{
    public $picture;
    function picture()
    {
        return $this->picture;
    }
}

class Andimo_CmsFactory
{
    function create($language = 'da')
    {
        $sites = array(
            'da' => 42,
            'en' => 43
        );

        $credentials["private_key"] = $GLOBALS["private_key"];
        $credentials["session_id"] = md5(uniqid());
        $cms_id = $sites[$language];

        $debug = false;
        $client = new IntrafacePublic_CMS_Client_XMLRPC($credentials, $cms_id, $debug, '', 'utf-8');

        $options = array(
            "cacheDir" => $GLOBALS["cache_dir"],
            "lifeTime" => 1
        );

        return new IntrafacePublic_CMS($client, new Cache_Lite($options));
    }
}

function create_container() {
  $factory = new ApplicationFactory();
  $container = new bucket_Container($factory);
  $factory->template_dir = $GLOBALS['template_path'];
  return $container;
}

k()
  // Use container for wiring of components
  ->setComponentCreator(new k_InjectorAdapter(create_container(), new Andimo_Document))
  // Location of debug logging
  ->setLog($debug_log_path)
  // Enable/disable in-browser debugging
  ->setDebug($debug_enabled)
  // Dispatch request
  ->run('Andimo_Root')
  ->out();
