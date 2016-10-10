<?php

/* admin/login.html.twig */
class __TwigTemplate_86e5f1cc827279cc49be42f6fb7360d1c3081f67c8ef8114020a955bdb65eadd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
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
    <title>Simple site - administration panel</title>

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
        <p class=\"text-center\">Panel administracyjny - www.grupaformat.pl</p>
      </div>
    </nav>
    ";
        // line 30
        $this->displayBlock('info', $context, $blocks);
        // line 37
        echo "    <div class=\"container\">
      <form class=\"form-signin\" action=\"index.php?site=admin&action=login\" method=\"POST\">
        <h2 class=\"form-signin-heading\">Zaloguj się</h2>
        <label for=\"inputEmail\" class=\"sr-only\">Nazwa użytkownika</label>
        <input type=\"username\" name=\"username\" id=\"username\" class=\"form-control\" placeholder=\"Nazwa użytkownika\" required autofocus>
        <label for=\"inputPassword\" class=\"sr-only\">Hasło</label>
        <input type=\"password\" name=\"password\" id=\"password\" class=\"form-control\" placeholder=\"Hasło\" required>

        <button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\">Zaloguj</button>
      </form>

    </div>
    
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js\"></script>
    <script src=\"web/js/bootstrap.min.js\"></script>
</body>
</html>";
    }

    // line 30
    public function block_info($context, array $blocks = array())
    {
        // line 31
        echo "    ";
        if (array_key_exists("info", $context)) {
            // line 32
            echo "        ";
            if (((isset($context["info"]) ? $context["info"] : null) == "logout")) {
                // line 33
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Zostałeś poprawnie wylogowany</div>
        ";
            }
            // line 35
            echo "    ";
        }
    }

    public function getTemplateName()
    {
        return "admin/login.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  86 => 35,  82 => 33,  79 => 32,  76 => 31,  73 => 30,  53 => 37,  51 => 30,  20 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="en">*/
/*   <head>*/
/*     <meta charset="utf-8">*/
/*     <meta http-equiv="X-UA-Compatible" content="IE=edge">*/
/*     <meta name="viewport" content="width=device-width, initial-scale=1">*/
/*     <title>Simple site - administration panel</title>*/
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
/* */
/* <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>*/
/*   </head>*/
/*   <body>*/
/*     <nav class="navbar navbar-default">*/
/*       <div class="container"><br/>*/
/*         <p class="text-center">Panel administracyjny - www.grupaformat.pl</p>*/
/*       </div>*/
/*     </nav>*/
/*     {% block info %}*/
/*     {% if info is defined %}*/
/*         {% if info == 'logout'%}*/
/*             <div class="alert alert-success text-center" role="alert">Zostałeś poprawnie wylogowany</div>*/
/*         {% endif %}*/
/*     {% endif %}*/
/* {% endblock %}*/
/*     <div class="container">*/
/*       <form class="form-signin" action="index.php?site=admin&action=login" method="POST">*/
/*         <h2 class="form-signin-heading">Zaloguj się</h2>*/
/*         <label for="inputEmail" class="sr-only">Nazwa użytkownika</label>*/
/*         <input type="username" name="username" id="username" class="form-control" placeholder="Nazwa użytkownika" required autofocus>*/
/*         <label for="inputPassword" class="sr-only">Hasło</label>*/
/*         <input type="password" name="password" id="password" class="form-control" placeholder="Hasło" required>*/
/* */
/*         <button class="btn btn-lg btn-primary btn-block" type="submit">Zaloguj</button>*/
/*       </form>*/
/* */
/*     </div>*/
/*     */
/*     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>*/
/*     <script src="web/js/bootstrap.min.js"></script>*/
/* </body>*/
/* </html>*/
