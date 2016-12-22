<?php

/* shop-orderDetail.html.twig */
class __TwigTemplate_49691dfa19a17e3b0754081b3819a6519749057bb6fdbf3d75fabcf72ce2677f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "shop-orderDetail.html.twig", 1);
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
                    <div class=\"col-md-3 bg-info\"><br/>
                        ";
        // line 9
        $this->loadTemplate("shop-leftMenu.html.twig", "shop-orderDetail.html.twig", 9)->display($context);
        // line 10
        echo "                    </div>
                <div class=\"col-md-9\">
                    <div class=\"well\">
                        <div class=\"row\">
                            <div class=\"pull-left col-md-6\">
                                Zamówienie nr. ";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "order_id", array()), "html", null, true);
        echo "<br/>
                                Data zamówienia: ";
        // line 16
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "cdate", array()), "d-m-Y H:i:s"), "html", null, true);
        echo "<br/>
                                Data modyfikacji: ";
        // line 17
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "mdate", array()), "d-m-Y H:i:s"), "html", null, true);
        echo "<br/>
                                Stan zamówienia: ";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "order_status_name", array()), "html", null, true);
        echo "<br/>
                                <br/>
                                <br/>
                            </div>
                        </div>
                        <div class=\"row\">
                            <div class=\"col-md-6\">
                                <strong>Rachunek</strong><br/>  
                                <table class=\"table table-bordered \">
                                <tr>
                                    <td>E-mail:</td>
                                    <td>";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "email", array()), "html", null, true);
        echo "</td>
                                </tr>
                                <tr>
                                    <td>Nazwa firmy:</td>
                                    <td>";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "company", array()), "html", null, true);
        echo "</td>
                                </tr>
                                <tr>
                                    <td>Imię i Nazwisko:</td>
                                    <td>";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "first_name", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "last_name", array()), "html", null, true);
        echo "</a></td>
                                </tr>
                                <tr>
                                    <td>Ulica:</td>
                                    <td>";
        // line 41
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "address_1", array()), "html", null, true);
        echo "</td>
                                </tr>
                                <tr>
                                    <td>Miasto:</td>
                                    <td>";
        // line 45
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "city", array()), "html", null, true);
        echo "</td>
                                </tr>
                                <tr>
                                    <td>Kod pocztowy:</td>
                                    <td>";
        // line 49
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "zip", array()), "html", null, true);
        echo "</td>
                                </tr>
                                <tr>
                                    <td>Telefon:</td>
                                    <td>";
        // line 53
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "phone_1", array()), "html", null, true);
        echo "</td>
                                </tr>
                                <tr>
                                    <td>Telefon kom.:</td>
                                    <td>";
        // line 57
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "phone_2", array()), "html", null, true);
        echo "</td>
                                </tr>
                                <tr>
                                    <td>Numer NIP:</td>
                                    <td>";
        // line 61
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "extra_field_1", array()), "html", null, true);
        echo "</td>
                                </tr>
                                <tr>
                                    <td>Konsultant:</td>
                                    <td>";
        // line 65
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "extra_field_2", array()), "html", null, true);
        echo "</td>
                                </tr>
                                 </table>
                            </div>
                            <div class=\"col-md-6\">
                                <strong>Wysyłka do</strong>
                                ";
        // line 71
        $context["countAddresses"] = twig_length_filter($this->env, (isset($context["orderSendAddress"]) ? $context["orderSendAddress"] : null));
        // line 72
        echo "                                ";
        if (((isset($context["countAddresses"]) ? $context["countAddresses"] : null) > 1)) {
            // line 73
            echo "                                    ";
            $context["addType"] = "ST";
            // line 74
            echo "                                ";
        } else {
            // line 75
            echo "                                    ";
            $context["addType"] = "BT";
            // line 76
            echo "                                ";
        }
        // line 77
        echo "                                ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["orderSendAddress"]) ? $context["orderSendAddress"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["userSendTo"]) {
            echo " 
                                    ";
            // line 78
            if (($this->getAttribute($context["userSendTo"], "address_type", array()) == (isset($context["addType"]) ? $context["addType"] : null))) {
                // line 79
                echo "                                        <table class=\"table table-bordered\">
                                        <tr>
                                            <td>Alias:</td>
                                            <td>";
                // line 82
                echo twig_escape_filter($this->env, $this->getAttribute($context["userSendTo"], "address_type_name", array()), "html", null, true);
                echo "</td>
                                        </tr>
                                        <tr>
                                            <td>Nazwa firmy:</td>
                                            <td>";
                // line 86
                echo twig_escape_filter($this->env, $this->getAttribute($context["userSendTo"], "company", array()), "html", null, true);
                echo "</td>
                                        </tr>
                                        <tr>
                                            <td>Imię i Nazwisko:</td>
                                            <td>";
                // line 90
                echo twig_escape_filter($this->env, $this->getAttribute($context["userSendTo"], "first_name", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["userSendTo"], "last_name", array()), "html", null, true);
                echo "</td>
                                        </tr>
                                        <tr>
                                            <td>Ulica:</td>
                                            <td>";
                // line 94
                echo twig_escape_filter($this->env, $this->getAttribute($context["userSendTo"], "address_1", array()), "html", null, true);
                echo "</td>
                                        </tr>
                                        <tr>
                                            <td>Miasto:</td>
                                            <td>";
                // line 98
                echo twig_escape_filter($this->env, $this->getAttribute($context["userSendTo"], "city", array()), "html", null, true);
                echo "</td>
                                        </tr>
                                        <tr>
                                            <td>Kod pocztowy:</td>
                                            <td>";
                // line 102
                echo twig_escape_filter($this->env, $this->getAttribute($context["userSendTo"], "zip", array()), "html", null, true);
                echo "</td>
                                        </tr>
                                        <tr>
                                            <td>Telefon:</td>
                                            <td>";
                // line 106
                echo twig_escape_filter($this->env, $this->getAttribute($context["userSendTo"], "phone_1", array()), "html", null, true);
                echo "</td>
                                        </tr>
                                        <tr>
                                            <td>Telefon kom.:</td>
                                            <td>";
                // line 110
                echo twig_escape_filter($this->env, $this->getAttribute($context["userSendTo"], "phone_2", array()), "html", null, true);
                echo "</td>
                                        </tr>
                                        <tr>
                                            <td>Numer NIP:</td>
                                            <td>";
                // line 114
                echo twig_escape_filter($this->env, $this->getAttribute($context["userSendTo"], "extra_field_1", array()), "html", null, true);
                echo "</td>
                                        </tr>
                                        
                                         </table>
                                     ";
            }
            // line 119
            echo "                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['userSendTo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 120
        echo "                            </div>
                        </div>
                    </div>

                    <div class=\"row\">
                        <div class=\"well table-responsive\">
                            <table class=\"table table-bordered\">
                            <thead>
                                <tr>
                                    <td><strong>Ilość</strong></td>
                                    <td><strong>Nazwa</strong></td>
                                    <td><strong>Cena netto</strong></td>
                                    <td><strong>Cena brutto</strong></td>
                                    <td><strong>Podatek</strong></td>
                                    <td><strong>Suma</strong></td>
                                </tr>
                            </thead>
                            ";
        // line 137
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["orderProducts"]) ? $context["orderProducts"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 138
            echo "                                <tr>
                                    <td>";
            // line 139
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "product_quantity", array()), "html", null, true);
            echo "</td>
                                    <td>";
            // line 140
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "product_name", array()), "html", null, true);
            echo "</td>
                                    <td>";
            // line 141
            echo twig_escape_filter($this->env, twig_round($this->getAttribute($context["item"], "product_item_price", array()), 2, "common"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 142
            echo twig_escape_filter($this->env, twig_round($this->getAttribute($context["item"], "product_final_price", array()), 2, "common"), "html", null, true);
            echo "</td>
                                    <td>";
            // line 143
            echo twig_escape_filter($this->env, ($this->getAttribute($context["item"], "tax_rate", array()) * 100), "html", null, true);
            echo "%</td>
                                    <td>";
            // line 144
            echo twig_escape_filter($this->env, ($this->getAttribute($context["item"], "product_quantity", array()) * twig_round($this->getAttribute($context["item"], "product_final_price", array()), 2, "common")), "html", null, true);
            echo "</td>
                                </tr>
                                </form>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 148
        echo "                                <tr>
                                    <td colspan=\"4\">
                                    </td>
                                    <td>
                                        Suma netto:
                                    </td>
                                    <td>
                                        ";
        // line 155
        echo twig_escape_filter($this->env, twig_round($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "order_subtotal", array()), 2, "common"), "html", null, true);
        echo "zł
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan=\"4\">
                                    </td>
                                
                                    <td>
                                        Suma:
                                    </td>
                                    <td>
                                        ";
        // line 166
        echo twig_escape_filter($this->env, twig_round($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "order_total", array()), 2, "common"), "html", null, true);
        echo "zł
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan=\"4\">
                                    </td>
                                
                                    <td>
                                        Podatek:
                                    </td>
                                    <td>
                                        ";
        // line 177
        $context["taxTotal"] = ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "order_total", array()) - $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "order_subtotal", array()));
        // line 178
        echo "                                        ";
        echo twig_escape_filter($this->env, twig_round((isset($context["taxTotal"]) ? $context["taxTotal"] : null), 2, "common"), "html", null, true);
        echo "zł
                                    </td>
                                </tr>
                            </table>
                            
                        </div>
                        <div class=\"well\">
                            <strong>Informacje o wysyłce</strong><br/>
                            <div class=\"col-md-6\">
                                Metoda płatności:  <br/>
                                ";
        // line 188
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "payment_method_name", array()), "html", null, true);
        echo "
                            </div>
                            <div class=\"col-md-6\">
                                Rodzaj wysyłki:
                                
                            </div>
                            <br/>
                            <br/>
                        </div>
                    </div>
                    <div class=\"well\">
                        <strong>Notatka klienta</strong><br/>
                        <textarea class=\"form-control\" rows=\"5\" disabled>";
        // line 200
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "customer_note", array()), "html", null, true);
        echo "</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "shop-orderDetail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  376 => 200,  361 => 188,  347 => 178,  345 => 177,  331 => 166,  317 => 155,  308 => 148,  298 => 144,  294 => 143,  290 => 142,  286 => 141,  282 => 140,  278 => 139,  275 => 138,  271 => 137,  252 => 120,  246 => 119,  238 => 114,  231 => 110,  224 => 106,  217 => 102,  210 => 98,  203 => 94,  194 => 90,  187 => 86,  180 => 82,  175 => 79,  173 => 78,  166 => 77,  163 => 76,  160 => 75,  157 => 74,  154 => 73,  151 => 72,  149 => 71,  140 => 65,  133 => 61,  126 => 57,  119 => 53,  112 => 49,  105 => 45,  98 => 41,  89 => 37,  82 => 33,  75 => 29,  61 => 18,  57 => 17,  53 => 16,  49 => 15,  42 => 10,  40 => 9,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
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
                    <div class=\"col-md-3 bg-info\"><br/>
                        {% include \"shop-leftMenu.html.twig\"%}
                    </div>
                <div class=\"col-md-9\">
                    <div class=\"well\">
                        <div class=\"row\">
                            <div class=\"pull-left col-md-6\">
                                Zamówienie nr. {{ order.order_id }}<br/>
                                Data zamówienia: {{ order.cdate|date(\"d-m-Y H:i:s\") }}<br/>
                                Data modyfikacji: {{ order.mdate|date(\"d-m-Y H:i:s\") }}<br/>
                                Stan zamówienia: {{ order.order_status_name }}<br/>
                                <br/>
                                <br/>
                            </div>
                        </div>
                        <div class=\"row\">
                            <div class=\"col-md-6\">
                                <strong>Rachunek</strong><br/>  
                                <table class=\"table table-bordered \">
                                <tr>
                                    <td>E-mail:</td>
                                    <td>{{ order.email }}</td>
                                </tr>
                                <tr>
                                    <td>Nazwa firmy:</td>
                                    <td>{{ order.company }}</td>
                                </tr>
                                <tr>
                                    <td>Imię i Nazwisko:</td>
                                    <td>{{ order.first_name }} {{ order.last_name }}</a></td>
                                </tr>
                                <tr>
                                    <td>Ulica:</td>
                                    <td>{{ order.address_1 }}</td>
                                </tr>
                                <tr>
                                    <td>Miasto:</td>
                                    <td>{{ order.city }}</td>
                                </tr>
                                <tr>
                                    <td>Kod pocztowy:</td>
                                    <td>{{ order.zip }}</td>
                                </tr>
                                <tr>
                                    <td>Telefon:</td>
                                    <td>{{ order.phone_1 }}</td>
                                </tr>
                                <tr>
                                    <td>Telefon kom.:</td>
                                    <td>{{ order.phone_2 }}</td>
                                </tr>
                                <tr>
                                    <td>Numer NIP:</td>
                                    <td>{{ order.extra_field_1 }}</td>
                                </tr>
                                <tr>
                                    <td>Konsultant:</td>
                                    <td>{{ order.extra_field_2 }}</td>
                                </tr>
                                 </table>
                            </div>
                            <div class=\"col-md-6\">
                                <strong>Wysyłka do</strong>
                                {% set countAddresses = orderSendAddress|length %}
                                {% if countAddresses > 1 %}
                                    {% set addType = 'ST'%}
                                {% else %}
                                    {% set addType = 'BT'%}
                                {% endif %}
                                {% for userSendTo in orderSendAddress%} 
                                    {% if userSendTo.address_type == addType %}
                                        <table class=\"table table-bordered\">
                                        <tr>
                                            <td>Alias:</td>
                                            <td>{{ userSendTo.address_type_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nazwa firmy:</td>
                                            <td>{{ userSendTo.company }}</td>
                                        </tr>
                                        <tr>
                                            <td>Imię i Nazwisko:</td>
                                            <td>{{ userSendTo.first_name }} {{ userSendTo.last_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Ulica:</td>
                                            <td>{{ userSendTo.address_1 }}</td>
                                        </tr>
                                        <tr>
                                            <td>Miasto:</td>
                                            <td>{{ userSendTo.city }}</td>
                                        </tr>
                                        <tr>
                                            <td>Kod pocztowy:</td>
                                            <td>{{ userSendTo.zip }}</td>
                                        </tr>
                                        <tr>
                                            <td>Telefon:</td>
                                            <td>{{ userSendTo.phone_1 }}</td>
                                        </tr>
                                        <tr>
                                            <td>Telefon kom.:</td>
                                            <td>{{ userSendTo.phone_2 }}</td>
                                        </tr>
                                        <tr>
                                            <td>Numer NIP:</td>
                                            <td>{{ userSendTo.extra_field_1 }}</td>
                                        </tr>
                                        
                                         </table>
                                     {% endif %}
                                {% endfor %}
                            </div>
                        </div>
                    </div>

                    <div class=\"row\">
                        <div class=\"well table-responsive\">
                            <table class=\"table table-bordered\">
                            <thead>
                                <tr>
                                    <td><strong>Ilość</strong></td>
                                    <td><strong>Nazwa</strong></td>
                                    <td><strong>Cena netto</strong></td>
                                    <td><strong>Cena brutto</strong></td>
                                    <td><strong>Podatek</strong></td>
                                    <td><strong>Suma</strong></td>
                                </tr>
                            </thead>
                            {% for item in orderProducts %}
                                <tr>
                                    <td>{{ item.product_quantity }}</td>
                                    <td>{{ item.product_name }}</td>
                                    <td>{{ item.product_item_price|round(2,\"common\") }}</td>
                                    <td>{{ item.product_final_price|round(2,\"common\") }}</td>
                                    <td>{{ item.tax_rate * 100 }}%</td>
                                    <td>{{ item.product_quantity * item.product_final_price|round(2,\"common\") }}</td>
                                </tr>
                                </form>
                            {% endfor %}
                                <tr>
                                    <td colspan=\"4\">
                                    </td>
                                    <td>
                                        Suma netto:
                                    </td>
                                    <td>
                                        {{ order.order_subtotal|round(2,\"common\") }}zł
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan=\"4\">
                                    </td>
                                
                                    <td>
                                        Suma:
                                    </td>
                                    <td>
                                        {{ order.order_total|round(2,\"common\") }}zł
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan=\"4\">
                                    </td>
                                
                                    <td>
                                        Podatek:
                                    </td>
                                    <td>
                                        {% set taxTotal = order.order_total - order.order_subtotal%}
                                        {{ taxTotal|round(2,\"common\") }}zł
                                    </td>
                                </tr>
                            </table>
                            
                        </div>
                        <div class=\"well\">
                            <strong>Informacje o wysyłce</strong><br/>
                            <div class=\"col-md-6\">
                                Metoda płatności:  <br/>
                                {{order.payment_method_name}}
                            </div>
                            <div class=\"col-md-6\">
                                Rodzaj wysyłki:
                                
                            </div>
                            <br/>
                            <br/>
                        </div>
                    </div>
                    <div class=\"well\">
                        <strong>Notatka klienta</strong><br/>
                        <textarea class=\"form-control\" rows=\"5\" disabled>{{ order.customer_note }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
{% endblock%}
", "shop-orderDetail.html.twig", "/view/shop-orderDetail.html.twig");
    }
}
