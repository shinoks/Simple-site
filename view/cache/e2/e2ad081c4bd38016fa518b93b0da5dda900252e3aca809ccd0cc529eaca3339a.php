<?php

/* shop-orders.html.twig */
class __TwigTemplate_a8f0d09720333f83bd07881b2fb3521e8f290003d8c304e41a5815991b16dabc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "shop-orders.html.twig", 1);
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
        $context["url"] = "index.php?site=shop&view=account";
        // line 5
        echo "    <div class=\"container width-full\">
        <div class=\"well\">
            <div class=\"row\">
                <div class=\"row\">
                    <div class=\"col-md-3 bg-info\"><br/>
                        ";
        // line 10
        $this->loadTemplate("shop-leftMenu.html.twig", "shop-orders.html.twig", 10)->display($context);
        // line 11
        echo "                    </div>
                    <div class=\"col-md-9\">
                        <div class=\"well\">
                            <div class=\"row\">
                                <div class=\"well\">
                                    <div class=\"table-responsive\">
                                            <strong>Zamówienia:</strong>
                                            <table class=\"table table-bordered\">
                                            <tr class=\"bg-success\">
                                                <td>Lp.</td>
                                                <td>Nr zamówienia</td>
                                                <td>Data zamówienia</td>
                                                <td>Data modyfikacji</td>
                                                <td>Suma</td>
                                            </tr>
                                            ";
        // line 26
        $context["a"] = 1;
        // line 27
        echo "                                            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["orders"]) ? $context["orders"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
            // line 28
            echo "                                                <tr>
                                                    <td>";
            // line 29
            echo twig_escape_filter($this->env, (isset($context["a"]) ? $context["a"] : null), "html", null, true);
            echo "</td>
                                                    <td><a href=\"index.php?site=shop&view=orderDetail&orderId=";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "order_id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "order_id", array()), "html", null, true);
            echo "</a></td>
                                                    <td>";
            // line 31
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["order"], "cdate", array()), "d-m-Y H:i:s", false), "html", null, true);
            echo "</a></td>
                                                    <td>";
            // line 32
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["order"], "mdate", array()), "d-m-Y H:i:s", false), "html", null, true);
            echo "</a></td>
                                                    <td>";
            // line 33
            echo twig_escape_filter($this->env, twig_round($this->getAttribute($context["order"], "order_subtotal", array()), 2, "common"), "html", null, true);
            echo "zł / ";
            echo twig_escape_filter($this->env, twig_round($this->getAttribute($context["order"], "order_total", array()), 2, "common"), "html", null, true);
            echo "zł</td>
                                                </tr>
                                                ";
            // line 35
            $context["a"] = ((isset($context["a"]) ? $context["a"] : null) + 1);
            // line 36
            echo "                                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "                                            </table>
                                        </div>
                                </div>
                            </div>
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
        return "shop-orders.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 37,  97 => 36,  95 => 35,  88 => 33,  84 => 32,  80 => 31,  74 => 30,  70 => 29,  67 => 28,  62 => 27,  60 => 26,  43 => 11,  41 => 10,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
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
    {% set url = \"index.php?site=shop&view=account\" %}
    <div class=\"container width-full\">
        <div class=\"well\">
            <div class=\"row\">
                <div class=\"row\">
                    <div class=\"col-md-3 bg-info\"><br/>
                        {% include \"shop-leftMenu.html.twig\"%}
                    </div>
                    <div class=\"col-md-9\">
                        <div class=\"well\">
                            <div class=\"row\">
                                <div class=\"well\">
                                    <div class=\"table-responsive\">
                                            <strong>Zamówienia:</strong>
                                            <table class=\"table table-bordered\">
                                            <tr class=\"bg-success\">
                                                <td>Lp.</td>
                                                <td>Nr zamówienia</td>
                                                <td>Data zamówienia</td>
                                                <td>Data modyfikacji</td>
                                                <td>Suma</td>
                                            </tr>
                                            {% set a = 1 %}
                                            {% for order in orders %}
                                                <tr>
                                                    <td>{{ a }}</td>
                                                    <td><a href=\"index.php?site=shop&view=orderDetail&orderId={{ order.order_id }}\">{{ order.order_id }}</a></td>
                                                    <td>{{ order.cdate|date(\"d-m-Y H:i:s\",false) }}</a></td>
                                                    <td>{{ order.mdate|date(\"d-m-Y H:i:s\",false) }}</a></td>
                                                    <td>{{ order.order_subtotal|round(2,'common') }}zł / {{ order.order_total|round(2,'common') }}zł</td>
                                                </tr>
                                                {% set a = a+1 %}
                                            {% endfor %}
                                            </table>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{% endblock%}
", "shop-orders.html.twig", "/view/shop-orders.html.twig");
    }
}
