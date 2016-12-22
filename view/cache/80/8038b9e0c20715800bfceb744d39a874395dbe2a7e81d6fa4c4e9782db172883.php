<?php

/* shop-login.html.twig */
class __TwigTemplate_59ced3b412ea2e9a4318a7306a2c610c5f5f09753ccb560bb0fa1f0173d30208 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "shop-login.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $context["url"] = "index.php?site=shop&view=login";
        // line 5
        echo "    <div class=\"container width-full\">
        <div class=\"well\">
            <div class=\"row\">
                <div class=\"row\">
                    <div class=\"col-md-3\">
                        ";
        // line 10
        $this->loadTemplate("shop-leftMenu.html.twig", "shop-login.html.twig", 10)->display($context);
        // line 11
        echo "                    </div>
                    <div class=\"col-md-9\">
                        <div class=\"well responsive\">
                            <div class=\"row\">
                                ";
        // line 15
        if (twig_test_empty((isset($context["user"]) ? $context["user"] : null))) {
            // line 16
            echo "                                <div class=\"col-md-6 text-center\">
                                    Nie jesteś zalogowany. Zaloguj się<br/>
                                    <form action=\"index.php?site=shop&view=cart&action=login\" method=\"POST\">
                                        <input class=\"form-control\" type=\"text\" name=\"username\" placeholder=\"Nazwa użytkownika\"/>
                                        <input class=\"form-control\" type=\"password\" name=\"password\" placeholder=\"Hasło\" />
                                        <input class=\"btn btn-success\" type=\"submit\" value=\"Zaloguj\"/>
                                    </form>
                                </div>
                                <div class=\"col-md-6 text-center\">
                                    Nie posiadasz konta?<br/>
                                    <a href=\"index.php?site=shop&view=register\" class=\"btn btn-primary\">Zarejestruj się</a>
                                </div>
                                ";
        } else {
            // line 29
            echo "                                    Jesteś zalogowany jako:<br/>
                                    ";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "name", array()), "html", null, true);
            echo "<br/>
                                    <a href=\"";
            // line 31
            echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
            echo "&view=account\" class=\"btn btn-default btn-xs\">Moje konto</a>
                                    <a href=\"";
            // line 32
            echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
            echo "&view=orders\" class=\"btn btn-default btn-xs\">Moje zamówienia</a><br/><br/>
                                    <a href=\"index.php?site=shop&action=logout\" class=\"btn btn-info\">Wyloguj się</a>
                                ";
        }
        // line 35
        echo "                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "shop-login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 35,  77 => 32,  73 => 31,  69 => 30,  66 => 29,  51 => 16,  49 => 15,  43 => 11,  41 => 10,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}

{% block body %}
    {% set url = \"index.php?site=shop&view=login\" %}
    <div class=\"container width-full\">
        <div class=\"well\">
            <div class=\"row\">
                <div class=\"row\">
                    <div class=\"col-md-3\">
                        {% include \"shop-leftMenu.html.twig\" %}
                    </div>
                    <div class=\"col-md-9\">
                        <div class=\"well responsive\">
                            <div class=\"row\">
                                {% if user is empty %}
                                <div class=\"col-md-6 text-center\">
                                    Nie jesteś zalogowany. Zaloguj się<br/>
                                    <form action=\"index.php?site=shop&view=cart&action=login\" method=\"POST\">
                                        <input class=\"form-control\" type=\"text\" name=\"username\" placeholder=\"Nazwa użytkownika\"/>
                                        <input class=\"form-control\" type=\"password\" name=\"password\" placeholder=\"Hasło\" />
                                        <input class=\"btn btn-success\" type=\"submit\" value=\"Zaloguj\"/>
                                    </form>
                                </div>
                                <div class=\"col-md-6 text-center\">
                                    Nie posiadasz konta?<br/>
                                    <a href=\"index.php?site=shop&view=register\" class=\"btn btn-primary\">Zarejestruj się</a>
                                </div>
                                {% else %}
                                    Jesteś zalogowany jako:<br/>
                                    {{user.name}}<br/>
                                    <a href=\"{{url}}&view=account\" class=\"btn btn-default btn-xs\">Moje konto</a>
                                    <a href=\"{{url}}&view=orders\" class=\"btn btn-default btn-xs\">Moje zamówienia</a><br/><br/>
                                    <a href=\"index.php?site=shop&action=logout\" class=\"btn btn-info\">Wyloguj się</a>
                                {% endif %}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{% endblock%}
", "shop-login.html.twig", "/view/shop-login.html.twig");
    }
}
