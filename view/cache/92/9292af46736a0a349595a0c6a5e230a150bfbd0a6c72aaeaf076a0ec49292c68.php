<?php

/* admin/shop-menu.html.twig */
class __TwigTemplate_dd8ef1d4034958c0abf853c23add01b59f5f1233ac2a3d010b5af2cbb34b86e9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        if ( !array_key_exists("shopMenu", $context)) {
            // line 2
            echo "    ";
            echo twig_escape_filter($this->env, ((isset($context["shopMenu"]) ? $context["shopMenu"] : null) == "orders"), "html", null, true);
            echo "
";
        }
        // line 4
        echo "
<div class=\"well\">
            
            <a class=\"btn btn-default width-full text-left-important ";
        // line 7
        if (((isset($context["shopMenu"]) ? $context["shopMenu"] : null) == "orders")) {
            echo "active";
        }
        echo "\" href=\"index.php?site=admin&action=shop\">Zamówienia</a>
            <a class=\"btn btn-default width-full text-left-important ";
        // line 8
        if (((isset($context["shopMenu"]) ? $context["shopMenu"] : null) == "users")) {
            echo "active";
        }
        echo "\" href=\"index.php?site=admin&action=shop&act=users\">Użytkownicy</a>
            
            <a class=\"btn btn-default width-full text-left-important ";
        // line 10
        if (((isset($context["shopMenu"]) ? $context["shopMenu"] : null) == "products")) {
            echo "active";
        }
        echo "\" role=\"button\" data-toggle=\"collapse\" href=\"#Produkty\" aria-expanded=\"false\" aria-controls=\"Produkty\">Produkty</a>
            <div class=\"panel panel-default collapse fade \" id=\"Produkty\">
            <ul class=\"nav nav-pills nav-stacked \">
              <li><a class=\"";
        // line 13
        if (((isset($context["shopMenu"]) ? $context["shopMenu"] : null) == "products")) {
            echo "active";
        }
        echo "\" href=\"index.php?site=admin&action=shop&act=products\">Produkty</a></li>
              <li><a class=\"";
        // line 14
        if (((isset($context["shopMenu"]) ? $context["shopMenu"] : null) == "products")) {
            echo "active";
        }
        echo "\"href=\"index.php?site=admin&action=shop&act=products\">Dodaj produkt</a></li>
            </ul>
            </div>
            <a class=\"btn btn-default width-full text-left-important ";
        // line 17
        if (((isset($context["shopMenu"]) ? $context["shopMenu"] : null) == "categories")) {
            echo "active";
        }
        echo "\" href=\"index.php?site=admin&action=shop&act=categories\">Kategorie</a>
            <a class=\"btn btn-default width-full text-left-important ";
        // line 18
        if (((isset($context["shopMenu"]) ? $context["shopMenu"] : null) == "raports")) {
            echo "active";
        }
        echo "\" role=\"button\" data-toggle=\"collapse\" href=\"#Raporty\" aria-expanded=\"false\" aria-controls=\"Raporty\">Raporty</a>
            <div class=\"panel panel-default collapse fade \" id=\"Raporty\">
                <ul class=\"nav nav-pills nav-stacked \">
                  <li><a class=\"";
        // line 21
        if (((isset($context["shopMenu"]) ? $context["shopMenu"] : null) == "raporty")) {
            echo "active";
        }
        echo "\" href=\"index.php?site=admin&action=shop&act=raports&pref=daily\">Raport dzienny</a></li>
                  <li><a class=\"";
        // line 22
        if (((isset($context["shopMenu"]) ? $context["shopMenu"] : null) == "raporty")) {
            echo "active";
        }
        echo "\" href=\"index.php?site=admin&action=shop&act=raports&pref=products\">Raport produktów</a></li>
                </ul>
            </div>
</div>";
    }

    public function getTemplateName()
    {
        return "admin/shop-menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 22,  81 => 21,  73 => 18,  67 => 17,  59 => 14,  53 => 13,  45 => 10,  38 => 8,  32 => 7,  27 => 4,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "admin/shop-menu.html.twig", "/view/admin/shop-menu.html.twig");
    }
}
