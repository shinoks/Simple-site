<?php

/* admin/menu.html.twig */
class __TwigTemplate_86dd30fac8866f51c7f06f102c8fd72433438799dd268c7e3b000bfc116acfcf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin/base.html.twig", "admin/menu.html.twig", 1);
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
            if (((isset($context["info"]) ? $context["info"] : null) == "deleteUserMenu-success")) {
                // line 6
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Menu zostało usunięte</div>
        ";
            } elseif ((            // line 7
(isset($context["info"]) ? $context["info"] : null) == "deleteUserMenu-fail")) {
                // line 8
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">Menu nie zostało usunięte</div>
        ";
            }
            // line 10
            echo "    ";
        }
    }

    // line 13
    public function block_body($context, array $blocks = array())
    {
        // line 14
        echo "    <div class=\"row\">
        <div class=\"pull-right\"><a class=\"btn btn-success\" href=\"index.php?site=admin&action=menu&act=add\">Dodaj</a></div>
        <br/>
    </div>
    <table class=\"table table-bordered\">
        <thead>
            <tr>
                <td class=\"buton\"><b>Lp.</b></td>
                <td><b>Nazwa</b></td>
                <td class=\"buton\"><b>Id pozycji.</b></td>
                <td class=\"buton\"><b>Edytuj</b></td>
                <td class=\"buton\"><b>Usuń</b></td>
            </tr>
        </thead>
        ";
        // line 28
        $context["a"] = 1;
        // line 29
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["userMenu"]) ? $context["userMenu"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["menuItem"]) {
            // line 30
            echo "                <tr>
                   ";
            // line 31
            if (($this->getAttribute($context["menuItem"], "parent", array()) == 1)) {
                // line 32
                echo "                    <td class=\"buton\">";
                echo twig_escape_filter($this->env, (isset($context["a"]) ? $context["a"] : null), "html", null, true);
                echo "</td>
                    <td><a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">";
                // line 33
                echo twig_escape_filter($this->env, $this->getAttribute($context["menuItem"], "menuName", array()));
                echo " <span class=\"caret\"></span></a></td>
                    <td class=\"buton\">";
                // line 34
                echo twig_escape_filter($this->env, $this->getAttribute($context["menuItem"], "menuId", array()), "html", null, true);
                echo "</td>
                    <td class=\"buton\"><a class=\"btn btn-success\" href=\"index.php?site=admin&action=menu&act=edit&id=";
                // line 35
                echo twig_escape_filter($this->env, $this->getAttribute($context["menuItem"], "menuId", array()), "html", null, true);
                echo "\">Edytuj</a></td>
                    <td class=\"buton\"><a class=\"btn btn-danger\" href=\"index.php?site=admin&action=menu&act=delete&id=";
                // line 36
                echo twig_escape_filter($this->env, $this->getAttribute($context["menuItem"], "menuId", array()), "html", null, true);
                echo "\">Usuń</a></td>
                        ";
                // line 37
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["userMenuChild"]) ? $context["userMenuChild"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["childItems"]) {
                    // line 38
                    echo "                            ";
                    if (($this->getAttribute($context["childItems"], "parentId", array()) == $this->getAttribute($context["menuItem"], "menuId", array()))) {
                        // line 39
                        echo "                                </tr><tr>
                                <td class=\"buton\">---</td>
                                <td class=\"childItem\"><a href=\"";
                        // line 41
                        echo twig_escape_filter($this->env, $this->getAttribute($context["childItems"], "menuHref", array()));
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["childItems"], "menuName", array()));
                        echo "</a></td>
                            <td class=\"buton\">";
                        // line 42
                        echo twig_escape_filter($this->env, $this->getAttribute($context["childItems"], "menuId", array()), "html", null, true);
                        echo "</td>
                                <td class=\"buton\"><a class=\"btn btn-success\" href=\"index.php?site=admin&action=menu&act=edit&id=";
                        // line 43
                        echo twig_escape_filter($this->env, $this->getAttribute($context["menuItem"], "menuId", array()), "html", null, true);
                        echo "\">Edytuj</a></td>
                                <td class=\"buton\"><a class=\"btn btn-danger\" href=\"index.php?site=admin&action=menu&act=delete&id=";
                        // line 44
                        echo twig_escape_filter($this->env, $this->getAttribute($context["menuItem"], "menuId", array()), "html", null, true);
                        echo "\">Usuń</a></td>
                            ";
                    }
                    // line 46
                    echo "                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['childItems'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 47
                echo "                        ";
                $context["a"] = ((isset($context["a"]) ? $context["a"] : null) + 1);
                // line 48
                echo "                    ";
            } elseif (($this->getAttribute($context["menuItem"], "parentId", array()) == 0)) {
                // line 49
                echo "                        <td class=\"buton\">";
                echo twig_escape_filter($this->env, (isset($context["a"]) ? $context["a"] : null), "html", null, true);
                echo "</td>
                        <td><a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">";
                // line 50
                echo twig_escape_filter($this->env, $this->getAttribute($context["menuItem"], "menuName", array()));
                echo " </a></td>
                        <td class=\"buton\">";
                // line 51
                echo twig_escape_filter($this->env, $this->getAttribute($context["menuItem"], "menuId", array()), "html", null, true);
                echo "</td>
                        <td class=\"buton\"><a  class=\"btn btn-success\" href=\"index.php?site=admin&action=menu&act=edit&id=";
                // line 52
                echo twig_escape_filter($this->env, $this->getAttribute($context["menuItem"], "menuId", array()), "html", null, true);
                echo "\">Edytuj</a></td>
                        <td class=\"buton\"><a class=\"btn btn-danger\" href=\"index.php?site=admin&action=menu&act=delete&id=";
                // line 53
                echo twig_escape_filter($this->env, $this->getAttribute($context["menuItem"], "menuId", array()), "html", null, true);
                echo "\">Usuń</a></td>
                        ";
                // line 54
                $context["a"] = ((isset($context["a"]) ? $context["a"] : null) + 1);
                // line 55
                echo "                   ";
            }
            // line 56
            echo "                   
               </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['menuItem'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 59
        echo "        
    </table>
";
    }

    public function getTemplateName()
    {
        return "admin/menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  180 => 59,  172 => 56,  169 => 55,  167 => 54,  163 => 53,  159 => 52,  155 => 51,  151 => 50,  146 => 49,  143 => 48,  140 => 47,  134 => 46,  129 => 44,  125 => 43,  121 => 42,  115 => 41,  111 => 39,  108 => 38,  104 => 37,  100 => 36,  96 => 35,  92 => 34,  88 => 33,  83 => 32,  81 => 31,  78 => 30,  73 => 29,  71 => 28,  55 => 14,  52 => 13,  47 => 10,  43 => 8,  41 => 7,  38 => 6,  35 => 5,  32 => 4,  29 => 3,  11 => 1,);
    }
}
/* {% extends 'admin/base.html.twig' %}*/
/* */
/* {% block info %}*/
/*     {% if info is defined %}*/
/*         {% if info == 'deleteUserMenu-success'%}*/
/*             <div class="alert alert-success text-center" role="alert">Menu zostało usunięte</div>*/
/*         {% elseif info == 'deleteUserMenu-fail'%}*/
/*             <div class="alert alert-danger text-center" role="alert">Menu nie zostało usunięte</div>*/
/*         {% endif %}*/
/*     {% endif %}*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     <div class="row">*/
/*         <div class="pull-right"><a class="btn btn-success" href="index.php?site=admin&action=menu&act=add">Dodaj</a></div>*/
/*         <br/>*/
/*     </div>*/
/*     <table class="table table-bordered">*/
/*         <thead>*/
/*             <tr>*/
/*                 <td class="buton"><b>Lp.</b></td>*/
/*                 <td><b>Nazwa</b></td>*/
/*                 <td class="buton"><b>Id pozycji.</b></td>*/
/*                 <td class="buton"><b>Edytuj</b></td>*/
/*                 <td class="buton"><b>Usuń</b></td>*/
/*             </tr>*/
/*         </thead>*/
/*         {% set a = 1 %}*/
/*             {% for menuItem in userMenu %}*/
/*                 <tr>*/
/*                    {% if menuItem.parent == 1 %}*/
/*                     <td class="buton">{{ a }}</td>*/
/*                     <td><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ menuItem.menuName|e }} <span class="caret"></span></a></td>*/
/*                     <td class="buton">{{ menuItem.menuId }}</td>*/
/*                     <td class="buton"><a class="btn btn-success" href="index.php?site=admin&action=menu&act=edit&id={{menuItem.menuId}}">Edytuj</a></td>*/
/*                     <td class="buton"><a class="btn btn-danger" href="index.php?site=admin&action=menu&act=delete&id={{menuItem.menuId}}">Usuń</a></td>*/
/*                         {% for childItems in userMenuChild %}*/
/*                             {% if childItems.parentId == menuItem.menuId %}*/
/*                                 </tr><tr>*/
/*                                 <td class="buton">---</td>*/
/*                                 <td class="childItem"><a href="{{ childItems.menuHref|e }}">{{ childItems.menuName|e }}</a></td>*/
/*                             <td class="buton">{{ childItems.menuId }}</td>*/
/*                                 <td class="buton"><a class="btn btn-success" href="index.php?site=admin&action=menu&act=edit&id={{menuItem.menuId}}">Edytuj</a></td>*/
/*                                 <td class="buton"><a class="btn btn-danger" href="index.php?site=admin&action=menu&act=delete&id={{menuItem.menuId}}">Usuń</a></td>*/
/*                             {% endif %}*/
/*                         {% endfor %}*/
/*                         {% set a=a+1 %}*/
/*                     {% elseif menuItem.parentId == 0 %}*/
/*                         <td class="buton">{{ a }}</td>*/
/*                         <td><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ menuItem.menuName|e }} </a></td>*/
/*                         <td class="buton">{{ menuItem.menuId }}</td>*/
/*                         <td class="buton"><a  class="btn btn-success" href="index.php?site=admin&action=menu&act=edit&id={{menuItem.menuId}}">Edytuj</a></td>*/
/*                         <td class="buton"><a class="btn btn-danger" href="index.php?site=admin&action=menu&act=delete&id={{menuItem.menuId}}">Usuń</a></td>*/
/*                         {% set a=a+1 %}*/
/*                    {% endif %}*/
/*                    */
/*                </tr>*/
/*             {% endfor %}*/
/*         */
/*     </table>*/
/* {% endblock %}*/
