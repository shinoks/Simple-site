<?php

/* loginKonsultant.html.twig */
class __TwigTemplate_38570bca92f5ac9975051b9d6dcad1da76acc6a7bda733edba40fe6dc314a06e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'pageName' => array($this, 'block_pageName'),
            'info' => array($this, 'block_info'),
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
    <title>
        ";
        // line 8
        $this->displayBlock('pageName', $context, $blocks);
        // line 11
        echo "    </title>

    <!-- Bootstrap -->
    <link href=\"web/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"web/css/custom.css\" rel=\"stylesheet\">
    <link href=\"web/css/admin.css\" rel=\"stylesheet\">
    <link href=\"https://fonts.googleapis.com/css?family=Pavanam\" rel=\"stylesheet\">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src=\"https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js\"></script>
      <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
    <![endif]-->
    <link rel=\"icon\"  type=\"web/images/png\" href=\"favicon.png\">

<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js\"></script>
  </head>
  <body>
    <nav class=\"navbar navbar-default\">
      <div class=\"container\"><br/>
        <p class=\"text-center\">Sklep wewnętrzny - www.grupaformat.pl</p>
      </div>
    </nav>
    ";
        // line 34
        $this->displayBlock('info', $context, $blocks);
        // line 45
        echo "    <div class=\"container\">
      <form class=\"form-signin\" action=\"index.php?action=loginKonsultant\" method=\"POST\">
        <h2 class=\"form-signin-heading\">Zaloguj się</h2>
        <input type=\"text\" name=\"konsultantNumber\" id=\"konsultantNumber\" class=\"form-control\" placeholder=\"Nr konsultanta\" required autofocus><br/>
        <input type=\"text\" name=\"konsultantFirstName\" id=\"konsultantFirstName\" class=\"form-control\" placeholder=\"Imię\" required><br/>
        <input type=\"text\" name=\"konsultantLastName\" id=\"konsultantLastName\" class=\"form-control\" placeholder=\"Nazwisko\" required><br/>
        <input type=\"password\" name=\"konsultantPassword\" id=\"konsultantPassword\" class=\"form-control\" placeholder=\"Hasło\" required>

        <button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\">Zaloguj</button>
      </form>

    </div>
    
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js\"></script>
    <script src=\"web/js/bootstrap.min.js\"></script>
</body>
</html>";
    }

    // line 8
    public function block_pageName($context, array $blocks = array())
    {
        // line 9
        echo "            ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "pageName", array()), "html", null, true);
        echo "
        ";
    }

    // line 34
    public function block_info($context, array $blocks = array())
    {
        // line 35
        echo "    ";
        if (array_key_exists("info", $context)) {
            // line 36
            echo "        ";
            if (((isset($context["info"]) ? $context["info"] : null) == "loginKonsultant-fail")) {
                // line 37
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">Błąd logowania - wpisałeś niepoprawne dane</div>
        ";
            } elseif ((            // line 38
(isset($context["info"]) ? $context["info"] : null) == "loginKonsultant-lackField")) {
                // line 39
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">Brak wszystkich pól</div>
        ";
            } elseif ((            // line 40
(isset($context["info"]) ? $context["info"] : null) == "loginKonsultant-ipfail")) {
                // line 41
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">Zabroniony dostęp</div>
        ";
            }
            // line 43
            echo "    ";
        }
    }

    public function getTemplateName()
    {
        return "loginKonsultant.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  112 => 43,  108 => 41,  106 => 40,  103 => 39,  101 => 38,  98 => 37,  95 => 36,  92 => 35,  89 => 34,  82 => 9,  79 => 8,  59 => 45,  57 => 34,  32 => 11,  30 => 8,  21 => 1,);
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
    <title>
        {% block pageName %}
            {{ config.pageName }}
        {% endblock %}
    </title>

    <!-- Bootstrap -->
    <link href=\"web/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"web/css/custom.css\" rel=\"stylesheet\">
    <link href=\"web/css/admin.css\" rel=\"stylesheet\">
    <link href=\"https://fonts.googleapis.com/css?family=Pavanam\" rel=\"stylesheet\">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src=\"https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js\"></script>
      <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
    <![endif]-->
    <link rel=\"icon\"  type=\"web/images/png\" href=\"favicon.png\">

<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js\"></script>
  </head>
  <body>
    <nav class=\"navbar navbar-default\">
      <div class=\"container\"><br/>
        <p class=\"text-center\">Sklep wewnętrzny - www.grupaformat.pl</p>
      </div>
    </nav>
    {% block info %}
    {% if info is defined %}
        {% if info == 'loginKonsultant-fail'%}
            <div class=\"alert alert-danger text-center\" role=\"alert\">Błąd logowania - wpisałeś niepoprawne dane</div>
        {% elseif info == 'loginKonsultant-lackField' %}
            <div class=\"alert alert-danger text-center\" role=\"alert\">Brak wszystkich pól</div>
        {% elseif info == 'loginKonsultant-ipfail' %}
            <div class=\"alert alert-danger text-center\" role=\"alert\">Zabroniony dostęp</div>
        {% endif %}
    {% endif %}
{% endblock %}
    <div class=\"container\">
      <form class=\"form-signin\" action=\"index.php?action=loginKonsultant\" method=\"POST\">
        <h2 class=\"form-signin-heading\">Zaloguj się</h2>
        <input type=\"text\" name=\"konsultantNumber\" id=\"konsultantNumber\" class=\"form-control\" placeholder=\"Nr konsultanta\" required autofocus><br/>
        <input type=\"text\" name=\"konsultantFirstName\" id=\"konsultantFirstName\" class=\"form-control\" placeholder=\"Imię\" required><br/>
        <input type=\"text\" name=\"konsultantLastName\" id=\"konsultantLastName\" class=\"form-control\" placeholder=\"Nazwisko\" required><br/>
        <input type=\"password\" name=\"konsultantPassword\" id=\"konsultantPassword\" class=\"form-control\" placeholder=\"Hasło\" required>

        <button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\">Zaloguj</button>
      </form>

    </div>
    
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js\"></script>
    <script src=\"web/js/bootstrap.min.js\"></script>
</body>
</html>", "loginKonsultant.html.twig", "/view/loginKonsultant.html.twig");
    }
}
