<?php

/* admin/shop-users.html.twig */
class __TwigTemplate_9a7d0d67a8089be5583d025ac2739e4fd819bc3a84f3233d4f7a5a2866299d61 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin/base.html.twig", "admin/shop-users.html.twig", 1);
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
            if (((isset($context["info"]) ? $context["info"] : null) == "deleteOrder-success")) {
                // line 6
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Zamówienie zostało usunięte</div>
        ";
            } elseif ((            // line 7
(isset($context["info"]) ? $context["info"] : null) == "deleteOrder-fail")) {
                // line 8
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">Zamówienie nie zostało usunięte</div>
        ";
            } elseif ((            // line 9
(isset($context["info"]) ? $context["info"] : null) == "updateOrderStatus-success")) {
                // line 10
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Status zamówienia został zmieniony</div>
        ";
            } elseif ((            // line 11
(isset($context["info"]) ? $context["info"] : null) == "updateOrderStatus-fail")) {
                // line 12
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">Status zamówienia nie został zmieniony</div>
        ";
            }
            // line 14
            echo "    ";
        }
    }

    // line 17
    public function block_body($context, array $blocks = array())
    {
        // line 18
        $context["url"] = "index.php?site=admin&action=shop&act=users";
        // line 19
        if ( !twig_test_empty((isset($context["searchInput"]) ? $context["searchInput"] : null))) {
            $context["url"] = (((isset($context["url"]) ? $context["url"] : null) . "&searchInput=") . (isset($context["searchInput"]) ? $context["searchInput"] : null));
        }
        // line 20
        echo "
    <div class=\"row\">
        <div class=\"pull-right\">
        <form action=\"";
        // line 23
        echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
        echo "\" method=\"GET\" class=\"form-inline\">
            <input type=\"hidden\" value=\"admin\" name=\"site\" />
            <input type=\"hidden\" value=\"shop\" name=\"action\" />
            <input type=\"hidden\" value=\"users\" name=\"act\" />
            <input type=\"text\" class=\"form-control\" name=\"searchInput\" ";
        // line 27
        if ( !twig_test_empty((isset($context["searchInput"]) ? $context["searchInput"] : null))) {
            echo "value=\"";
            echo twig_escape_filter($this->env, (isset($context["searchInput"]) ? $context["searchInput"] : null), "html", null, true);
            echo "\"";
        }
        echo " placeholder=\"Wyszukaj użytkownika ...\"/>
            <input type=\"submit\" value=\"Szukaj\" class=\"btn btn-success\" />
        </form>
        </div>
        <br/><br/>
    </div>
    
    <div class=\"row\">
        <div class=\"col-md-2\">
            ";
        // line 36
        $this->loadTemplate("admin/shop-menu.html.twig", "admin/shop-users.html.twig", 36)->display($context);
        // line 37
        echo "        </div>
        <div class=\"col-md-10 bg-white\">
            <table class=\"table table-bordered\">
            <tr>
                <td><strong>Lp.</strong></td>
                <td><strong>Id. użytkownika.</strong></td>
                <td><strong>Nazwa użytkownika</strong></td>
                <td><strong>Nazwa firmy</strong></td>
                <td><strong>NIP</strong></td>
                <td><strong>Konsultant</strong></td>
                <td><strong>Usuń</strong></td>
            </tr>
            ";
        // line 49
        if (((isset($context["activePage"]) ? $context["activePage"] : null) == 1)) {
            // line 50
            echo "                ";
            $context["a"] = 1;
            // line 51
            echo "            ";
        } else {
            // line 52
            echo "                ";
            $context["a"] = (1 + ((isset($context["activePage"]) ? $context["activePage"] : null) * $this->getAttribute((isset($context["pagin"]) ? $context["pagin"] : null), "limit", array())));
            // line 53
            echo "            ";
        }
        // line 54
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["pagin"]) ? $context["pagin"] : null), "users", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 55
            echo "                <tr>
                    <td>";
            // line 56
            echo twig_escape_filter($this->env, (isset($context["a"]) ? $context["a"] : null), "html", null, true);
            echo "</td>
                    <td><a href=\"index.php?site=admin&action=shop&act=users&show=userDetail&userId=";
            // line 57
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "user_id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "user_id", array()), "html", null, true);
            echo "</a></td>
                    <td><span class=\"font11\"><a href=\"index.php?site=admin&action=shop&act=users&show=userDetail&userId=";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "user_id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "username", array()), "html", null, true);
            echo "</span></td>
                    <td><span class=\"font11\">";
            // line 59
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "company", array()), "html", null, true);
            echo "</td>
                    <td><span class=\"font11\">";
            // line 60
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "extra_field_1", array()), "html", null, true);
            echo "</td>
                    <td><span class=\"font11\">";
            // line 61
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "extra_field_2", array()), "html", null, true);
            echo "</td>
                    <td><a href=\"index.php?site=admin&action=shop&act=users&perf=deleteUser&userId=";
            // line 62
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "user_id", array()), "html", null, true);
            echo "\" class=\"btn btn-danger\">Usuń</a></td>
                </tr>
                ";
            // line 64
            $context["a"] = ((isset($context["a"]) ? $context["a"] : null) + 1);
            // line 65
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 66
        echo "
            </table>
        </div>
    </div>
    
    <nav aria-label=\"...\">
        <ul class=\"pagination\">
            ";
        // line 73
        if (((isset($context["activePage"]) ? $context["activePage"] : null) < 2)) {
            // line 74
            echo "                <li class=\"disabled\">
                    <span>
                        <span aria-hidden=\"true\">&laquo;</span>
                    </span>
                </li>
            ";
        } else {
            // line 80
            echo "                <li>
                    <a href=\"";
            // line 81
            echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
            echo "&page=";
            echo twig_escape_filter($this->env, ((isset($context["activePage"]) ? $context["activePage"] : null) - 1), "html", null, true);
            echo "\"><span aria-hidden=\"true\">&laquo;</span></a>
                </li>
            ";
        }
        // line 84
        echo "            ";
        $context["a"] = 1;
        // line 85
        echo "            
            ";
        // line 86
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(1, ($this->getAttribute((isset($context["pagin"]) ? $context["pagin"] : null), "pages", array()) + 1)));
        foreach ($context['_seq'] as $context["_key"] => $context["a"]) {
            // line 87
            echo "                ";
            if (((isset($context["activePage"]) ? $context["activePage"] : null) == $context["a"])) {
                // line 88
                echo "                    <li class=\"active\">
                        <span>";
                // line 89
                echo twig_escape_filter($this->env, $context["a"], "html", null, true);
                echo " <span class=\"sr-only\">(current)</span></span>
                    </li>
                ";
            } else {
                // line 92
                echo "                    <li>
                        <a href=\"";
                // line 93
                echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
                echo "&page=";
                echo twig_escape_filter($this->env, $context["a"], "html", null, true);
                echo "\"><span>";
                echo twig_escape_filter($this->env, $context["a"], "html", null, true);
                echo "</span></a>
                    </li>
                ";
            }
            // line 96
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['a'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 97
        echo "                
            ";
        // line 98
        if (((isset($context["activePage"]) ? $context["activePage"] : null) == $this->getAttribute((isset($context["pagin"]) ? $context["pagin"] : null), "pages", array()))) {
            // line 99
            echo "                <li class=\"disabled\">
                    <span>
                        <span aria-hidden=\"true\">&raquo;</span>
                        </span>
                    </li>
            ";
        } else {
            // line 105
            echo "                <li>
                    <a href=\"";
            // line 106
            echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
            echo "&page=";
            echo twig_escape_filter($this->env, ((isset($context["activePage"]) ? $context["activePage"] : null) + 1), "html", null, true);
            echo "\"><span aria-hidden=\"true\">&raquo;</span></a>
                </li>
            ";
        }
        // line 109
        echo "        </ul>
    </nav>
";
    }

    public function getTemplateName()
    {
        return "admin/shop-users.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  273 => 109,  265 => 106,  262 => 105,  254 => 99,  252 => 98,  249 => 97,  243 => 96,  233 => 93,  230 => 92,  224 => 89,  221 => 88,  218 => 87,  214 => 86,  211 => 85,  208 => 84,  200 => 81,  197 => 80,  189 => 74,  187 => 73,  178 => 66,  172 => 65,  170 => 64,  165 => 62,  161 => 61,  157 => 60,  153 => 59,  147 => 58,  141 => 57,  137 => 56,  134 => 55,  129 => 54,  126 => 53,  123 => 52,  120 => 51,  117 => 50,  115 => 49,  101 => 37,  99 => 36,  83 => 27,  76 => 23,  71 => 20,  67 => 19,  65 => 18,  62 => 17,  57 => 14,  53 => 12,  51 => 11,  48 => 10,  46 => 9,  43 => 8,  41 => 7,  38 => 6,  35 => 5,  32 => 4,  29 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "admin/shop-users.html.twig", "/view/admin/shop-users.html.twig");
    }
}
