<?php

/* base.html.twig */
class __TwigTemplate_bf8d38328fb6ae5c99c48b74e6aab75066a6aa26c8ba606aaa1fda3f0b440c58 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'script' => array($this, 'block_script'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
  <head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>Platforma wewnętrzna grupaformat.pl</title>

    <!-- Bootstrap -->
    <link href=\"web/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"web/css/custom.css\" rel=\"stylesheet\">
    <link href=\"web/css/lightbox.css\" rel=\"stylesheet\">
    <link href=\"https://fonts.googleapis.com/css?family=Pavanam\" rel=\"stylesheet\">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src=\"https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js\"></script>
      <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
    <![endif]-->
    <link rel=\"icon\"  type=\"web/images/png\" href=\"favicon.png\">

<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js\"></script>
";
        // line 23
        $this->displayBlock('script', $context, $blocks);
        // line 26
        echo "  </head>
  <body background=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "siteBackgroundImage", array()), "html", null, true);
        echo "\">
    <div class=\"";
        // line 28
        if ($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "menuPosition", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "menuPosition", array()), "html", null, true);
        } else {
            echo "menu";
        }
        if ($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "menuShadow", array(), "any", true, true)) {
            echo " menu-shadow ";
        }
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "menuWidth", array()), "html", null, true);
        echo "\" id=\"menu\">
        <nav class=\"navbar navbar-default\">
            <div class=\"container-fluid\">
                <div class=\"navbar-header\">
                  <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\" aria-expanded=\"false\">
                    <span class=\"sr-only\">Toggle navigation</span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                  </button>
                  <a href=\"#\"><img style=\"height:50px;\" src=\"web/images/logo.jpg\"/></a>
                </div>

                <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
                    ";
        // line 42
        if ( !array_key_exists("menu", $context)) {
            // line 43
            echo "                        ";
            $context["menu"] = "start";
            // line 44
            echo "                    ";
        }
        // line 45
        echo "                    <div >
                        <ul class=\"nav navbar-nav\">
                            <li";
        // line 47
        if (((isset($context["menu"]) ? $context["menu"] : null) == "shop")) {
            echo " class=\"active\"";
        }
        echo "><a href=\"index.php?site=shop\">Sklep</a></li>
                            <li";
        // line 48
        if (((isset($context["menu"]) ? $context["menu"] : null) == "myAccount")) {
            echo " class=\"active\"";
        }
        echo "><a href=\"index.php?site=myAccount\">Konto Konsultanta</a></li>
                        </ul>
                        </div>
                        <ul class=\"nav navbar-nav navbar-right\">
                            <a href='' class=\"navbar-brand\">";
        // line 52
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "companyName", array()), "html", null, true);
        echo "<br/><span style=\"companySlogan\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "companySlogan", array()), "html", null, true);
        echo "</span></a>
                        </ul>
                    
                </div>
            </div>
        </nav>
    </div><br/>
    <p style=\"height:40px;\"></p>
    ";
        // line 60
        if (($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "carousel", array()) == true)) {
            // line 61
            echo "        ";
            $this->loadTemplate("carousel.html.twig", "base.html.twig", 61)->display($context);
            // line 62
            echo "    ";
        }
        // line 63
        echo "    
    ";
        // line 64
        $this->loadTemplate("shop-info.html.twig", "base.html.twig", 64)->display($context);
        // line 65
        echo "    
    ";
        // line 66
        $this->displayBlock('body', $context, $blocks);
        // line 68
        echo "           <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js\"></script>
    <script src=\"web/js/bootstrap.min.js\"></script>
    <script src=\"web/js/lightbox.js\"></script>
</body>
</html>";
    }

    // line 23
    public function block_script($context, array $blocks = array())
    {
        // line 24
        echo "
";
    }

    // line 66
    public function block_body($context, array $blocks = array())
    {
        // line 67
        echo "    ";
    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  157 => 67,  154 => 66,  149 => 24,  146 => 23,  138 => 68,  136 => 66,  133 => 65,  131 => 64,  128 => 63,  125 => 62,  122 => 61,  120 => 60,  107 => 52,  98 => 48,  92 => 47,  88 => 45,  85 => 44,  82 => 43,  80 => 42,  54 => 28,  50 => 27,  47 => 26,  45 => 23,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html lang=\"en\">
  <head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>Platforma wewnętrzna grupaformat.pl</title>

    <!-- Bootstrap -->
    <link href=\"web/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"web/css/custom.css\" rel=\"stylesheet\">
    <link href=\"web/css/lightbox.css\" rel=\"stylesheet\">
    <link href=\"https://fonts.googleapis.com/css?family=Pavanam\" rel=\"stylesheet\">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src=\"https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js\"></script>
      <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
    <![endif]-->
    <link rel=\"icon\"  type=\"web/images/png\" href=\"favicon.png\">

<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js\"></script>
{% block script %}

{% endblock %}
  </head>
  <body background=\"{{ config.siteBackgroundImage }}\">
    <div class=\"{% if config.menuPosition is defined %}{{ config.menuPosition }}{% else%}menu{% endif %}{% if config.menuShadow is defined %} menu-shadow {% endif %} {{ config.menuWidth }}\" id=\"menu\">
        <nav class=\"navbar navbar-default\">
            <div class=\"container-fluid\">
                <div class=\"navbar-header\">
                  <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\" aria-expanded=\"false\">
                    <span class=\"sr-only\">Toggle navigation</span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                  </button>
                  <a href=\"#\"><img style=\"height:50px;\" src=\"web/images/logo.jpg\"/></a>
                </div>

                <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
                    {% if menu is not defined %}
                        {% set menu = 'start' %}
                    {% endif %}
                    <div >
                        <ul class=\"nav navbar-nav\">
                            <li{% if menu == 'shop' %} class=\"active\"{% endif %}><a href=\"index.php?site=shop\">Sklep</a></li>
                            <li{% if menu == 'myAccount' %} class=\"active\"{% endif %}><a href=\"index.php?site=myAccount\">Konto Konsultanta</a></li>
                        </ul>
                        </div>
                        <ul class=\"nav navbar-nav navbar-right\">
                            <a href='' class=\"navbar-brand\">{{ config.companyName }}<br/><span style=\"companySlogan\">{{ config.companySlogan }}</span></a>
                        </ul>
                    
                </div>
            </div>
        </nav>
    </div><br/>
    <p style=\"height:40px;\"></p>
    {% if config.carousel == true %}
        {% include 'carousel.html.twig' %}
    {% endif %}
    
    {% include \"shop-info.html.twig\" %}
    
    {% block body%}
    {% endblock %}
           <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js\"></script>
    <script src=\"web/js/bootstrap.min.js\"></script>
    <script src=\"web/js/lightbox.js\"></script>
</body>
</html>", "base.html.twig", "/view/base.html.twig");
    }
}
