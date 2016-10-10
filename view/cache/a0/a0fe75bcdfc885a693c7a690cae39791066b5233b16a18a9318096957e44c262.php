<?php

/* admin/contact.html.twig */
class __TwigTemplate_013285be24e16fdea98a17919b9c1fdb1ebf02d6338dd0aefde769e75cdcf330 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin/base.html.twig", "admin/contact.html.twig", 1);
        $this->blocks = array(
            'info' => array($this, 'block_info'),
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

    // line 3
    public function block_info($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        if (array_key_exists("info", $context)) {
            // line 5
            echo "        ";
            if (((isset($context["info"]) ? $context["info"] : null) == "configuration-save")) {
                // line 6
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Konfiguracja została zapisana</div>
        ";
            } elseif ((            // line 7
(isset($context["info"]) ? $context["info"] : null) == "configuration-fail")) {
                // line 8
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">Konfiguracja nie została zapisana</div>
        ";
            }
            // line 10
            echo "    ";
        }
    }

    // line 12
    public function block_body($context, array $blocks = array())
    {
        // line 13
        echo "        <div class=\"row\">
            <p class=\"text-center\">Strona stworzona przez Paweł Suchodolski<br/>
            tel. 784 00 26 24<br/>
            shinoks@o2.pl<br/>
            </p>
            
        </div>
        ";
    }

    public function getTemplateName()
    {
        return "admin/contact.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 13,  52 => 12,  47 => 10,  43 => 8,  41 => 7,  38 => 6,  35 => 5,  32 => 4,  29 => 3,  11 => 1,);
    }
}
/* {% extends 'admin/base.html.twig' %}*/
/* */
/* {% block info %}*/
/*     {% if info is defined %}*/
/*         {% if info == 'configuration-save'%}*/
/*             <div class="alert alert-success text-center" role="alert">Konfiguracja została zapisana</div>*/
/*         {% elseif info == 'configuration-fail'%}*/
/*             <div class="alert alert-danger text-center" role="alert">Konfiguracja nie została zapisana</div>*/
/*         {% endif %}*/
/*     {% endif %}*/
/* {% endblock %}*/
/*         {% block body %}*/
/*         <div class="row">*/
/*             <p class="text-center">Strona stworzona przez Paweł Suchodolski<br/>*/
/*             tel. 784 00 26 24<br/>*/
/*             shinoks@o2.pl<br/>*/
/*             </p>*/
/*             */
/*         </div>*/
/*         {% endblock %}*/
/*   */
