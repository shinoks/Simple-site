<?php

/* shop.html.twig */
class __TwigTemplate_4ef9887f7544735bd29c4fe157a5cef386986615f42fcedce32b35ec407aae34 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "shop.html.twig", 1);
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
                    <div class=\"col-md-3 bg-info\"><br/>
                        ";
        // line 10
        $this->loadTemplate("shop-leftMenu.html.twig", "shop.html.twig", 10)->display($context);
        // line 11
        echo "                    </div>
                    <div class=\"col-md-9\">
                        <div class=\"well table-responsive\">
                            <table class=\"table table-bordered\">
                                <thead>
                                    <tr class=\"bg-success\">
                                        <td>Miniatura</td>
                                        <td>Nazwa</td>
                                        <td>Cena Netto</td>
                                        <td>Cena Brutto</td>
                                        <td>Koszyk</td>
                                    </tr>
                                </thead>
                                    ";
        // line 24
        $context["a"] = 1;
        // line 25
        echo "                                    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["products"]) ? $context["products"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 26
            echo "                                        <tr class=\"font11\">
                                            <td>
                                            <a class=\"imageLight\" href=\"web/images/shop_product/resized/";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "product_full_image", array()), "html", null, true);
            echo "\" data-lightbox=\"example-set\" data-title=\"Lub naciśnij prawą strzałkę na klawiaturze\">
                                                <img class=\"img-rounded\" src=\"web/images/shop_product/";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "product_thumb_image", array()), "html", null, true);
            echo "\" alt=\"\" />
                                            </a>
                                            </td>
                                            <td>";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "product_name", array()), "html", null, true);
            echo "</td>
                                            <td>";
            // line 33
            echo twig_escape_filter($this->env, twig_round($this->getAttribute($context["product"], "product_price", array()), 2, "common"), "html", null, true);
            echo "zł</td>
                                            <td>
                                            ";
            // line 35
            if (twig_test_empty($this->getAttribute($context["product"], "final_price", array()))) {
                // line 36
                echo "                                                ";
                echo twig_escape_filter($this->env, twig_round($this->getAttribute($context["product"], "product_price", array()), 2, "common"), "html", null, true);
                echo "zł
                                            ";
            } else {
                // line 38
                echo "                                                ";
                echo twig_escape_filter($this->env, twig_round($this->getAttribute($context["product"], "final_price", array()), 2, "common"), "html", null, true);
                echo "zł
                                            ";
            }
            // line 40
            echo "                                            
                                            </td>
                                            <td>
                                                <form class=\"form-inline\" action=\"index.php\" method=\"GET\">
                                                    <input type=\"hidden\" value=\"shop\" name=\"site\" />
                                                    <input type=\"text\" value=\"1\" name=\"qty\"  class=\"form-control\"/>
                                                    <input type=\"hidden\" value=\"";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "product_id", array()), "html", null, true);
            echo "\" name=\"productId\" />
                                                    <input type=\"hidden\" value=\"add\" name=\"action\" />
                                                    <input type=\"submit\" value=\"Dodaj\" class=\"btn btn-default\" />
                                                </form>
                                            </td>
                                        </tr>
                                        ";
            // line 52
            $context["a"] = ((isset($context["a"]) ? $context["a"] : null) + 1);
            // line 53
            echo "                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
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
        return "shop.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 54,  121 => 53,  119 => 52,  110 => 46,  102 => 40,  96 => 38,  90 => 36,  88 => 35,  83 => 33,  79 => 32,  73 => 29,  69 => 28,  65 => 26,  60 => 25,  58 => 24,  43 => 11,  41 => 10,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
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
                    <div class=\"col-md-3 bg-info\"><br/>
                        {% include \"shop-leftMenu.html.twig\"%}
                    </div>
                    <div class=\"col-md-9\">
                        <div class=\"well table-responsive\">
                            <table class=\"table table-bordered\">
                                <thead>
                                    <tr class=\"bg-success\">
                                        <td>Miniatura</td>
                                        <td>Nazwa</td>
                                        <td>Cena Netto</td>
                                        <td>Cena Brutto</td>
                                        <td>Koszyk</td>
                                    </tr>
                                </thead>
                                    {% set a = 1 %}
                                    {% for product in products %}
                                        <tr class=\"font11\">
                                            <td>
                                            <a class=\"imageLight\" href=\"web/images/shop_product/resized/{{ product.product_full_image }}\" data-lightbox=\"example-set\" data-title=\"Lub naciśnij prawą strzałkę na klawiaturze\">
                                                <img class=\"img-rounded\" src=\"web/images/shop_product/{{ product.product_thumb_image }}\" alt=\"\" />
                                            </a>
                                            </td>
                                            <td>{{ product.product_name }}</td>
                                            <td>{{ product.product_price|round(2,\"common\") }}zł</td>
                                            <td>
                                            {% if product.final_price is empty %}
                                                {{ product.product_price|round(2,\"common\") }}zł
                                            {% else %}
                                                {{ product.final_price|round(2,\"common\") }}zł
                                            {% endif %}
                                            
                                            </td>
                                            <td>
                                                <form class=\"form-inline\" action=\"index.php\" method=\"GET\">
                                                    <input type=\"hidden\" value=\"shop\" name=\"site\" />
                                                    <input type=\"text\" value=\"1\" name=\"qty\"  class=\"form-control\"/>
                                                    <input type=\"hidden\" value=\"{{ product.product_id }}\" name=\"productId\" />
                                                    <input type=\"hidden\" value=\"add\" name=\"action\" />
                                                    <input type=\"submit\" value=\"Dodaj\" class=\"btn btn-default\" />
                                                </form>
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
", "shop.html.twig", "/view/shop.html.twig");
    }
}
