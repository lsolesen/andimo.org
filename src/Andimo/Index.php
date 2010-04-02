<?php
class Andimo_Index extends k_Component
{
    protected $templates;
    protected $cms;

    function __construct(k_TemplateFactory $templates)
    {
        $this->templates = $templates;
    }

    function renderHtml()
    {
        $page = $this->context->getCms()->getPage($this->name());
        $parser = new IntrafacePublic_CMS_HTML_Parser($page);

        if ($this->name() == 'forside') {
            $picture = $parser->getSection('picture');
            $news = $parser->getSection('news_block');
            $facts = $parser->getSection('fact_block');
            $donate = $parser->getSection('donate_block');
            $data = array('news' => $news['html'], 'facts' => $facts['html'], 'donate' => $donate['html']);

            $tpl = $this->templates->create('frontpage');

        } else {
            $picture = $parser->getSection('picture');
            $column1 = $parser->getSection('column_1');
            $column2 = $parser->getSection('column_2');

            $data = array('column_1' => $column1['html'], 'column_2' => $column2['html']);
            $tpl = $this->templates->create('page');
        }
        $this->document->picture = $picture['elements'][0]['uri'];

        return $tpl->render($this, $data);
    }
}