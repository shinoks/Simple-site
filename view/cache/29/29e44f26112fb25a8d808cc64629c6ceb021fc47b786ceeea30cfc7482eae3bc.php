<?php

/* admin/configuration.html.twig */
class __TwigTemplate_b8e697cbed2e587dbc1f6dbcb6e84bba29695d451242f2d96848827c3ec70b1f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin/base.html.twig", "admin/configuration.html.twig", 1);
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
            <form method=\"POST\" action=\"index.php?site=admin&action=configuration&act=save\">
                <div class=\"row\">
                    <div class=\"col-md-8\">
                        <div class=\"form-group\">
                            <label for=\"pageName\">Nazwa Strony (widoczna na pasku):</label>
                            <input name=\"pageName\" type=\"text\" class=\"form-control\" id=\"pageName\" placeholder=\"Wpisz nazwę firmy\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "pageName", array()), "html", null, true);
        echo "\">
                        </div>
                        <div class=\"form-group\">
                            <label for=\"companyName\">Nazwa firmy:</label>
                            <input name=\"companyName\" type=\"text\" class=\"form-control\" id=\"companyName\" placeholder=\"Wpisz nazwę firmy\" value=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "companyName", array()), "html", null, true);
        echo "\">
                        </div>
                        <div class=\"form-group\">
                            <label for=\"companyName\">Slogan firmy:</label>
                            <input name=\"companySlogan\" type=\"text\" class=\"form-control\" id=\"companySlogan\" placeholder=\"Wpisz slogan firmy\" value=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "companySlogan", array()), "html", null, true);
        echo "\">
                        </div>
                        
                        <div class=\"form-group\">
                            <label for=\"text\">Adres strony:</label>
                            <input name=\"pageSite\" type=\"author\" class=\"form-control\" id=\"pageSite\" placeholder=\"Adres strony\" value=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "pageSite", array()));
        echo "\">
                        </div>
                        <div class=\"form-group\">
                            <label for=\"text\">Obrazek tła:</label>
                            <input name=\"siteBackgroundImage\" type=\"date\" class=\"form-control\" id=\"date\" value=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "siteBackgroundImage", array()), "html", null, true);
        echo "\"><br/>
                            <img style=\"width: 50px; height: 50px;\" src=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "siteBackgroundImage", array()), "html", null, true);
        echo "\"/>
                        </div>
                        <div class=\"form-group\">
                            <label for=\"text\">Stopka:</label>
                            <input name=\"footerText\" type=\"date\" class=\"form-control\" id=\"date\" value=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "footerText", array()), "html", null, true);
        echo "\"><br/>
                        </div>
                        
                        <button type=\"submit\" class=\"btn btn-primary\">Zapisz</button> 
                        
                    </div>
                </div>
            </form>
        </div>
        ";
    }

    public function getTemplateName()
    {
        return "admin/configuration.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 41,  96 => 37,  92 => 36,  85 => 32,  77 => 27,  70 => 23,  63 => 19,  55 => 13,  52 => 12,  47 => 10,  43 => 8,  41 => 7,  38 => 6,  35 => 5,  32 => 4,  29 => 3,  11 => 1,);
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
/*             <form method="POST" action="index.php?site=admin&action=configuration&act=save">*/
/*                 <div class="row">*/
/*                     <div class="col-md-8">*/
/*                         <div class="form-group">*/
/*                             <label for="pageName">Nazwa Strony (widoczna na pasku):</label>*/
/*                             <input name="pageName" type="text" class="form-control" id="pageName" placeholder="Wpisz nazwę firmy" value="{{ config.pageName }}">*/
/*                         </div>*/
/*                         <div class="form-group">*/
/*                             <label for="companyName">Nazwa firmy:</label>*/
/*                             <input name="companyName" type="text" class="form-control" id="companyName" placeholder="Wpisz nazwę firmy" value="{{ config.companyName }}">*/
/*                         </div>*/
/*                         <div class="form-group">*/
/*                             <label for="companyName">Slogan firmy:</label>*/
/*                             <input name="companySlogan" type="text" class="form-control" id="companySlogan" placeholder="Wpisz slogan firmy" value="{{ config.companySlogan }}">*/
/*                         </div>*/
/*                         */
/*                         <div class="form-group">*/
/*                             <label for="text">Adres strony:</label>*/
/*                             <input name="pageSite" type="author" class="form-control" id="pageSite" placeholder="Adres strony" value="{{ config.pageSite|e }}">*/
/*                         </div>*/
/*                         <div class="form-group">*/
/*                             <label for="text">Obrazek tła:</label>*/
/*                             <input name="siteBackgroundImage" type="date" class="form-control" id="date" value="{{ config.siteBackgroundImage }}"><br/>*/
/*                             <img style="width: 50px; height: 50px;" src="{{ config.siteBackgroundImage }}"/>*/
/*                         </div>*/
/*                         <div class="form-group">*/
/*                             <label for="text">Stopka:</label>*/
/*                             <input name="footerText" type="date" class="form-control" id="date" value="{{ config.footerText }}"><br/>*/
/*                         </div>*/
/*                         */
/*                         <button type="submit" class="btn btn-primary">Zapisz</button> */
/*                         */
/*                     </div>*/
/*                 </div>*/
/*             </form>*/
/*         </div>*/
/*         {% endblock %}*/
/*   */
