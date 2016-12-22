<?php

/* shop-cartDetail.html.twig */
class __TwigTemplate_d31ad530e36ca5a3568e46e6e1429d7b62cc5554537ff4279e7f98b3fd10c530 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "shop-cartDetail.html.twig", 1);
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
        $context["url"] = "index.php?site=shop&view=cart";
        // line 5
        echo "    <div class=\"container width-full\">
        <div class=\"well\">
            <div class=\"row\">
                <div class=\"row\">
                    <div class=\"col-md-3 bg-info\"><br/>
                        ";
        // line 10
        $this->loadTemplate("shop-leftMenu.html.twig", "shop-cartDetail.html.twig", 10)->display($context);
        // line 11
        echo "                    </div>
                    <div class=\"col-md-9\">
                        <div class=\"well responsive\">
                            <div class=\"row\">
                                <div class=\"well fade in\" id=\"order-step-1\">
                                  ";
        // line 16
        if ( !twig_test_empty((isset($context["items"]) ? $context["items"] : null))) {
            // line 17
            echo "                                    
                                
                                    <table class=\"table table-cendensed font11\">
                                    <tr>
                                        <td><strong>Produkt</strong></td>
                                        <td><strong>Cena Netto</strong></td>
                                        <td><strong>Cena Brutto</strong></td>
                                        <td><strong>Ilość</strong></td>
                                        <td><strong>Kwota</strong></td>
                                        <td></td>
                                    </tr>
                                    ";
            // line 28
            $context["total"] = 0;
            // line 29
            echo "                                    ";
            $context["totalFinal"] = 0;
            // line 30
            echo "                                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
            foreach ($context['_seq'] as $context["id"] => $context["qty"]) {
                // line 31
                echo "                                        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["products"]) ? $context["products"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                    if (($this->getAttribute($context["product"], "product_id", array()) == $context["id"])) {
                        echo "                                
                                            ";
                        // line 32
                        if ((twig_round($this->getAttribute($context["product"], "final_price", array()), 2, "common") == "0")) {
                            // line 33
                            echo "                                                ";
                            $context["productFinalPrice"] = twig_round($this->getAttribute($context["product"], "product_price", array()), 2, "common");
                            // line 34
                            echo "                                            ";
                        } else {
                            // line 35
                            echo "                                                ";
                            $context["productFinalPrice"] = twig_round($this->getAttribute($context["product"], "final_price", array()), 2, "common");
                            // line 36
                            echo "                                            ";
                        }
                        echo "                                
                                        <tr>
                                            <td>";
                        // line 38
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "product_name", array()), "html", null, true);
                        echo "</td>
                                            <td>";
                        // line 39
                        echo twig_escape_filter($this->env, twig_round($this->getAttribute($context["product"], "product_price", array()), 2, "common"), "html", null, true);
                        echo "zł</td>
                                            <td>";
                        // line 40
                        echo twig_escape_filter($this->env, twig_round((isset($context["productFinalPrice"]) ? $context["productFinalPrice"] : null), 2, "common"), "html", null, true);
                        echo "zł</td>
                                            <td><div class=\"row\">
                                            <form action=\"index.php\" method=\"GET\">
                                                    <input type=\"hidden\" value=\"shop\" name=\"site\" />
                                                    <input type=\"hidden\" value=\"cart\" name=\"view\" />
                                                    <input type=\"text\" class=\"form-control\" value=\"";
                        // line 45
                        echo twig_escape_filter($this->env, $context["qty"], "html", null, true);
                        echo "\" name=\"qty\" />
                                                    <input type=\"hidden\" value=\"";
                        // line 46
                        echo twig_escape_filter($this->env, $context["id"], "html", null, true);
                        echo "\" name=\"productId\" />
                                                    <input type=\"hidden\" value=\"update\" name=\"action\" />
                                                    <input type=\"submit\" value=\"aktualizuj\" class=\"btn btn-default font11\" />
                                            </form>
                                            </td>
                                            ";
                        // line 51
                        $context["productsPrice"] = ($this->getAttribute($context["product"], "product_price", array()) * $context["qty"]);
                        // line 52
                        echo "                                            <td>";
                        echo twig_escape_filter($this->env, twig_round((isset($context["productsPrice"]) ? $context["productsPrice"] : null), 2, "common"), "html", null, true);
                        echo "  zł</td>
                                            <td><a class=\"btn btn-danger font11\" href=\"";
                        // line 53
                        echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
                        echo "&action=remove&productId=";
                        echo twig_escape_filter($this->env, $context["id"], "html", null, true);
                        echo "\">Usuń</a></td>
                                        </tr>
                                        
                                        ";
                        // line 56
                        $context["total"] = ((isset($context["total"]) ? $context["total"] : null) + ($this->getAttribute($context["product"], "product_price", array()) * $context["qty"]));
                        // line 57
                        echo "                                        ";
                        $context["totalFinal"] = ((isset($context["totalFinal"]) ? $context["totalFinal"] : null) + ((isset($context["productFinalPrice"]) ? $context["productFinalPrice"] : null) * $context["qty"]));
                        // line 58
                        echo "                                        ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 59
                echo "                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['id'], $context['qty'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 60
            echo "                                    <tr>
                                        <td><a class=\"btn btn-danger\" href=\"";
            // line 61
            echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
            echo "&action=empty\">Opróżnij koszyk</a></td>
                                        <td colspan=\"5\" align=\"right\">Całkowity koszt netto: ";
            // line 62
            echo twig_escape_filter($this->env, twig_round((isset($context["total"]) ? $context["total"] : null), 2, "common"), "html", null, true);
            echo " zł<br/>
                                                                                Całkowity koszt brutto: ";
            // line 63
            echo twig_escape_filter($this->env, twig_round((isset($context["totalFinal"]) ? $context["totalFinal"] : null), 2, "common"), "html", null, true);
            echo " zł</td>
                                    </tr>
                                    </table>
                                    <p class=\"text-left\">
                                        <div class=\"row\">
                                            <div class=\"col-md-6\">
                                                Produktów w koszyku ";
            // line 69
            echo twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["items"]) ? $context["items"] : null)), "html", null, true);
            echo "<br/>
                                                Kwota netto: ";
            // line 70
            echo twig_escape_filter($this->env, twig_round((isset($context["total"]) ? $context["total"] : null), 2, "common"), "html", null, true);
            echo "zł<br/>
                                                Kwota brutto: ";
            // line 71
            echo twig_escape_filter($this->env, twig_round((isset($context["totalFinal"]) ? $context["totalFinal"] : null), 2, "common"), "html", null, true);
            echo "zł<br/>
                                            </div>
                                            <div class=\"col-md-6\">
                                                ";
            // line 74
            if (twig_test_empty((isset($context["user"]) ? $context["user"] : null))) {
                // line 75
                echo "                                                    <a class=\"btn btn-success\" href=\"index.php?site=shop&view=login\">Zaloguj się</a>
                                                ";
            } else {
                // line 77
                echo "                                                    <a class=\"btn btn-success\" id=\"continueOrder\" href=\"#\">Zamów</a>
                                                ";
            }
            // line 79
            echo "                                            </div>
                                        </div>
                                    </p>
                                ";
        } else {
            // line 83
            echo "                                   <p style=\"color:#990000;\">Twój koszyk jest pusty.</p>
                                ";
        }
        // line 85
        echo "                                </div>
                                <div id='order-step-2' class=\"collapse fade\" >
                                
                                
                                <strong>Koszyk - potwierdzenie</strong>
                                ";
        // line 90
        if ( !twig_test_empty((isset($context["items"]) ? $context["items"] : null))) {
            // line 91
            echo "                                    
                                
                                    <table class=\"table table-cendensed font11\">
                                    <tr>
                                        <td><strong>Produkt</strong></td>
                                        <td><strong>Cena Netto</strong></td>
                                        <td><strong>Cena Brutto</strong></td>
                                        <td><strong>Ilość</strong></td>
                                        <td><strong>Kwota</strong></td>
                                        <td></td>
                                    </tr>
                                    ";
            // line 102
            $context["total"] = 0;
            // line 103
            echo "                                    ";
            $context["totalFinal"] = 0;
            // line 104
            echo "                                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
            foreach ($context['_seq'] as $context["id"] => $context["qty"]) {
                // line 105
                echo "                                        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["products"]) ? $context["products"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                    if (($this->getAttribute($context["product"], "product_id", array()) == $context["id"])) {
                        echo "                                
                                            ";
                        // line 106
                        if ((twig_round($this->getAttribute($context["product"], "final_price", array()), 2, "common") == "0")) {
                            // line 107
                            echo "                                                ";
                            $context["productFinalPrice"] = twig_round($this->getAttribute($context["product"], "product_price", array()), 2, "common");
                            // line 108
                            echo "                                            ";
                        } else {
                            // line 109
                            echo "                                                ";
                            $context["productFinalPrice"] = twig_round($this->getAttribute($context["product"], "final_price", array()), 2, "common");
                            // line 110
                            echo "                                            ";
                        }
                        // line 111
                        echo "                                        <tr>
                                            <td>";
                        // line 112
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "product_name", array()), "html", null, true);
                        echo "</td>
                                            <td>";
                        // line 113
                        echo twig_escape_filter($this->env, twig_round($this->getAttribute($context["product"], "product_price", array()), 2, "common"), "html", null, true);
                        echo "zł</td>
                                            <td>";
                        // line 114
                        echo twig_escape_filter($this->env, (isset($context["productFinalPrice"]) ? $context["productFinalPrice"] : null), "html", null, true);
                        echo "zł</td>
                                            <td>";
                        // line 115
                        echo twig_escape_filter($this->env, $context["qty"], "html", null, true);
                        echo "</td>
                                            <td>";
                        // line 116
                        echo twig_escape_filter($this->env, ($this->getAttribute($context["product"], "product_price", array()) * $context["qty"]), "html", null, true);
                        echo "  zł</td>
                                        </tr>
                                        
                                        ";
                        // line 119
                        $context["total"] = ((isset($context["total"]) ? $context["total"] : null) + ($this->getAttribute($context["product"], "product_price", array()) * $context["qty"]));
                        // line 120
                        echo "                                        ";
                        $context["totalFinal"] = ((isset($context["totalFinal"]) ? $context["totalFinal"] : null) + ((isset($context["productFinalPrice"]) ? $context["productFinalPrice"] : null) * $context["qty"]));
                        // line 121
                        echo "                                        ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 122
                echo "                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['id'], $context['qty'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 123
            echo "                                    <tr>
                                        <td colspan=\"6\" align=\"right\">Całkowity koszt netto: ";
            // line 124
            echo twig_escape_filter($this->env, twig_round((isset($context["total"]) ? $context["total"] : null), 2, "common"), "html", null, true);
            echo " zł<br/>
                                                                      Całkowity koszt brutto: ";
            // line 125
            echo twig_escape_filter($this->env, twig_round((isset($context["totalFinal"]) ? $context["totalFinal"] : null), 2, "common"), "html", null, true);
            echo " zł</td>
                                    </tr>
                                    </table>
                                ";
        } else {
            // line 129
            echo "                                   <p style=\"color:#990000;\">Twój koszyk jest pusty.</p>
                                ";
        }
        // line 131
        echo "                                <div class=\"well\">
                                    <strong>Wybierz adres wysyłki:</strong>
                                    <hr/>
                                    <div class=\"panel\">
                                        <button class=\"btn btn-default\" type=\"button\" data-toggle=\"collapse\" data-target=\"#addAddress\" aria-expanded=\"false\" aria-controls=\"addAddress\">
                                          Dodaj adres wysyłki
                                        </button>
                                        <div class=\"collapse\" id=\"addAddress\">
                                            <div class=\"well bg-grey\">
                                                <form action=\"";
        // line 140
        echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
        echo "&perf=addUserInfo\" method=\"POST\">
                                                    Nazwa adresu: <input type=\"text\" class=\"form-control\" name=\"addressTypeName\" required/>
                                                    Nazwa firmy: <input type=\"text\" class=\"form-control\" name=\"company\"/>
                                                    Nazwisko: <input type=\"text\" class=\"form-control\" name=\"lastName\" />
                                                    Imię: <input type=\"text\" class=\"form-control\" name=\"firstName\"/>
                                                    Telefon: <input type=\"text\" class=\"form-control\" name=\"phone\"/>
                                                    Telefon 2 :<input type=\"text\" class=\"form-control\" name=\"phone2\"/>
                                                    Adres:<input type=\"text\" class=\"form-control\" name=\"address\"/>
                                                    Adres 2:<input type=\"text\" class=\"form-control\" name=\"address2\" />
                                                    Miasto: <input type=\"text\" class=\"form-control\" name=\"city\" />
                                                    Kod pocztowy: <input type=\"text\" class=\"form-control\" name=\"zip\" />
                                                    NIP: <input type=\"text\" class=\"form-control\" name=\"extraField1\" />
                                                    <input type=\"submit\" class=\"btn btn-success\" value=\"Zapisz nowy adres\"/>
                                                </form>
                                             </div>
                                         </div>
                                    </div>
                                    <form action=\"index.php?site=shop&view=doOrder\" method=\"POST\">
                                    ";
        // line 158
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["userAddresses"]) ? $context["userAddresses"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["userAdress"]) {
            // line 159
            echo "                                        <div class=\"row\">
                                            <div class=\"col-md-2\">
                                                <input type=\"radio\" value=\"";
            // line 161
            echo twig_escape_filter($this->env, $this->getAttribute($context["userAdress"], "user_info_id", array()), "html", null, true);
            echo "\" name=\"userInfoId\" ";
            if (($this->getAttribute($context["userAdress"], "address_type", array()) == "BT")) {
                echo " checked=\"checked\" ";
            }
            echo "/> ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["userAdress"], "address_type_name", array()), "html", null, true);
            echo "
                                            </div>
                                            <div class=\"col-md-2\">
                                                ";
            // line 164
            echo twig_escape_filter($this->env, $this->getAttribute($context["userAdress"], "company", array()), "html", null, true);
            echo "
                                            </div>
                                            <div class=\"col-md-2\">
                                                ";
            // line 167
            echo twig_escape_filter($this->env, $this->getAttribute($context["userAdress"], "first_name", array()), "html", null, true);
            echo " 
                                                ";
            // line 168
            echo twig_escape_filter($this->env, $this->getAttribute($context["userAdress"], "last_name", array()), "html", null, true);
            echo "
                                            </div>
                                            <div class=\"col-md-2\">
                                                ";
            // line 171
            echo twig_escape_filter($this->env, $this->getAttribute($context["userAdress"], "zip", array()), "html", null, true);
            echo " 
                                                ";
            // line 172
            echo twig_escape_filter($this->env, $this->getAttribute($context["userAdress"], "city", array()), "html", null, true);
            echo "
                                            </div>
                                            <div class=\"col-md-2\">
                                                ";
            // line 175
            echo twig_escape_filter($this->env, $this->getAttribute($context["userAdress"], "address_1", array()), "html", null, true);
            echo " 
                                                ";
            // line 176
            echo twig_escape_filter($this->env, $this->getAttribute($context["userAdress"], "address_2", array()), "html", null, true);
            echo "
                                            </div>
                                        </div>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['userAdress'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 180
        echo "
                                    </div>
                                    <div class=\"well\">
                                        <strong>Wybierz sposób płatności:</strong>
                                        ";
        // line 184
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["paymentsMethod"]) ? $context["paymentsMethod"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["payment"]) {
            // line 185
            echo "                                            <div class=\"row\">
                                                ";
            // line 186
            if (($this->getAttribute($context["payment"], "payment_method_id", array()) == 1)) {
                // line 187
                echo "                                                    <input type=\"radio\" name=\"paymentMethodId\" value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["payment"], "payment_method_id", array()), "html", null, true);
                echo "\" checked> - ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["payment"], "payment_method_name", array()), "html", null, true);
                echo "
                                                ";
            } else {
                // line 189
                echo "                                                    <input type=\"radio\" name=\"paymentMethodId\" value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["payment"], "payment_method_id", array()), "html", null, true);
                echo "\"> - ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["payment"], "payment_method_name", array()), "html", null, true);
                echo "
                                                ";
            }
            // line 191
            echo "                                            </div>
                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['payment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 193
        echo "                                    </div>
                                    <div class=\"well\">
                                        <strong>Notatka klienta:</strong>
                                        <textarea class=\"form-control\" name=\"customerNote\" placeholder=\"Uwagi do swojego zamówienia\"></textarea>
                                    </div>
                                    <div class=\"row\">
                                        <input type=\"submit\" class=\"block-right btn btn-success\" value=\"Zamawiam\"/>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ";
        // line 210
        if (((isset($context["info"]) ? $context["info"] : null) == "addUserInfo-success")) {
            // line 211
            echo "        <script>
            \$(function() {
                \$( \"#order-step-2\" ).collapse();
                \$( \"#order-step-1\" ).collapse();
            });
        </script>
    ";
        }
        // line 218
        echo "            <script>
            \$( \"#continueOrder\" ).click(function() {
              \$( \"#order-step-2\" ).collapse();
              \$( \"#order-step-1\" ).collapse();
            });
        </script>
";
    }

    public function getTemplateName()
    {
        return "shop-cartDetail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  490 => 218,  481 => 211,  479 => 210,  460 => 193,  453 => 191,  445 => 189,  437 => 187,  435 => 186,  432 => 185,  428 => 184,  422 => 180,  412 => 176,  408 => 175,  402 => 172,  398 => 171,  392 => 168,  388 => 167,  382 => 164,  370 => 161,  366 => 159,  362 => 158,  341 => 140,  330 => 131,  326 => 129,  319 => 125,  315 => 124,  312 => 123,  306 => 122,  299 => 121,  296 => 120,  294 => 119,  288 => 116,  284 => 115,  280 => 114,  276 => 113,  272 => 112,  269 => 111,  266 => 110,  263 => 109,  260 => 108,  257 => 107,  255 => 106,  247 => 105,  242 => 104,  239 => 103,  237 => 102,  224 => 91,  222 => 90,  215 => 85,  211 => 83,  205 => 79,  201 => 77,  197 => 75,  195 => 74,  189 => 71,  185 => 70,  181 => 69,  172 => 63,  168 => 62,  164 => 61,  161 => 60,  155 => 59,  148 => 58,  145 => 57,  143 => 56,  135 => 53,  130 => 52,  128 => 51,  120 => 46,  116 => 45,  108 => 40,  104 => 39,  100 => 38,  94 => 36,  91 => 35,  88 => 34,  85 => 33,  83 => 32,  75 => 31,  70 => 30,  67 => 29,  65 => 28,  52 => 17,  50 => 16,  43 => 11,  41 => 10,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
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
    {% set url = \"index.php?site=shop&view=cart\" %}
    <div class=\"container width-full\">
        <div class=\"well\">
            <div class=\"row\">
                <div class=\"row\">
                    <div class=\"col-md-3 bg-info\"><br/>
                        {% include \"shop-leftMenu.html.twig\"%}
                    </div>
                    <div class=\"col-md-9\">
                        <div class=\"well responsive\">
                            <div class=\"row\">
                                <div class=\"well fade in\" id=\"order-step-1\">
                                  {% if items is not empty %}
                                    
                                
                                    <table class=\"table table-cendensed font11\">
                                    <tr>
                                        <td><strong>Produkt</strong></td>
                                        <td><strong>Cena Netto</strong></td>
                                        <td><strong>Cena Brutto</strong></td>
                                        <td><strong>Ilość</strong></td>
                                        <td><strong>Kwota</strong></td>
                                        <td></td>
                                    </tr>
                                    {% set total = 0 %}
                                    {% set totalFinal = 0 %}
                                    {% for id, qty in items %}
                                        {% for product in products if product.product_id == id %}                                
                                            {% if product.final_price|round(2,\"common\") == '0' %}
                                                {% set productFinalPrice = product.product_price|round(2,\"common\") %}
                                            {% else %}
                                                {% set productFinalPrice = product.final_price|round(2,\"common\") %}
                                            {% endif %}                                
                                        <tr>
                                            <td>{{ product.product_name }}</td>
                                            <td>{{ product.product_price|round(2,\"common\") }}zł</td>
                                            <td>{{ productFinalPrice|round(2,\"common\") }}zł</td>
                                            <td><div class=\"row\">
                                            <form action=\"index.php\" method=\"GET\">
                                                    <input type=\"hidden\" value=\"shop\" name=\"site\" />
                                                    <input type=\"hidden\" value=\"cart\" name=\"view\" />
                                                    <input type=\"text\" class=\"form-control\" value=\"{{ qty }}\" name=\"qty\" />
                                                    <input type=\"hidden\" value=\"{{ id }}\" name=\"productId\" />
                                                    <input type=\"hidden\" value=\"update\" name=\"action\" />
                                                    <input type=\"submit\" value=\"aktualizuj\" class=\"btn btn-default font11\" />
                                            </form>
                                            </td>
                                            {% set productsPrice = product.product_price * qty %}
                                            <td>{{ productsPrice|round(2,\"common\") }}  zł</td>
                                            <td><a class=\"btn btn-danger font11\" href=\"{{ url }}&action=remove&productId={{ id }}\">Usuń</a></td>
                                        </tr>
                                        
                                        {% set total = total + product.product_price * qty %}
                                        {% set totalFinal = totalFinal + productFinalPrice * qty %}
                                        {% endfor %}
                                    {% endfor %}
                                    <tr>
                                        <td><a class=\"btn btn-danger\" href=\"{{ url }}&action=empty\">Opróżnij koszyk</a></td>
                                        <td colspan=\"5\" align=\"right\">Całkowity koszt netto: {{  total|round(2,\"common\") }} zł<br/>
                                                                                Całkowity koszt brutto: {{  totalFinal|round(2,\"common\") }} zł</td>
                                    </tr>
                                    </table>
                                    <p class=\"text-left\">
                                        <div class=\"row\">
                                            <div class=\"col-md-6\">
                                                Produktów w koszyku {{items|length}}<br/>
                                                Kwota netto: {{ total|round(2,\"common\") }}zł<br/>
                                                Kwota brutto: {{ totalFinal|round(2,\"common\") }}zł<br/>
                                            </div>
                                            <div class=\"col-md-6\">
                                                {% if user is empty %}
                                                    <a class=\"btn btn-success\" href=\"index.php?site=shop&view=login\">Zaloguj się</a>
                                                {% else %}
                                                    <a class=\"btn btn-success\" id=\"continueOrder\" href=\"#\">Zamów</a>
                                                {% endif %}
                                            </div>
                                        </div>
                                    </p>
                                {% else %}
                                   <p style=\"color:#990000;\">Twój koszyk jest pusty.</p>
                                {% endif %}
                                </div>
                                <div id='order-step-2' class=\"collapse fade\" >
                                
                                
                                <strong>Koszyk - potwierdzenie</strong>
                                {% if items is not empty %}
                                    
                                
                                    <table class=\"table table-cendensed font11\">
                                    <tr>
                                        <td><strong>Produkt</strong></td>
                                        <td><strong>Cena Netto</strong></td>
                                        <td><strong>Cena Brutto</strong></td>
                                        <td><strong>Ilość</strong></td>
                                        <td><strong>Kwota</strong></td>
                                        <td></td>
                                    </tr>
                                    {% set total = 0 %}
                                    {% set totalFinal = 0 %}
                                    {% for id, qty in items %}
                                        {% for product in products if product.product_id == id %}                                
                                            {% if product.final_price|round(2,\"common\") == '0' %}
                                                {% set productFinalPrice = product.product_price|round(2,\"common\") %}
                                            {% else %}
                                                {% set productFinalPrice = product.final_price|round(2,\"common\") %}
                                            {% endif %}
                                        <tr>
                                            <td>{{ product.product_name }}</td>
                                            <td>{{ product.product_price|round(2,\"common\") }}zł</td>
                                            <td>{{ productFinalPrice }}zł</td>
                                            <td>{{ qty }}</td>
                                            <td>{{ product.product_price * qty }}  zł</td>
                                        </tr>
                                        
                                        {% set total = total + product.product_price * qty %}
                                        {% set totalFinal = totalFinal + productFinalPrice * qty %}
                                        {% endfor %}
                                    {% endfor %}
                                    <tr>
                                        <td colspan=\"6\" align=\"right\">Całkowity koszt netto: {{  total|round(2,\"common\") }} zł<br/>
                                                                      Całkowity koszt brutto: {{  totalFinal|round(2,\"common\") }} zł</td>
                                    </tr>
                                    </table>
                                {% else %}
                                   <p style=\"color:#990000;\">Twój koszyk jest pusty.</p>
                                {% endif %}
                                <div class=\"well\">
                                    <strong>Wybierz adres wysyłki:</strong>
                                    <hr/>
                                    <div class=\"panel\">
                                        <button class=\"btn btn-default\" type=\"button\" data-toggle=\"collapse\" data-target=\"#addAddress\" aria-expanded=\"false\" aria-controls=\"addAddress\">
                                          Dodaj adres wysyłki
                                        </button>
                                        <div class=\"collapse\" id=\"addAddress\">
                                            <div class=\"well bg-grey\">
                                                <form action=\"{{url}}&perf=addUserInfo\" method=\"POST\">
                                                    Nazwa adresu: <input type=\"text\" class=\"form-control\" name=\"addressTypeName\" required/>
                                                    Nazwa firmy: <input type=\"text\" class=\"form-control\" name=\"company\"/>
                                                    Nazwisko: <input type=\"text\" class=\"form-control\" name=\"lastName\" />
                                                    Imię: <input type=\"text\" class=\"form-control\" name=\"firstName\"/>
                                                    Telefon: <input type=\"text\" class=\"form-control\" name=\"phone\"/>
                                                    Telefon 2 :<input type=\"text\" class=\"form-control\" name=\"phone2\"/>
                                                    Adres:<input type=\"text\" class=\"form-control\" name=\"address\"/>
                                                    Adres 2:<input type=\"text\" class=\"form-control\" name=\"address2\" />
                                                    Miasto: <input type=\"text\" class=\"form-control\" name=\"city\" />
                                                    Kod pocztowy: <input type=\"text\" class=\"form-control\" name=\"zip\" />
                                                    NIP: <input type=\"text\" class=\"form-control\" name=\"extraField1\" />
                                                    <input type=\"submit\" class=\"btn btn-success\" value=\"Zapisz nowy adres\"/>
                                                </form>
                                             </div>
                                         </div>
                                    </div>
                                    <form action=\"index.php?site=shop&view=doOrder\" method=\"POST\">
                                    {% for userAdress in userAddresses %}
                                        <div class=\"row\">
                                            <div class=\"col-md-2\">
                                                <input type=\"radio\" value=\"{{userAdress.user_info_id}}\" name=\"userInfoId\" {%if userAdress.address_type == \"BT\"%} checked=\"checked\" {% endif %}/> {{userAdress.address_type_name}}
                                            </div>
                                            <div class=\"col-md-2\">
                                                {{userAdress.company}}
                                            </div>
                                            <div class=\"col-md-2\">
                                                {{userAdress.first_name}} 
                                                {{userAdress.last_name}}
                                            </div>
                                            <div class=\"col-md-2\">
                                                {{userAdress.zip}} 
                                                {{userAdress.city}}
                                            </div>
                                            <div class=\"col-md-2\">
                                                {{userAdress.address_1}} 
                                                {{userAdress.address_2}}
                                            </div>
                                        </div>
                                    {% endfor %}

                                    </div>
                                    <div class=\"well\">
                                        <strong>Wybierz sposób płatności:</strong>
                                        {% for payment in paymentsMethod %}
                                            <div class=\"row\">
                                                {% if payment.payment_method_id == 1%}
                                                    <input type=\"radio\" name=\"paymentMethodId\" value=\"{{payment.payment_method_id}}\" checked> - {{payment.payment_method_name}}
                                                {% else %}
                                                    <input type=\"radio\" name=\"paymentMethodId\" value=\"{{payment.payment_method_id}}\"> - {{payment.payment_method_name}}
                                                {% endif %}
                                            </div>
                                        {% endfor %}
                                    </div>
                                    <div class=\"well\">
                                        <strong>Notatka klienta:</strong>
                                        <textarea class=\"form-control\" name=\"customerNote\" placeholder=\"Uwagi do swojego zamówienia\"></textarea>
                                    </div>
                                    <div class=\"row\">
                                        <input type=\"submit\" class=\"block-right btn btn-success\" value=\"Zamawiam\"/>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {% if info == 'addUserInfo-success' %}
        <script>
            \$(function() {
                \$( \"#order-step-2\" ).collapse();
                \$( \"#order-step-1\" ).collapse();
            });
        </script>
    {% endif %}
            <script>
            \$( \"#continueOrder\" ).click(function() {
              \$( \"#order-step-2\" ).collapse();
              \$( \"#order-step-1\" ).collapse();
            });
        </script>
{% endblock%}
", "shop-cartDetail.html.twig", "/view/shop-cartDetail.html.twig");
    }
}
