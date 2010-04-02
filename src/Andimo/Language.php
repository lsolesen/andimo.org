<?php
class Andimo_Language extends k_Component
{
    protected $cms;
    protected $templates;

    function __construct(k_TemplateFactory $templates, Andimo_CmsFactory $cms)
    {
        $this->cms = $cms;
        $this->templates = $templates;
    }

    function map($name)
    {
        return 'Andimo_Index';
    }

    function renderHtml()
    {
        return new k_SeeOther($this->url('forside'));
    }

    function getCms()
    {
        return $this->cms->create($this->name());
    }


    function execute()
    {
        return $this->wrap(parent::execute());
    }

    function wrapHtml($content)
    {
        $page = $this->getCms()->getPage('forside');

        $tpl = $this->templates->create('main');
        return $tpl->render($this, array('content' => $content, 'navigation' => $page['navigation_toplevel']));
    }

    function document()
    {
        return $this->document;
    }

}