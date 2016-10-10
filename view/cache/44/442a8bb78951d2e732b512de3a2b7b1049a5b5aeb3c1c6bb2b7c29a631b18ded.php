<?php

/* admin/base.html.twig */
class __TwigTemplate_7fb83640629fe949fcd045f75f539e4119a3f4f464c0fd0cfa64c2c88a319b98 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'pageName' => array($this, 'block_pageName'),
            'head' => array($this, 'block_head'),
            'pageSite' => array($this, 'block_pageSite'),
            'menu' => array($this, 'block_menu'),
            'info' => array($this, 'block_info'),
            'body' => array($this, 'block_body'),
            'footer' => array($this, 'block_footer'),
            'footerAddress' => array($this, 'block_footerAddress'),
            'footerText' => array($this, 'block_footerText'),
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
";
        // line 26
        $this->displayBlock('head', $context, $blocks);
        // line 28
        echo "  </head>
  <body>

    <nav class=\"navbar navbar-default\">
      <div class=\"container\"><br/>
        <p class=\"text-center\">Panel administracyjny - 
            ";
        // line 34
        $this->displayBlock('pageSite', $context, $blocks);
        // line 37
        echo "        </p>
      </div>
    </nav>
       ";
        // line 40
        $this->displayBlock('menu', $context, $blocks);
        // line 83
        echo "    <div class=\"container-fluid \">
        ";
        // line 84
        $this->displayBlock('info', $context, $blocks);
        // line 86
        echo "        <div class=\"well\">
        ";
        // line 87
        $this->displayBlock('body', $context, $blocks);
        // line 90
        echo "        </div>
    </div>
    ";
        // line 92
        $this->displayBlock('footer', $context, $blocks);
        // line 101
        echo "    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js\"></script>
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

    // line 26
    public function block_head($context, array $blocks = array())
    {
    }

    // line 34
    public function block_pageSite($context, array $blocks = array())
    {
        // line 35
        echo "                ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "pageSite", array()), "html", null, true);
        echo "
            ";
    }

    // line 40
    public function block_menu($context, array $blocks = array())
    {
        // line 41
        echo "            
                <nav class=\"navbar navbar-default\">
                  <div class=\"container-fluid\">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class=\"navbar-header\">
                      <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\" aria-expanded=\"false\">
                        <span class=\"sr-only\">Toggle navigation</span>
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                      </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
                      <ul class=\"nav navbar-nav\">
                      ";
        // line 57
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["menu"]) ? $context["menu"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["menuItem"]) {
            // line 58
            echo "                        ";
            if (($this->getAttribute($context["menuItem"], "parent", array()) == 1)) {
                // line 59
                echo "                            <li class=\"dropdown\">
                                <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">";
                // line 60
                echo twig_escape_filter($this->env, $this->getAttribute($context["menuItem"], "menuName", array()));
                echo " <span class=\"caret\"></span></a>
                                <ul class=\"dropdown-menu\">
                            ";
                // line 62
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["menuChild"]) ? $context["menuChild"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["childItems"]) {
                    // line 63
                    echo "                                ";
                    if (($this->getAttribute($context["childItems"], "parentId", array()) == $this->getAttribute($context["menuItem"], "menuId", array()))) {
                        // line 64
                        echo "                                        <li><a href=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["childItems"], "menuHref", array()));
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["childItems"], "menuName", array()));
                        echo "</a></li>
                                    ";
                    }
                    // line 66
                    echo "                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['childItems'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 67
                echo "                                </ul>
                            </li>
                        ";
            } elseif (($this->getAttribute(            // line 69
$context["menuItem"], "parentId", array()) == 0)) {
                // line 70
                echo "                            <li><a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["menuItem"], "menuHref", array()));
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["menuItem"], "menuName", array()));
                echo "</a></li>
                        ";
            }
            // line 72
            echo "                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['menuItem'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 73
        echo "                      </ul>
                      <div class=\"navbar-right\">
                        <a class=\"btn btn-default\" href=\"index.php?site=admin&action=logout\">Wyloguj</a>
                      </div>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                </nav>
                <br/>
            
      ";
    }

    // line 84
    public function block_info($context, array $blocks = array())
    {
        // line 85
        echo "        ";
    }

    // line 87
    public function block_body($context, array $blocks = array())
    {
        // line 88
        echo "            
        ";
    }

    // line 92
    public function block_footer($context, array $blocks = array())
    {
        // line 93
        echo "        <div class=\"footer\"><p class=\"text-center\"><a href=\"http://";
        $this->displayBlock('footerAddress', $context, $blocks);
        // line 95
        echo "\">
            ";
        // line 96
        $this->displayBlock('footerText', $context, $blocks);
        // line 99
        echo "        </a></p></div>
    ";
    }

    // line 93
    public function block_footerAddress($context, array $blocks = array())
    {
        // line 94
        echo "                     ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "pageSite", array()), "html", null, true);
        echo "
            ";
    }

    // line 96
    public function block_footerText($context, array $blocks = array())
    {
        // line 97
        echo "                ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "pageSite", array()), "html", null, true);
        echo "
            ";
    }

    public function getTemplateName()
    {
        return "admin/base.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  257 => 97,  254 => 96,  247 => 94,  244 => 93,  239 => 99,  237 => 96,  234 => 95,  231 => 93,  228 => 92,  223 => 88,  220 => 87,  216 => 85,  213 => 84,  200 => 73,  194 => 72,  186 => 70,  184 => 69,  180 => 67,  174 => 66,  166 => 64,  163 => 63,  159 => 62,  154 => 60,  151 => 59,  148 => 58,  144 => 57,  126 => 41,  123 => 40,  116 => 35,  113 => 34,  108 => 26,  101 => 9,  98 => 8,  91 => 101,  89 => 92,  85 => 90,  83 => 87,  80 => 86,  78 => 84,  75 => 83,  73 => 40,  68 => 37,  66 => 34,  58 => 28,  56 => 26,  39 => 11,  37 => 8,  28 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="en">*/
/*   <head>*/
/*     <meta charset="utf-8">*/
/*     <meta http-equiv="X-UA-Compatible" content="IE=edge">*/
/*     <meta name="viewport" content="width=device-width, initial-scale=1">*/
/*     <title>*/
/*         {% block pageName %}*/
/*             {{ config.pageName }}*/
/*         {% endblock %}*/
/*     </title>*/
/* */
/*     <!-- Bootstrap -->*/
/*     <link href="web/css/bootstrap.min.css" rel="stylesheet">*/
/*     <link href="web/css/custom.css" rel="stylesheet">*/
/*     <link href="web/css/admin.css" rel="stylesheet">*/
/*     <link href="https://fonts.googleapis.com/css?family=Pavanam" rel="stylesheet">*/
/*     <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->*/
/*     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->*/
/*     <!--[if lt IE 9]>*/
/*       <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>*/
/*       <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>*/
/*     <![endif]-->*/
/*     <link rel="icon"  type="web/images/png" href="favicon.png">*/
/* <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>*/
/* {% block head %}*/
/* {% endblock %}*/
/*   </head>*/
/*   <body>*/
/* */
/*     <nav class="navbar navbar-default">*/
/*       <div class="container"><br/>*/
/*         <p class="text-center">Panel administracyjny - */
/*             {% block pageSite %}*/
/*                 {{ config.pageSite }}*/
/*             {% endblock %}*/
/*         </p>*/
/*       </div>*/
/*     </nav>*/
/*        {% block menu %}*/
/*             */
/*                 <nav class="navbar navbar-default">*/
/*                   <div class="container-fluid">*/
/*                     <!-- Brand and toggle get grouped for better mobile display -->*/
/*                     <div class="navbar-header">*/
/*                       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">*/
/*                         <span class="sr-only">Toggle navigation</span>*/
/*                         <span class="icon-bar"></span>*/
/*                         <span class="icon-bar"></span>*/
/*                         <span class="icon-bar"></span>*/
/*                       </button>*/
/*                     </div>*/
/* */
/*                     <!-- Collect the nav links, forms, and other content for toggling -->*/
/*                     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">*/
/*                       <ul class="nav navbar-nav">*/
/*                       {% for menuItem in menu %}*/
/*                         {% if menuItem.parent == 1 %}*/
/*                             <li class="dropdown">*/
/*                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ menuItem.menuName|e }} <span class="caret"></span></a>*/
/*                                 <ul class="dropdown-menu">*/
/*                             {% for childItems in menuChild %}*/
/*                                 {% if childItems.parentId == menuItem.menuId %}*/
/*                                         <li><a href="{{ childItems.menuHref|e }}">{{ childItems.menuName|e }}</a></li>*/
/*                                     {% endif %}*/
/*                                 {% endfor %}*/
/*                                 </ul>*/
/*                             </li>*/
/*                         {% elseif menuItem.parentId == 0 %}*/
/*                             <li><a href="{{ menuItem.menuHref|e }}">{{ menuItem.menuName|e }}</a></li>*/
/*                         {% endif %}*/
/*                       {% endfor %}*/
/*                       </ul>*/
/*                       <div class="navbar-right">*/
/*                         <a class="btn btn-default" href="index.php?site=admin&action=logout">Wyloguj</a>*/
/*                       </div>*/
/*                     </div><!-- /.navbar-collapse -->*/
/*                   </div><!-- /.container-fluid -->*/
/*                 </nav>*/
/*                 <br/>*/
/*             */
/*       {% endblock %}*/
/*     <div class="container-fluid ">*/
/*         {% block info %}*/
/*         {% endblock %}*/
/*         <div class="well">*/
/*         {% block body %}*/
/*             */
/*         {% endblock %}*/
/*         </div>*/
/*     </div>*/
/*     {% block footer %}*/
/*         <div class="footer"><p class="text-center"><a href="http://{% block footerAddress %}*/
/*                      {{config.pageSite }}*/
/*             {% endblock %}">*/
/*             {% block footerText %}*/
/*                 {{ config.pageSite }}*/
/*             {% endblock %}*/
/*         </a></p></div>*/
/*     {% endblock %}*/
/*     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>*/
/*     <script src="web/js/bootstrap.min.js"></script>*/
/* </body>*/
/* </html>*/
