<?php
class Andimo_Root extends k_Component
{
    function map($name)
    {
        return 'Andimo_Language';
    }

    function GET()
    {
        $options = array(
            "da" => true,
            "en" => true
        );

        $lang = HTTP::negotiateLanguage($options, "en");

        return new k_SeeOther($this->url($lang));
    }
}