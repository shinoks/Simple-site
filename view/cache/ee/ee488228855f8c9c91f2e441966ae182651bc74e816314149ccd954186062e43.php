<?php

/* admin/shop-userDetail.html.twig */
class __TwigTemplate_5dbe32fefb85ba5185da4a99aadbf53842d71c8a95a46299f9d9a1969c0f6da7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin/base.html.twig", "admin/shop-userDetail.html.twig", 1);
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
            } elseif ((            // line 13
(isset($context["info"]) ? $context["info"] : null) == "updateUserInfo-success")) {
                // line 14
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Dane do Faktury użytkownika zostały zmienione</div>
        ";
            } elseif ((            // line 15
(isset($context["info"]) ? $context["info"] : null) == "updateUserInfo-fail")) {
                // line 16
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">Dane do Faktury użytkownika nie zostały zmienione</div>
        ";
            } elseif ((            // line 17
(isset($context["info"]) ? $context["info"] : null) == "updateUserData-success")) {
                // line 18
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Dane użytkownika zostały zmienione</div>
        ";
            } elseif ((            // line 19
(isset($context["info"]) ? $context["info"] : null) == "updateUserData-fail")) {
                // line 20
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">Dane użytkownika nie zostały zmienione</div>
        ";
            } elseif ((            // line 21
(isset($context["info"]) ? $context["info"] : null) == "addUserInfo-success")) {
                // line 22
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Adres wysyłki został dodany</div>
        ";
            } elseif ((            // line 23
(isset($context["info"]) ? $context["info"] : null) == "addUserInfo-fail")) {
                // line 24
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">Adres wysyłki nie został dodany</div>
        ";
            } elseif ((            // line 25
(isset($context["info"]) ? $context["info"] : null) == "deleteUserInfo-success")) {
                // line 26
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Adres wysyłki został usunięty</div>
        ";
            } elseif ((            // line 27
(isset($context["info"]) ? $context["info"] : null) == "deleteUserInfo-fail")) {
                // line 28
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">Adres wysyłki nie został usunięty</div>
        ";
            }
            // line 30
            echo "    ";
        }
    }

    // line 33
    public function block_body($context, array $blocks = array())
    {
        // line 34
        $context["url"] = ("index.php?site=admin&action=shop&act=users&show=userDetail&userId=" . $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id", array()));
        // line 35
        echo "    <div class=\"row\">
        <div class=\"pull-right\">
            <a href=\"index.php?site=admin&action=shop&act=users\" class=\"btn btn-default\">Powrót do listy użytkowników</a>
        </div>
        <br/><br/>
    </div>
    
    <div class=\"row\">
        <div class=\"col-md-2\">
            ";
        // line 44
        $this->loadTemplate("admin/shop-menu.html.twig", "admin/shop-userDetail.html.twig", 44)->display($context);
        // line 45
        echo "        </div>
        <div class=\"col-md-10 bg-white\">
            <div class=\"row\">
            <div class=\"col-md-5\">
            <div class=\"pull-left\">
            Data utworzenia: ";
        // line 50
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "registerDate", array()), "d-m-Y H:i:s"), "html", null, true);
        echo "
            </div>
            <form action=\"";
        // line 52
        echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
        echo "&perf=updateUserInfo\" method=\"POST\">
            <div class=\"pull-right\">
                <input type=\"submit\" class=\"btn btn-success\" value=\"Zapisz\"/>
            </div>
            <br/><br/>
            <table class=\"table table-bordered\">
                <tr>
                    <td>
                        Nazwa firmy
                    </td>
                    <td>
                        <input type=\"text\" class=\"form-control\" name=\"company\" value=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "company", array()), "html", null, true);
        echo "\"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Imię
                    </td>
                    <td>
                        <input type=\"text\" class=\"form-control\" name=\"firstName\" value=\"";
        // line 71
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "first_name", array()), "html", null, true);
        echo "\"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Nazwisko
                    </td>
                    <td>
                        <input type=\"text\" class=\"form-control\" name=\"lastName\" value=\"";
        // line 79
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "last_name", array()), "html", null, true);
        echo "\"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Email
                    </td>
                    <td>
                        <input type=\"text\" class=\"form-control\" name=\"email\" value=\"";
        // line 87
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "email", array()), "html", null, true);
        echo "\"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Telefon
                    </td>
                    <td>
                        <input type=\"text\" class=\"form-control\" name=\"phone1\" value=\"";
        // line 95
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "phone_1", array()), "html", null, true);
        echo "\"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Telefon 2
                    </td>
                    <td>
                        <input type=\"text\" class=\"form-control\" name=\"phone2\" value=\"";
        // line 103
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "phone_2", array()), "html", null, true);
        echo "\"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Ulica
                    </td>
                    <td>
                        <input type=\"text\" class=\"form-control\" name=\"address1\" value=\"";
        // line 111
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "address_1", array()), "html", null, true);
        echo "\"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Miasto
                    </td>
                    <td>
                        <input type=\"text\" class=\"form-control\" name=\"city\" value=\"";
        // line 119
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "city", array()), "html", null, true);
        echo "\"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Kod pocztowy
                    </td>
                    <td>
                        <input type=\"text\" class=\"form-control\" name=\"zip\" value=\"";
        // line 127
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "zip", array()), "html", null, true);
        echo "\"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        NIP
                    </td>
                    <td>
                        <input type=\"text\" class=\"form-control\" name=\"extraField1\" value=\"";
        // line 135
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "extra_field_1", array()), "html", null, true);
        echo "\"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Konsultant
                    </td>
                    <td>
                        <input type=\"text\" class=\"form-control\" name=\"extraField2\" value=\"";
        // line 143
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "extra_field_2", array()), "html", null, true);
        echo "\"/>
                    </td>
                </tr>
            </table>
            </form>
            </div>
            <div class=\"col-md-7\">
                <div class=\"well\">
                    <strong>Dane użytkownika:</strong>
                    <form action=\"";
        // line 152
        echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
        echo "&perf=updateUserData\" method=\"POST\">
                        Nazwa: <input type=\"text\" class=\"form-control\" name=\"name\" value=\"";
        // line 153
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "name", array()), "html", null, true);
        echo "\"/>
                        Nazwa użytkownika: <input type=\"text\" class=\"form-control\" name=\"username\" value=\"";
        // line 154
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username", array()), "html", null, true);
        echo "\"/>
                        Email: <input type=\"text\" class=\"form-control\" name=\"email\" value=\"";
        // line 155
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "email", array()), "html", null, true);
        echo "\"/>
                        
                        <input type=\"submit\" class=\"btn btn-success\" value=\"Zapisz zmiany\"/>
                    </form>
                </div>
                <div class=\"well\">
                    <strong>Wysyłki:</strong>
                    ";
        // line 162
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["userAddresses"]) ? $context["userAddresses"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["userAddres"]) {
            // line 163
            echo "                        ";
            if ((twig_length_filter($this->env, (isset($context["userAddresses"]) ? $context["userAddresses"] : null)) == 1)) {
                // line 164
                echo "                            <br/>Brak dodatkowych adresów wysyłki
                        ";
            }
            // line 166
            echo "                        ";
            if (($this->getAttribute($context["userAddres"], "address_type", array()) == "BT")) {
                // line 167
                echo "                        ";
            } else {
                // line 168
                echo "                        <div class=\"panel\">
                            <button class=\"btn btn-default\" type=\"button\" data-toggle=\"collapse\" data-target=\"#";
                // line 169
                echo twig_escape_filter($this->env, $this->getAttribute($context["userAddres"], "user_info_id", array()), "html", null, true);
                echo "\" aria-expanded=\"false\" aria-controls=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["userAddres"], "user_info_id", array()), "html", null, true);
                echo "\">
                              ";
                // line 170
                echo twig_escape_filter($this->env, $this->getAttribute($context["userAddres"], "address_type_name", array()), "html", null, true);
                echo "
                            </button>
                            <a href=\"";
                // line 172
                echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
                echo "&perf=deleteUserInfo&userInfoId=";
                echo twig_escape_filter($this->env, $this->getAttribute($context["userAddres"], "user_info_id", array()), "html", null, true);
                echo "\" class=\"btn btn-danger\">Usuń</a>
                            <div class=\"collapse\" id=\"";
                // line 173
                echo twig_escape_filter($this->env, $this->getAttribute($context["userAddres"], "user_info_id", array()), "html", null, true);
                echo "\">
                              <div class=\"well bg-grey\">
                                <form action=\"";
                // line 175
                echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
                echo "&perf=updateUserInfo\" method=\"POST\">
                                    <input type=\"hidden\" class=\"form-control\" name=\"addressTypeName\" value=\"";
                // line 176
                echo twig_escape_filter($this->env, $this->getAttribute($context["userAddres"], "address_type_name", array()), "html", null, true);
                echo "\"/>
                                    Nazwa firmy: <input type=\"text\" class=\"form-control\" name=\"company\" value=\"";
                // line 177
                echo twig_escape_filter($this->env, $this->getAttribute($context["userAddres"], "company", array()), "html", null, true);
                echo "\"/>
                                    Nazwisko: <input type=\"text\" class=\"form-control\" name=\"lastName\" value=\"";
                // line 178
                echo twig_escape_filter($this->env, $this->getAttribute($context["userAddres"], "last_name", array()), "html", null, true);
                echo "\"/>
                                    Imię: <input type=\"text\" class=\"form-control\" name=\"firstName\" value=\"";
                // line 179
                echo twig_escape_filter($this->env, $this->getAttribute($context["userAddres"], "first_name", array()), "html", null, true);
                echo "\"/>
                                    Telefon: <input type=\"text\" class=\"form-control\" name=\"phone\" value=\"";
                // line 180
                echo twig_escape_filter($this->env, $this->getAttribute($context["userAddres"], "phone_1", array()), "html", null, true);
                echo "\"/>
                                    Adres:<input type=\"text\" class=\"form-control\" name=\"address\" value=\"";
                // line 181
                echo twig_escape_filter($this->env, $this->getAttribute($context["userAddres"], "address_1", array()), "html", null, true);
                echo "\"/>
                                    Miasto: <input type=\"text\" class=\"form-control\" name=\"city\" value=\"";
                // line 182
                echo twig_escape_filter($this->env, $this->getAttribute($context["userAddres"], "city", array()), "html", null, true);
                echo "\"/>
                                    NIP: <input type=\"text\" class=\"form-control\" name=\"extraField1\" value=\"";
                // line 183
                echo twig_escape_filter($this->env, $this->getAttribute($context["userAddres"], "extra_field_1", array()), "html", null, true);
                echo "\"/>
                                    <input type=\"submit\" class=\"btn btn-success\" value=\"Zapisz zmiany\"/>
                                </form>
                              </div>
                            </div>
                        </div>
                        ";
            }
            // line 190
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['userAddres'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 191
        echo "                    <br/>
                    <div class=\"panel\">
                            <button class=\"btn btn-default\" type=\"button\" data-toggle=\"collapse\" data-target=\"#addAddress\" aria-expanded=\"false\" aria-controls=\"addAddress\">
                              Dodaj adres wysyłki
                            </button>
                            <div class=\"collapse\" id=\"addAddress\">
                              <div class=\"well bg-grey\">
                                <form action=\"";
        // line 198
        echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
        echo "&perf=addUserInfo\" method=\"POST\">
                                    Nazwa adresu: <input type=\"text\" class=\"form-control\" name=\"addressTypeName\" required/>
                                    Nazwa firmy: <input type=\"text\" class=\"form-control\" name=\"company\"/>
                                    Nazwisko: <input type=\"text\" class=\"form-control\" name=\"lastName\" />
                                    Imię: <input type=\"text\" class=\"form-control\" name=\"firstName\"/>
                                    Telefon: <input type=\"text\" class=\"form-control\" name=\"phone1\"/>
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
                </div>
                <div class=\"well\">
                    <strong>Zamówienia:</strong>
                    <table class=\"table table-condensed\">
                    <tr>
                        <td>Lp.</td>
                        <td>Data zamówienia</td>
                        <td>Data modyfikacji</td>
                        <td>NIP</td>
                        <td>Konsultant</td>
                        <td>Suma</td>
                        <td>Usuń</td>
                    </tr>
                    ";
        // line 228
        $context["a"] = 1;
        // line 229
        echo "                    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["orders"]) ? $context["orders"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
            // line 230
            echo "                        <tr>
                            <td>";
            // line 231
            echo twig_escape_filter($this->env, (isset($context["a"]) ? $context["a"] : null), "html", null, true);
            echo "</td>
                            <td><a href=\"index.php?site=admin&action=shop&act=orderDetail&orderId=";
            // line 232
            echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "order_id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "order_id", array()), "html", null, true);
            echo "</a></td>
                            <td>";
            // line 233
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["order"], "cdate", array()), "d-m-Y", false), "html", null, true);
            echo "</a></td>
                            <td>";
            // line 234
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["order"], "mdate", array()), "d-m-Y", false), "html", null, true);
            echo "</a></td>
                            <td>";
            // line 235
            echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "extra_field_1", array()), "html", null, true);
            echo "</td>
                            <td><span class=\"font11\">";
            // line 236
            echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "extra_field_2", array()), "html", null, true);
            echo "</span></td>
                            <td>";
            // line 237
            echo twig_escape_filter($this->env, twig_round($this->getAttribute($context["order"], "order_subtotal", array()), 2, "common"), "html", null, true);
            echo "zł / ";
            echo twig_escape_filter($this->env, twig_round($this->getAttribute($context["order"], "order_total", array()), 2, "common"), "html", null, true);
            echo "zł</td>
                            <td><a href=\"index.php?site=admin&action=shop&perf=deleteOrder&orderId=";
            // line 238
            echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "order_id", array()), "html", null, true);
            echo "\" class=\"btn btn-danger\">Usuń</a></td>
                        </tr>
                        ";
            // line 240
            $context["a"] = ((isset($context["a"]) ? $context["a"] : null) + 1);
            // line 241
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 242
        echo "                    </table>
                </div>
            </div>
        </div>
    </div>
    
