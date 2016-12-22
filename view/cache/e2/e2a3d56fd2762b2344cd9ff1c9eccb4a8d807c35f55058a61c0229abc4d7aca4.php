<?php

/* admin/shop.html.twig */
class __TwigTemplate_d97e8232213e5759a81722c8403f2ad5a517865112407c6f6915e7feb6ff41b4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin/base.html.twig", "admin/shop.html.twig", 1);
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
        echo "    <h1>Sklep</h1>
    <div class=\"row\">
        <div class=\"pull-right\">
        <form action=\"index.php?site=admin&action=shop\" method=\"GET\" class=\"form-inline\">
            <input type=\"hidden\" value=\"admin\" name=\"site\" />
            <input type=\"hidden\" value=\"shop\" name=\"action\" />
            <input type=\"text\" class=\"form-control\" name=\"searchInput\" ";
        // line 24
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
        // line 33
        $this->loadTemplate("admin/shop-menu.html.twig", "admin/shop.html.twig", 33)->display($context);
        // line 34
        echo "        </div>
        <div class=\"col-md-10 bg-white table-responsive\">
            <table class=\"table table-hover\">
            <tr>
                <td><strong><span class=\"font11\">Lp.</span></strong></td>
                <td><strong><span class=\"font11\">Id zam.</span></strong></td>
                <td><strong><span class=\"font11\">Data zam.</span></strong></td>
                <td><strong><span class=\"font11\">Nazwa - Firma</span></strong></td>
                <td><strong><span class=\"font11\">NIP</span></strong></td>
                <td><strong><span class=\"font11\">Konsultant</span></strong></td>
                <td><strong><span class=\"font11\">Kwota Netto/Brutto</span></strong></td>
                <td><strong><span class=\"font11\">Status</span></strong></td>
                <td><strong><span class=\"font11\">Drukuj</span></strong></td>
            </tr>
            ";
        // line 48
        $context["a"] = 1;
        // line 49
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["pagin"]) ? $context["pagin"] : null), "orders", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
            // line 50
            echo "                <tr>
                    <td>";
            // line 51
            echo twig_escape_filter($this->env, (isset($context["a"]) ? $context["a"] : null), "html", null, true);
            echo "</td>
                    <td><a href=\"index.php?site=admin&action=shop&act=orderDetail&orderId=";
            // line 52
            echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "order_id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "order_id", array()), "html", null, true);
            echo "</a></td>
                    <td style=\"width:110px\"><span class=\"font11\">";
            // line 53
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["order"], "cdate", array()), "d-m-Y H:i:s", false), "html", null, true);
            echo "</span></td>
                    <td><span class=\"font12\"><a href=\"index.php?site=admin&action=shop&act=users&show=userDetail&userId=";
            // line 54
            echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "user_id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "name", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_replace_filter(twig_slice($this->env, $this->getAttribute($context["order"], "company", array()), 0, 100), array("&quot;" => "\"")), "html", null, true);
            echo " </a></span><br/>
                    <span class=\"font9\">";
            // line 55
            echo twig_escape_filter($this->env, twig_replace_filter($this->getAttribute($context["order"], "companySend", array()), array("&quot;" => "\"")), "html", null, true);
            echo "</span>
                    </td>
                    <td>";
            // line 57
            echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "extra_field_1", array()), "html", null, true);
            echo "</td>
                    <td><span class=\"font11\">";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "konsultantFirstName", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "konsultantLastName", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "extra_field_2", array()), "html", null, true);
            echo "</span></td>
                    <td style=\"width:110px\">";
            // line 59
            echo twig_escape_filter($this->env, twig_round($this->getAttribute($context["order"], "order_subtotal", array()), 2, "common"), "html", null, true);
            echo "zł / ";
            echo twig_escape_filter($this->env, twig_round($this->getAttribute($context["order"], "order_total", array()), 2, "common"), "html", null, true);
            echo "zł</td>
                    <td style=\"width:180px\">
                    <form method=\"POST\" class=\"form-inline\" action=\"index.php?site=admin&action=shop&perf=updateOrderStatus&orderId=";
            // line 61
            echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "order_id", array()), "html", null, true);
            echo "\">
                        <select style=\"width:100px;\" class=\"form-control\" name=\"inputStatus\">
                        ";
            // line 63
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["orderStatuses"]) ? $context["orderStatuses"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["orderStatus"]) {
                // line 64
                echo "                            ";
                if (($this->getAttribute($context["order"], "order_status_name", array()) == $this->getAttribute($context["orderStatus"], "order_status_name", array()))) {
                    // line 65
                    echo "                                <option selected value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["orderStatus"], "order_status_code", array()), "html", null, true);
                    echo "\" >";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["orderStatus"], "order_status_name", array()), "html", null, true);
                    echo "</option>
                            ";
                } else {
                    // line 67
                    echo "                                <option value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["orderStatus"], "order_status_code", array()), "html", null, true);
                    echo "\" >";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["orderStatus"], "order_status_name", array()), "html", null, true);
                    echo "</option>
                            ";
                }
                // line 69
                echo "                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['orderStatus'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 70
            echo "                        </select>
                        <input style=\"width:50px;padding:2px\" type=\"submit\" class=\"btn btn-default\" value=\"Zapisz\"/>
                    </form>
                    </td>
                    <td>
                        <a target=\"_blank\" href=\"index.php?site=admin&action=shop&act=orderPdf&orderId=";
            // line 75
            echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "order_id", array()), "html", null, true);
            echo "\"><img src=\"web/images/print.png\"/></a>
                    </td>
                </tr>
                ";
            // line 78
            $context["a"] = ((isset($context["a"]) ? $context["a"] : null) + 1);
            // line 79
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 80
        echo "            </table>
        </div>
    </div>
    <nav aria-label=\"...\">
        <ul class=\"pagination\">
            ";
        // line 85
        if (((isset($context["activePage"]) ? $context["activePage"] : null) < 2)) {
            // line 86
            echo "                <li class=\"disabled\">
                    <span>
                        <span aria-hidden=\"true\">&laquo;</span>
                    </span>
                </li>
            ";
        } else {
            // line 92
            echo "                <li>
                    <a href=\"index.php?site=admin&action=shop&page=";
            // line 93
            echo twig_escape_filter($this->env, ((isset($context["activePage"]) ? $context["activePage"] : null) - 1), "html", null, true);
            if (array_key_exists("searchInput", $context)) {
                echo "&searchInput=";
                echo twig_escape_filter($this->env, (isset($context["searchInput"]) ? $context["searchInput"] : null), "html", null, true);
            }
            echo "\"><span aria-hidden=\"true\">&laquo;</span></a>
                </li>
            ";
        }
        // line 96
        echo "            ";
        $context["a"] = 1;
        // line 97
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(1, $this->getAttribute((isset($context["pagin"]) ? $context["pagin"] : null), "pages", array())));
        foreach ($context['_seq'] as $context["_key"] => $context["a"]) {
            // line 98
            echo "                ";
            if (((isset($context["activePage"]) ? $context["activePage"] : null) == $context["a"])) {
                // line 99
                echo "                    <li class=\"active\">
                        <span>";
                // line 100
                echo twig_escape_filter($this->env, $context["a"], "html", null, true);
                echo " <span class=\"sr-only\">(current)</span></span>
                    </li>
                ";
            } else {
                // line 103
                echo "                    <li>
                        <a href=\"index.php?site=admin&action=shop&page=";
                // line 104
                echo twig_escape_filter($this->env, $context["a"], "html", null, true);
                if (array_key_exists("searchInput", $context)) {
                    echo "&searchInput=";
                    echo twig_escape_filter($this->env, (isset($context["searchInput"]) ? $context["searchInput"] : null), "html", null, true);
                }
                echo "\"><span>";
                echo twig_escape_filter($this->env, $context["a"], "html", null, true);
                echo "</span></a>
                    </li>
                ";
            }
            // line 107
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['a'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 108
        echo "                
            ";
        // line 109
        if (((isset($context["activePage"]) ? $context["activePage"] : null) == $this->getAttribute((isset($context["pagin"]) ? $context["pagin"] : null), "pages", array()))) {
            // line 110
            echo "                <li class=\"disabled\">
                    <span>
                        <span aria-hidden=\"true\">&raquo;</span>
                        </span>
                    </li>
            ";
        } else {
            // line 116
            echo "                <li>
                    <a href=\"index.php?site=admin&action=shop&page=";
            // line 117
            echo twig_escape_filter($this->env, ((isset($context["activePage"]) ? $context["activePage"] : null) + 1), "html", null, true);
            if (array_key_exists("searchInput", $context)) {
                echo "&searchInput=";
                echo twig_escape_filter($this->env, (isset($context["searchInput"]) ? $context["searchInput"] : null), "html", null, true);
            }
            echo "\"><span aria-hidden=\"true\">&raquo;</span></a>
                </li>
            ";
        }
        // line 120
        echo "        </ul>
    </nav>
";
    }

    public function getTemplateName()
    {
        return "admin/shop.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  315 => 120,  305 => 117,  302 => 116,  294 => 110,  292 => 109,  289 => 108,  283 => 107,  271 => 104,  268 => 103,  262 => 100,  259 => 99,  256 => 98,  251 => 97,  248 => 96,  238 => 93,  235 => 92,  227 => 86,  225 => 85,  218 => 80,  212 => 79,  210 => 78,  204 => 75,  197 => 70,  191 => 69,  183 => 67,  175 => 65,  172 => 64,  168 => 63,  163 => 61,  156 => 59,  148 => 58,  144 => 57,  139 => 55,  131 => 54,  127 => 53,  121 => 52,  117 => 51,  114 => 50,  109 => 49,  107 => 48,  91 => 34,  89 => 33,  73 => 24,  65 => 18,  62 => 17,  57 => 14,  53 => 12,  51 => 11,  48 => 10,  46 => 9,  43 => 8,  41 => 7,  38 => 6,  35 => 5,  32 => 4,  29 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "admin/shop.html.twig", "/view/admin/shop.html.twig");
    }
}
