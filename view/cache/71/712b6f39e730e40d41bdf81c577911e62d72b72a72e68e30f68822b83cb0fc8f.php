<?php

/* myAccount.html.twig */
class __TwigTemplate_925bf454b0e12bf57c70af8f1dd67aafc8d251c2d52e13b1ee15202c48d096d2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "myAccount.html.twig", 1);
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
        $context["url"] = "index.php?site=shop";
        // line 5
        echo "    <div class=\"container width-full\">
        <div class=\"well\">
            <div class=\"row\">
                <div class=\"row\">
                    <div class=\"col-md-3 bg-info\">
                    </div>
                    <div class=\"col-md-9\">
                        <div class=\"well table-responsive\">
                            <h3>Wykaz zamówień z tego miesiąca:</h3>
                            <div class=\"row\">
                                <div class=\"col-md-6\">
                                    <span><strong>Suma netto zamówień zapłaconych - koszty administracyjne:</strong><br/> </span><h3> ";
        // line 16
        echo twig_escape_filter($this->env, (twig_round($this->getAttribute((isset($context["ordersInfo"]) ? $context["ordersInfo"] : null), "ordersReceivedSumThisMonth", array()), 2, "common") - twig_round($this->getAttribute((isset($context["ordersInfo"]) ? $context["ordersInfo"] : null), "ordersThisMonthSumAdministrationFee", array()), 2, "common")), "html", null, true);
        echo " zł</h3><br/><br/><br/>
                                </div>
                                <div class=\"col-md-6\">
                                    <span><strong>Premia naliczona:</strong><br/> <h3>";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ordersInfo"]) ? $context["ordersInfo"] : null), "premia", array()), "html", null, true);
        echo " zł</h3></span>
                                    <span><strong>do następnego progu brakuje Ci jedynie<br/><h5> ";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ordersInfo"]) ? $context["ordersInfo"] : null), "premiaBrak", array()), "html", null, true);
        echo " zł</h5></strong><br/> <strong class=\"text-danger\">Postaraj się! Dasz radę! :)</strong></span>
                                </div>
                            </div>
                            <span>Suma netto zamówień zapłaconych: </span> ";
        // line 23
        echo twig_escape_filter($this->env, twig_round($this->getAttribute((isset($context["ordersInfo"]) ? $context["ordersInfo"] : null), "ordersReceivedSumThisMonth", array()), 2, "common"), "html", null, true);
        echo "<br/>
                            <span>Suma netto zamówień: </span> ";
        // line 24
        echo twig_escape_filter($this->env, twig_round($this->getAttribute((isset($context["ordersInfo"]) ? $context["ordersInfo"] : null), "ordersThisMonthSumSubtotal", array()), 2, "common"), "html", null, true);
        echo "<br/><br/>
                            
                            <table class=\"table table-bordered\">
                                <thead>
                                    <tr>
                                        <td><strong>Lp.</strong></td>
                                        <td><strong>Nr zamówienia.</strong></td>
                                        <td><strong>Data zamówienia.</strong></td>
                                        <td><strong>Cena Netto</strong></td>
                                        <td><strong>Cena Brutto</strong></td>
                                        <td><strong>Koszty administracyjne</strong></td>
                                        <td><strong>Status zamówienia</strong></td>
                                    </tr>
                                </thead>
                                    ";
        // line 38
        $context["a"] = 1;
        // line 39
        echo "                                    
                                    ";
        // line 40
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["ordersInfo"]) ? $context["ordersInfo"] : null), "ordersThisMonth", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
            // line 41
            echo "                                        <tr class=\"font11 ";
            if (($this->getAttribute($context["order"], "order_status_code", array()) == "X")) {
                echo "danger";
            } elseif (($this->getAttribute($context["order"], "order_status_code", array()) == "!")) {
                echo "info";
            } elseif (($this->getAttribute($context["order"], "order_status_code", array()) == "Z")) {
                echo "success";
            } elseif (($this->getAttribute($context["order"], "order_status_code", array()) == "@")) {
                echo "warning";
            }
            echo "\">
                                            <td>
                                                ";
            // line 43
            echo twig_escape_filter($this->env, (isset($context["a"]) ? $context["a"] : null), "html", null, true);
            echo "
                                            </td>
                                            <td>
                                                ";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "order_id", array()), "html", null, true);
            echo "
                                            </td>
                                            <td>
                                                ";
            // line 49
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["order"], "cdate", array()), "d-m-Y H:i:s"), "html", null, true);
            echo "
                                            </td>
                                            <td>
                                                ";
            // line 52
            echo twig_escape_filter($this->env, twig_round($this->getAttribute($context["order"], "order_subtotal", array()), 2, "common"), "html", null, true);
            echo "
                                            </td>
                                            <td>
                                                ";
            // line 55
            echo twig_escape_filter($this->env, twig_round($this->getAttribute($context["order"], "order_total", array()), 2, "common"), "html", null, true);
            echo "
                                            </td>
                                            <td>
                                                ";
            // line 58
            echo twig_escape_filter($this->env, twig_round($this->getAttribute($context["order"], "administrationFee", array()), 2, "common"), "html", null, true);
            echo "
                                            </td>
                                            <td>
                                                ";
            // line 61
            echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "order_status_name", array()), "html", null, true);
            echo "
                                            </td>
                                        </tr>
                                        ";
            // line 64
            $context["a"] = ((isset($context["a"]) ? $context["a"] : null) + 1);
            // line 65
            echo "                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 66
        echo "                            </table>
                        </div>
                        <div class=\"well table-responsive\">
                            Wykaz zamówień z poprzedniego miesiąca:<br/>
                            <span>Suma brutto zamówień: </span> ";
        // line 70
        echo twig_escape_filter($this->env, twig_round($this->getAttribute((isset($context["ordersInfo"]) ? $context["ordersInfo"] : null), "ordersLastMonthSumTotal", array()), 2, "common"), "html", null, true);
        echo "<br/>
                            <span>Suma netto zamówień: </span> ";
        // line 71
        echo twig_escape_filter($this->env, twig_round($this->getAttribute((isset($context["ordersInfo"]) ? $context["ordersInfo"] : null), "ordersLastMonthSumSubtotal", array()), 2, "common"), "html", null, true);
        echo "<br/><br/>
                            <table class=\"table table-bordered\">
                                <thead>
                                    <tr>
                                        <td><strong>Lp.</strong></td>
                                        <td><strong>Nr zamówienia.</strong></td>
                                        <td><strong>Cena Netto</strong></td>
                                        <td><strong>Cena Brutto</strong></td>
                                        <td><strong>Koszty administracyjne</strong></td>
                                        <td><strong>Status zamówienia</strong></td>
                                    </tr>
                                </thead>
                                    ";
        // line 83
        $context["a"] = 1;
        // line 84
        echo "                                    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["ordersInfo"]) ? $context["ordersInfo"] : null), "ordersLastMonth", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
            // line 85
            echo "                                        <tr class=\"font11 ";
            if (($this->getAttribute($context["order"], "order_status_code", array()) == "X")) {
                echo "danger";
            } elseif (($this->getAttribute($context["order"], "order_status_code", array()) == "!")) {
                echo "success";
            } elseif (($this->getAttribute($context["order"], "order_status_code", array()) == "@")) {
                echo "warning";
            }
            echo "\">
                                            <td>
                                                ";
            // line 87
            echo twig_escape_filter($this->env, (isset($context["a"]) ? $context["a"] : null), "html", null, true);
            echo "
                                            </td>
                                            <td>
                                                ";
            // line 90
            echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "order_id", array()), "html", null, true);
            echo "
                                            </td>
                                            <td>
                                                ";
            // line 93
            echo twig_escape_filter($this->env, twig_round($this->getAttribute($context["order"], "order_subtotal", array()), 2, "common"), "html", null, true);
            echo "
                                            </td>
                                            <td>
                                                ";
            // line 96
            echo twig_escape_filter($this->env, twig_round($this->getAttribute($context["order"], "order_total", array()), 2, "common"), "html", null, true);
            echo "
                                            </td>
                                            <td>
                                                ";
            // line 99
            echo twig_escape_filter($this->env, twig_round($this->getAttribute($context["order"], "administrationFee", array()), 2, "common"), "html", null, true);
            echo "
                                            </td>
                                            <td>
                                                ";
            // line 102
            echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "order_status_name", array()), "html", null, true);
            echo "
                                            </td>
                                        </tr>
                                        ";
            // line 105
            $context["a"] = ((isset($context["a"]) ? $context["a"] : null) + 1);
            // line 106
            echo "                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 107
        echo "                            </table>
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
        return "myAccount.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  245 => 107,  239 => 106,  237 => 105,  231 => 102,  225 => 99,  219 => 96,  213 => 93,  207 => 90,  201 => 87,  189 => 85,  184 => 84,  182 => 83,  167 => 71,  163 => 70,  157 => 66,  151 => 65,  149 => 64,  143 => 61,  137 => 58,  131 => 55,  125 => 52,  119 => 49,  113 => 46,  107 => 43,  93 => 41,  89 => 40,  86 => 39,  84 => 38,  67 => 24,  63 => 23,  57 => 20,  53 => 19,  47 => 16,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
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
    {% set url = \"index.php?site=shop\" %}
    <div class=\"container width-full\">
        <div class=\"well\">
            <div class=\"row\">
                <div class=\"row\">
                    <div class=\"col-md-3 bg-info\">
                    </div>
                    <div class=\"col-md-9\">
                        <div class=\"well table-responsive\">
                            <h3>Wykaz zamówień z tego miesiąca:</h3>
                            <div class=\"row\">
                                <div class=\"col-md-6\">
                                    <span><strong>Suma netto zamówień zapłaconych - koszty administracyjne:</strong><br/> </span><h3> {{ordersInfo.ordersReceivedSumThisMonth|round(2,'common') - ordersInfo.ordersThisMonthSumAdministrationFee|round(2,'common')}} zł</h3><br/><br/><br/>
                                </div>
                                <div class=\"col-md-6\">
                                    <span><strong>Premia naliczona:</strong><br/> <h3>{{ordersInfo.premia}} zł</h3></span>
                                    <span><strong>do następnego progu brakuje Ci jedynie<br/><h5> {{ordersInfo.premiaBrak }} zł</h5></strong><br/> <strong class=\"text-danger\">Postaraj się! Dasz radę! :)</strong></span>
                                </div>
                            </div>
                            <span>Suma netto zamówień zapłaconych: </span> {{ordersInfo.ordersReceivedSumThisMonth|round(2,'common')}}<br/>
                            <span>Suma netto zamówień: </span> {{ordersInfo.ordersThisMonthSumSubtotal|round(2,'common')}}<br/><br/>
                            
                            <table class=\"table table-bordered\">
                                <thead>
                                    <tr>
                                        <td><strong>Lp.</strong></td>
                                        <td><strong>Nr zamówienia.</strong></td>
                                        <td><strong>Data zamówienia.</strong></td>
                                        <td><strong>Cena Netto</strong></td>
                                        <td><strong>Cena Brutto</strong></td>
                                        <td><strong>Koszty administracyjne</strong></td>
                                        <td><strong>Status zamówienia</strong></td>
                                    </tr>
                                </thead>
                                    {% set a = 1 %}
                                    
                                    {% for order in ordersInfo.ordersThisMonth %}
                                        <tr class=\"font11 {% if order.order_status_code == 'X'%}danger{% elseif order.order_status_code == '!'%}info{% elseif order.order_status_code == 'Z'%}success{% elseif order.order_status_code == '@'%}warning{%endif%}\">
                                            <td>
                                                {{a}}
                                            </td>
                                            <td>
                                                {{order.order_id}}
                                            </td>
                                            <td>
                                                {{order.cdate|date('d-m-Y H:i:s')}}
                                            </td>
                                            <td>
                                                {{order.order_subtotal|round(2,'common')}}
                                            </td>
                                            <td>
                                                {{order.order_total|round(2,'common')}}
                                            </td>
                                            <td>
                                                {{order.administrationFee|round(2,'common')}}
                                            </td>
                                            <td>
                                                {{order.order_status_name}}
                                            </td>
                                        </tr>
                                        {% set a = a +1 %}
                                    {% endfor %}
                            </table>
                        </div>
                        <div class=\"well table-responsive\">
                            Wykaz zamówień z poprzedniego miesiąca:<br/>
                            <span>Suma brutto zamówień: </span> {{ordersInfo.ordersLastMonthSumTotal|round(2,'common')}}<br/>
                            <span>Suma netto zamówień: </span> {{ordersInfo.ordersLastMonthSumSubtotal|round(2,'common')}}<br/><br/>
                            <table class=\"table table-bordered\">
                                <thead>
                                    <tr>
                                        <td><strong>Lp.</strong></td>
                                        <td><strong>Nr zamówienia.</strong></td>
                                        <td><strong>Cena Netto</strong></td>
                                        <td><strong>Cena Brutto</strong></td>
                                        <td><strong>Koszty administracyjne</strong></td>
                                        <td><strong>Status zamówienia</strong></td>
                                    </tr>
                                </thead>
                                    {% set a = 1 %}
                                    {% for order in ordersInfo.ordersLastMonth %}
                                        <tr class=\"font11 {% if order.order_status_code == 'X'%}danger{% elseif order.order_status_code == '!'%}success{% elseif order.order_status_code == '@'%}warning{%endif%}\">
                                            <td>
                                                {{a}}
                                            </td>
                                            <td>
                                                {{order.order_id}}
                                            </td>
                                            <td>
                                                {{order.order_subtotal|round(2,'common')}}
                                            </td>
                                            <td>
                                                {{order.order_total|round(2,'common')}}
                                            </td>
                                            <td>
                                                {{order.administrationFee|round(2,'common')}}
                                            </td>
                                            <td>
                                                {{order.order_status_name}}
                                            </td>
                                        </tr>
                                        {% set a = a +1 %}
                                    {% endfor %}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{% endblock%}
", "myAccount.html.twig", "/view/myAccount.html.twig");
    }
}