";
    }

    public function getTemplateName()
    {
        return "admin/shop-userDetail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  477 => 242,  471 => 241,  469 => 240,  464 => 238,  458 => 237,  454 => 236,  450 => 235,  446 => 234,  442 => 233,  436 => 232,  432 => 231,  429 => 230,  424 => 229,  422 => 228,  389 => 198,  380 => 191,  374 => 190,  364 => 183,  360 => 182,  356 => 181,  352 => 180,  348 => 179,  344 => 178,  340 => 177,  336 => 176,  332 => 175,  327 => 173,  321 => 172,  316 => 170,  310 => 169,  307 => 168,  304 => 167,  301 => 166,  297 => 164,  294 => 163,  290 => 162,  280 => 155,  276 => 154,  272 => 153,  268 => 152,  256 => 143,  245 => 135,  234 => 127,  223 => 119,  212 => 111,  201 => 103,  190 => 95,  179 => 87,  168 => 79,  157 => 71,  146 => 63,  132 => 52,  127 => 50,  120 => 45,  118 => 44,  107 => 35,  105 => 34,  102 => 33,  97 => 30,  93 => 28,  91 => 27,  88 => 26,  86 => 25,  83 => 24,  81 => 23,  78 => 22,  76 => 21,  73 => 20,  71 => 19,  68 => 18,  66 => 17,  63 => 16,  61 => 15,  58 => 14,  56 => 13,  53 => 12,  51 => 11,  48 => 10,  46 => 9,  43 => 8,  41 => 7,  38 => 6,  35 => 5,  32 => 4,  29 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "admin/shop-userDetail.html.twig", "/view/admin/shop-userDetail.html.twig");
    }
}
