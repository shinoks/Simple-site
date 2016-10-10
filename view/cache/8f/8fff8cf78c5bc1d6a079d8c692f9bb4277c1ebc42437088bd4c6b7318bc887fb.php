<?php

/* admin/start.html.twig */
class __TwigTemplate_a88ee079c3854db6c20af0afbf74b66c7e5bd9c698dd1ef0a47859dc1143109f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin/base.html.twig", "admin/start.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "admin/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_body($context, array $blocks = array())
    {
        // line 5
        echo "            testtttt
        ";
    }

    public function getTemplateName()
    {
        return "admin/start.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 5,  28 => 4,  11 => 1,);
    }
}
/* {% extends 'admin/base.html.twig' %}*/
/* */
/* */
/*         {% block body %}*/
/*             testtttt*/
/*         {% endblock %}*/
/*   */
