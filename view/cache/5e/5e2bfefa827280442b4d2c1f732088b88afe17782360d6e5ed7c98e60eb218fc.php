<?php

/* admin/articles.html.twig */
class __TwigTemplate_32b2779927bf5417b53d6adf604a66fc4db39b4c1ff87e9e2cb1975bace47f5c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin/base.html.twig", "admin/articles.html.twig", 1);
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

    // line 2
    public function block_info($context, array $blocks = array())
    {
        // line 3
        echo "    ";
        if (array_key_exists("info", $context)) {
            // line 4
            echo "        ";
            if (((isset($context["info"]) ? $context["info"] : null) == "article-show")) {
                // line 5
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Artykuł został opublikowany</div>
        ";
            } elseif ((            // line 6
(isset($context["info"]) ? $context["info"] : null) == "article-show-fail")) {
                // line 7
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">Artykuł nie został opublikowany</div>
        ";
            } elseif ((            // line 8
(isset($context["info"]) ? $context["info"] : null) == "article-hide")) {
                // line 9
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Artykuł został ukryty</div>
        ";
            } elseif ((            // line 10
(isset($context["info"]) ? $context["info"] : null) == "article-hide-fail")) {
                // line 11
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">Artykuł nie został ukryty</div>
        ";
            } elseif ((            // line 12
(isset($context["info"]) ? $context["info"] : null) == "article-delete")) {
                // line 13
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Artykuł został usunięty</div>
        ";
            } elseif ((            // line 14
(isset($context["info"]) ? $context["info"] : null) == "article-delete-fail")) {
                // line 15
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">Artykuł nie został usunięty</div>
        ";
            } elseif ((            // line 16
(isset($context["info"]) ? $context["info"] : null) == "article-add")) {
                // line 17
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Artykuł został dodany</div>
        ";
            }
            // line 19
            echo "    ";
        }
    }

    // line 22
    public function block_body($context, array $blocks = array())
    {
        // line 23
        echo "        <div class=\"row\">
            <div class=\"pull-right\">
                <a href=\"index.php?site=admin&action=articles&act=add\" class=\"btn btn-success\">Dodaj</a>
            </div>
        </div>
        <div class=\"table-responsive\">
            <table class=\"table table-hover\">
                  <thead>
                    <tr>
                        <td>
                            <strong>Lp.</strong>
                        </td>
                        <td>
                            <strong>Nazwa</strong>
                        </td>
                        <td>
                            <strong>Opublikowane</strong>
                        </td>
                        <td>
                            <strong>Kategoria</strong>
                        </td>
                        <td>
                            <strong>Data utworzenia</strong>
                        </td>
                        <td>
                            <strong>Usuń</strong>
                        </td>
                    </tr>
                  <thead>
                  ";
        // line 52
        $context["lp"] = 1;
        // line 53
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["pagin"]) ? $context["pagin"] : null), "articles", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
            // line 54
            echo "                    <tr>
                        <td>
                            ";
            // line 56
            echo twig_escape_filter($this->env, (isset($context["lp"]) ? $context["lp"] : null), "html", null, true);
            echo "
                        </td>
                        <td>
                            <a href=\"index.php?site=admin&action=articles&act=edit&id=";
            // line 59
            echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "articleId", array()));
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "articleName", array()));
            echo "</a>
                        </td>
                        <td>
                            ";
            // line 62
            if (($this->getAttribute($context["article"], "articlePublished", array()) == 0)) {
                // line 63
                echo "                                <a href=\"index.php?site=admin&action=articles&act=show&id=";
                echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "articleId", array()));
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "articlePublished", array()));
                echo "
                            ";
            } else {
                // line 65
                echo "                                <a href=\"index.php?site=admin&action=articles&act=hide&id=";
                echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "articleId", array()));
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "articlePublished", array()));
                echo "
                            ";
            }
            // line 67
            echo "                        </td>
                        <td>
                            ";
            // line 69
            echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "articleCategory", array()));
            echo "
                        </td>
                        <td>
                            ";
            // line 72
            echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "articleDate", array()));
            echo "
                        </td>
                        <td>
                            <a href=\"index.php?site=admin&action=articles&act=delete&id=";
            // line 75
            echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "articleId", array()));
            echo "\" class=\"btn btn-danger\">Usuń</a>
                        </td>
                    </tr>
                ";
            // line 78
            $context["lp"] = ((isset($context["lp"]) ? $context["lp"] : null) + 1);
            // line 79
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 80
        echo "            </table>
            <nav aria-label=\"...\">
              <ul class=\"pagination\">
                 ";
        // line 83
        if (((isset($context["activePage"]) ? $context["activePage"] : null) < 2)) {
            // line 84
            echo "                        <li class=\"disabled\">
                          <span>
                            <span aria-hidden=\"true\">&laquo;</span>
                          </span>
                        </li>
                    ";
        } else {
            // line 90
            echo "                        <li>
                            <a href=\"index.php?site=admin&action=articles&page=";
            // line 91
            echo twig_escape_filter($this->env, ((isset($context["activePage"]) ? $context["activePage"] : null) - 1), "html", null, true);
            echo "\"><span aria-hidden=\"true\">&laquo;</span></a>
                        </li>
                ";
        }
        // line 94
        echo "                ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(1, $this->getAttribute((isset($context["pagin"]) ? $context["pagin"] : null), "pages", array())));
        foreach ($context['_seq'] as $context["_key"] => $context["a"]) {
            // line 95
            echo "                    ";
            if (((isset($context["activePage"]) ? $context["activePage"] : null) == $context["a"])) {
                // line 96
                echo "                        <li class=\"active\">
                          <span>";
                // line 97
                echo twig_escape_filter($this->env, $context["a"], "html", null, true);
                echo " <span class=\"sr-only\">(current)</span></span>
                        </li>
                    ";
            } else {
                // line 100
                echo "                        <li>
                          <a href=\"index.php?site=admin&action=articles&page=";
                // line 101
                echo twig_escape_filter($this->env, $context["a"], "html", null, true);
                echo "\"><span>";
                echo twig_escape_filter($this->env, $context["a"], "html", null, true);
                echo "</span></a>
                        </li>
                    ";
            }
            // line 104
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['a'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 105
        echo "                
                ";
        // line 106
        if (((isset($context["activePage"]) ? $context["activePage"] : null) == $this->getAttribute((isset($context["pagin"]) ? $context["pagin"] : null), "pages", array()))) {
            // line 107
            echo "                        <li class=\"disabled\">
                          <span>
                            <span aria-hidden=\"true\">&raquo;</span>
                          </span>
                        </li>
                ";
        } else {
            // line 113
            echo "                        <li>
                            <a href=\"index.php?site=admin&action=articles&page=";
            // line 114
            echo twig_escape_filter($this->env, ((isset($context["activePage"]) ? $context["activePage"] : null) + 1), "html", null, true);
            echo "\"><span aria-hidden=\"true\">&raquo;</span></a>
                        </li>
                ";
        }
        // line 117
        echo "              </ul>
            </nav>
            
            
        </div>
        ";
    }

    public function getTemplateName()
    {
        return "admin/articles.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  264 => 117,  258 => 114,  255 => 113,  247 => 107,  245 => 106,  242 => 105,  236 => 104,  228 => 101,  225 => 100,  219 => 97,  216 => 96,  213 => 95,  208 => 94,  202 => 91,  199 => 90,  191 => 84,  189 => 83,  184 => 80,  178 => 79,  176 => 78,  170 => 75,  164 => 72,  158 => 69,  154 => 67,  146 => 65,  138 => 63,  136 => 62,  128 => 59,  122 => 56,  118 => 54,  113 => 53,  111 => 52,  80 => 23,  77 => 22,  72 => 19,  68 => 17,  66 => 16,  63 => 15,  61 => 14,  58 => 13,  56 => 12,  53 => 11,  51 => 10,  48 => 9,  46 => 8,  43 => 7,  41 => 6,  38 => 5,  35 => 4,  32 => 3,  29 => 2,  11 => 1,);
    }
}
/* {% extends 'admin/base.html.twig' %}*/
/* {% block info %}*/
/*     {% if info is defined %}*/
/*         {% if info == 'article-show'%}*/
/*             <div class="alert alert-success text-center" role="alert">Artykuł został opublikowany</div>*/
/*         {% elseif info == 'article-show-fail'%}*/
/*             <div class="alert alert-danger text-center" role="alert">Artykuł nie został opublikowany</div>*/
/*         {% elseif info == 'article-hide'%}*/
/*             <div class="alert alert-success text-center" role="alert">Artykuł został ukryty</div>*/
/*         {% elseif info == 'article-hide-fail'%}*/
/*             <div class="alert alert-danger text-center" role="alert">Artykuł nie został ukryty</div>*/
/*         {% elseif info == 'article-delete'%}*/
/*             <div class="alert alert-success text-center" role="alert">Artykuł został usunięty</div>*/
/*         {% elseif info == 'article-delete-fail'%}*/
/*             <div class="alert alert-danger text-center" role="alert">Artykuł nie został usunięty</div>*/
/*         {% elseif info == 'article-add'%}*/
/*             <div class="alert alert-success text-center" role="alert">Artykuł został dodany</div>*/
/*         {% endif %}*/
/*     {% endif %}*/
/* {% endblock %}*/
/* */
/*         {% block body %}*/
/*         <div class="row">*/
/*             <div class="pull-right">*/
/*                 <a href="index.php?site=admin&action=articles&act=add" class="btn btn-success">Dodaj</a>*/
/*             </div>*/
/*         </div>*/
/*         <div class="table-responsive">*/
/*             <table class="table table-hover">*/
/*                   <thead>*/
/*                     <tr>*/
/*                         <td>*/
/*                             <strong>Lp.</strong>*/
/*                         </td>*/
/*                         <td>*/
/*                             <strong>Nazwa</strong>*/
/*                         </td>*/
/*                         <td>*/
/*                             <strong>Opublikowane</strong>*/
/*                         </td>*/
/*                         <td>*/
/*                             <strong>Kategoria</strong>*/
/*                         </td>*/
/*                         <td>*/
/*                             <strong>Data utworzenia</strong>*/
/*                         </td>*/
/*                         <td>*/
/*                             <strong>Usuń</strong>*/
/*                         </td>*/
/*                     </tr>*/
/*                   <thead>*/
/*                   {% set lp = 1 %}*/
/*             {% for article in pagin.articles%}*/
/*                     <tr>*/
/*                         <td>*/
/*                             {{ lp }}*/
/*                         </td>*/
/*                         <td>*/
/*                             <a href="index.php?site=admin&action=articles&act=edit&id={{ article.articleId|e }}">{{ article.articleName|e }}</a>*/
/*                         </td>*/
/*                         <td>*/
/*                             {% if article.articlePublished == 0%}*/
/*                                 <a href="index.php?site=admin&action=articles&act=show&id={{ article.articleId|e }}">{{ article.articlePublished|e }}*/
/*                             {% else %}*/
/*                                 <a href="index.php?site=admin&action=articles&act=hide&id={{ article.articleId|e }}">{{ article.articlePublished|e }}*/
/*                             {% endif %}*/
/*                         </td>*/
/*                         <td>*/
/*                             {{ article.articleCategory|e }}*/
/*                         </td>*/
/*                         <td>*/
/*                             {{ article.articleDate|e }}*/
/*                         </td>*/
/*                         <td>*/
/*                             <a href="index.php?site=admin&action=articles&act=delete&id={{ article.articleId|e }}" class="btn btn-danger">Usuń</a>*/
/*                         </td>*/
/*                     </tr>*/
/*                 {% set lp = lp+1 %}*/
/*             {% endfor %}*/
/*             </table>*/
/*             <nav aria-label="...">*/
/*               <ul class="pagination">*/
/*                  {% if activePage < 2%}*/
/*                         <li class="disabled">*/
/*                           <span>*/
/*                             <span aria-hidden="true">&laquo;</span>*/
/*                           </span>*/
/*                         </li>*/
/*                     {% else %}*/
/*                         <li>*/
/*                             <a href="index.php?site=admin&action=articles&page={{ activePage-1 }}"><span aria-hidden="true">&laquo;</span></a>*/
/*                         </li>*/
/*                 {% endif %}*/
/*                 {% for a in 1..pagin.pages  %}*/
/*                     {% if activePage == a%}*/
/*                         <li class="active">*/
/*                           <span>{{ a }} <span class="sr-only">(current)</span></span>*/
/*                         </li>*/
/*                     {% else %}*/
/*                         <li>*/
/*                           <a href="index.php?site=admin&action=articles&page={{ a }}"><span>{{ a }}</span></a>*/
/*                         </li>*/
/*                     {% endif %}*/
/*                 {% endfor %}*/
/*                 */
/*                 {% if activePage == pagin.pages %}*/
/*                         <li class="disabled">*/
/*                           <span>*/
/*                             <span aria-hidden="true">&raquo;</span>*/
/*                           </span>*/
/*                         </li>*/
/*                 {% else %}*/
/*                         <li>*/
/*                             <a href="index.php?site=admin&action=articles&page={{ activePage+1 }}"><span aria-hidden="true">&raquo;</span></a>*/
/*                         </li>*/
/*                 {% endif %}*/
/*               </ul>*/
/*             </nav>*/
/*             */
/*             */
/*         </div>*/
/*         {% endblock %}*/
/*   */
