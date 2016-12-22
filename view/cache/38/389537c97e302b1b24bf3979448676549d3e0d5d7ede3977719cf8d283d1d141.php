<?php

/* shop-leftMenu.html.twig */
class __TwigTemplate_d757de2c1a47addc312ec66bd85076bd22286a709c53860dfde3f6c3bc4d4a92 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["url"] = "index.php?site=shop";
        // line 2
        echo "                        <div class=\"panel panel-default\">
                            <div class=\"panel-heading bg-primary\">
                                <strong>Logowanie</strong>
                            </div>
                            <div class=\"panel-body text-center\">
                                ";
        // line 7
        if (twig_test_empty((isset($context["user"]) ? $context["user"] : null))) {
            // line 8
            echo "                                    Nie jesteś zalogowany jako klient. Zaloguj się<br/>
                                    <form action=\"";
            // line 9
            echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
            echo "&action=login\" method=\"POST\">
                                        <input class=\"form-control\" type=\"text\" name=\"username\" placeholder=\"Nazwa użytkownika\"/>
                                        <input class=\"form-control\" type=\"password\" name=\"password\" placeholder=\"Hasło\" />
                                        <input class=\"btn btn-success\" type=\"submit\" value=\"Zaloguj\"/>
                                    </form><br/>
                                    Nowy klient ?<br/> <a href=\"";
            // line 14
            echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
            echo "&view=register\">Zarejestruj</a>
                                ";
        } else {
            // line 16
            echo "                                    Jesteś zalogowany jako:<br/>
                                    ";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "name", array()), "html", null, true);
            echo "<br/>
                                    <a href=\"";
            // line 18
            echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
            echo "&view=account\" class=\"btn btn-default btn-xs\">Dane klienta</a>
                                    <a href=\"";
            // line 19
            echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
            echo "&view=orders\" class=\"btn btn-default btn-xs\">Zamówienia klienta</a><br/><br/>
                                    <a href=\"index.php?site=shop&action=logout\" class=\"btn btn-info\">Wyloguj klienta</a>
                                ";
        }
        // line 22
        echo "                            </div>
                        </div>
                        
                        <div class=\"panel panel-default\">
                            <div class=\"panel-heading bg-primary\">
                                <strong>Kategorie</strong>
                            </div>
                            <div class=\"panel-body text-center\">
                                <a href=\"index.php?site=shop\" class=\"btn btn-info center-block\"><strong>Wszystkie produkty</strong></a>
                                <ul class=\"list-group\">
                                ";
        // line 32
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 33
            echo "                                    <li class=\"list-group-item\"><a class=\"deco\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
            echo "&view=category&categoryId=";
            echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "category_id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "category_name", array()), "html", null, true);
            echo "</a></li>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "                                </ul>
                            </div>
                            
                        </div>
                        
                        
                        <div class=\"panel panel-default\">
                            <div class=\"panel-heading bg-success\">
                                <strong>Koszyk</strong>
                            </div>
                            <div class=\"panel-body\">
                                ";
        // line 46
        if ( !twig_test_empty((isset($context["items"]) ? $context["items"] : null))) {
            // line 47
            echo "                                    ";
            $context["total"] = 0;
            // line 48
            echo "                                    ";
            $context["totalFinal"] = 0;
            // line 49
            echo "                                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
            foreach ($context['_seq'] as $context["id"] => $context["qty"]) {
                // line 50
                echo "                                        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["products"]) ? $context["products"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                    if (($this->getAttribute($context["product"], "product_id", array()) == $context["id"])) {
                        echo "   
                                            ";
                        // line 51
                        if ((twig_round($this->getAttribute($context["product"], "final_price", array()), 2, "common") == "0")) {
                            // line 52
                            echo "                                                ";
                            $context["productFinalPrice"] = twig_round($this->getAttribute($context["product"], "product_price", array()), 2, "common");
                            // line 53
                            echo "                                            ";
                        } else {
                            // line 54
                            echo "                                                ";
                            $context["productFinalPrice"] = twig_round($this->getAttribute($context["product"], "final_price", array()), 2, "common");
                            // line 55
                            echo "                                            ";
                        }
                        echo " 
                                            <div class=\"row\">
                                                <div class=\"col-md-8\">
                                                    ";
                        // line 58
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "product_name", array()), "html", null, true);
                        echo "
                                                </div>
                                                <div class=\"col-md-2\">
                                                    ";
                        // line 61
                        echo twig_escape_filter($this->env, $context["qty"], "html", null, true);
                        echo " szt
                                                </div>
                                                <div class=\"col-md-2\">
                                                    <a class=\"btn btn-danger font11\" href=\"";
                        // line 64
                        echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
                        echo "&action=remove&productId=";
                        echo twig_escape_filter($this->env, $context["id"], "html", null, true);
                        echo "\"><strong>X</strong></a>
                                                </div>
                                            </div>
                                            <hr/>
                                            ";
                        // line 68
                        $context["total"] = ((isset($context["total"]) ? $context["total"] : null) + ($this->getAttribute($context["product"], "product_price", array()) * $context["qty"]));
                        // line 69
                        echo "                                            ";
                        $context["totalFinal"] = ((isset($context["totalFinal"]) ? $context["totalFinal"] : null) + ((isset($context["productFinalPrice"]) ? $context["productFinalPrice"] : null) * $context["qty"]));
                        // line 70
                        echo "                                        ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 71
                echo "                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['id'], $context['qty'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 72
            echo "                                    <br/>
                                        <div class=\"row\">
                                            <div class=\"col-md-12\">
                                                <table class=\"table table-bordered\">
                                                    <tr>
                                                        <td>
                                                            Kwota netto:
                                                        </td>
                                                        <td>
                                                            <span class=\"badge\">";
            // line 81
            echo twig_escape_filter($this->env, twig_round((isset($context["total"]) ? $context["total"] : null), 2, "common"), "html", null, true);
            echo "zł</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Kwota brutto:
                                                        </td>
                                                        <td>
                                                            <span class=\"badge\">";
            // line 89
            echo twig_escape_filter($this->env, twig_round((isset($context["totalFinal"]) ? $context["totalFinal"] : null), 2, "common"), "html", null, true);
            echo "zł</span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                                <a class=\"btn btn-success\" href=\"index.php?site=shop&view=cart\">Do Koszyka</a>
                                        </div>
                                ";
        } else {
            // line 97
            echo "                                   <p style=\"color:#990000;\">Twój koszyk jest pusty.</p>
                                ";
        }
        // line 99
        echo "                            </div>
                        </div>";
    }

    public function getTemplateName()
    {
        return "shop-leftMenu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  220 => 99,  216 => 97,  205 => 89,  194 => 81,  183 => 72,  177 => 71,  170 => 70,  167 => 69,  165 => 68,  156 => 64,  150 => 61,  144 => 58,  137 => 55,  134 => 54,  131 => 53,  128 => 52,  126 => 51,  118 => 50,  113 => 49,  110 => 48,  107 => 47,  105 => 46,  92 => 35,  79 => 33,  75 => 32,  63 => 22,  57 => 19,  53 => 18,  49 => 17,  46 => 16,  41 => 14,  33 => 9,  30 => 8,  28 => 7,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% set url = \"index.php?site=shop\" %}
                        <div class=\"panel panel-default\">
                            <div class=\"panel-heading bg-primary\">
                                <strong>Logowanie</strong>
                            </div>
                            <div class=\"panel-body text-center\">
                                {% if user is empty %}
                                    Nie jesteś zalogowany jako klient. Zaloguj się<br/>
                                    <form action=\"{{url}}&action=login\" method=\"POST\">
                                        <input class=\"form-control\" type=\"text\" name=\"username\" placeholder=\"Nazwa użytkownika\"/>
                                        <input class=\"form-control\" type=\"password\" name=\"password\" placeholder=\"Hasło\" />
                                        <input class=\"btn btn-success\" type=\"submit\" value=\"Zaloguj\"/>
                                    </form><br/>
                                    Nowy klient ?<br/> <a href=\"{{url}}&view=register\">Zarejestruj</a>
                                {% else %}
                                    Jesteś zalogowany jako:<br/>
                                    {{user.name}}<br/>
                                    <a href=\"{{url}}&view=account\" class=\"btn btn-default btn-xs\">Dane klienta</a>
                                    <a href=\"{{url}}&view=orders\" class=\"btn btn-default btn-xs\">Zamówienia klienta</a><br/><br/>
                                    <a href=\"index.php?site=shop&action=logout\" class=\"btn btn-info\">Wyloguj klienta</a>
                                {% endif %}
                            </div>
                        </div>
                        
                        <div class=\"panel panel-default\">
                            <div class=\"panel-heading bg-primary\">
                                <strong>Kategorie</strong>
                            </div>
                            <div class=\"panel-body text-center\">
                                <a href=\"index.php?site=shop\" class=\"btn btn-info center-block\"><strong>Wszystkie produkty</strong></a>
                                <ul class=\"list-group\">
                                {% for category in categories %}
                                    <li class=\"list-group-item\"><a class=\"deco\" href=\"{{url}}&view=category&categoryId={{category.category_id}}\">{{category.category_name}}</a></li>
                                {% endfor %}
                                </ul>
                            </div>
                            
                        </div>
                        
                        
                        <div class=\"panel panel-default\">
                            <div class=\"panel-heading bg-success\">
                                <strong>Koszyk</strong>
                            </div>
                            <div class=\"panel-body\">
                                {% if items is not empty %}
                                    {% set total = 0 %}
                                    {% set totalFinal = 0 %}
                                    {% for id, qty in items %}
                                        {% for product in products if product.product_id == id %}   
                                            {% if product.final_price|round(2,\"common\") == '0' %}
                                                {% set productFinalPrice = product.product_price|round(2,\"common\") %}
                                            {% else %}
                                                {% set productFinalPrice = product.final_price|round(2,\"common\") %}
                                            {% endif %} 
                                            <div class=\"row\">
                                                <div class=\"col-md-8\">
                                                    {{product.product_name}}
                                                </div>
                                                <div class=\"col-md-2\">
                                                    {{qty}} szt
                                                </div>
                                                <div class=\"col-md-2\">
                                                    <a class=\"btn btn-danger font11\" href=\"{{ url }}&action=remove&productId={{ id }}\"><strong>X</strong></a>
                                                </div>
                                            </div>
                                            <hr/>
                                            {% set total = total + product.product_price * qty %}
                                            {% set totalFinal = totalFinal + productFinalPrice * qty %}
                                        {% endfor %}
                                    {% endfor %}
                                    <br/>
                                        <div class=\"row\">
                                            <div class=\"col-md-12\">
                                                <table class=\"table table-bordered\">
                                                    <tr>
                                                        <td>
                                                            Kwota netto:
                                                        </td>
                                                        <td>
                                                            <span class=\"badge\">{{ total|round(2,\"common\") }}zł</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Kwota brutto:
                                                        </td>
                                                        <td>
                                                            <span class=\"badge\">{{ totalFinal|round(2,\"common\") }}zł</span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                                <a class=\"btn btn-success\" href=\"index.php?site=shop&view=cart\">Do Koszyka</a>
                                        </div>
                                {% else %}
                                   <p style=\"color:#990000;\">Twój koszyk jest pusty.</p>
                                {% endif %}
                            </div>
                        </div>", "shop-leftMenu.html.twig", "/view/shop-leftMenu.html.twig");
    }
}
