<?php

/* admin/shop-orderDetail.html.twig */
class __TwigTemplate_553a7beee6981af6c89569ec9f87929616b2b57e1de12adbc31451503277ec9e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin/base.html.twig", "admin/shop-orderDetail.html.twig", 1);
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
            if (((isset($context["info"]) ? $context["info"] : null) == "product-delete-success")) {
                // line 6
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Produkt został usunięty</div>
        ";
            } elseif ((            // line 7
(isset($context["info"]) ? $context["info"] : null) == "product-delete-fail")) {
                // line 8
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">Produkt nie został usunięty</div>
        ";
            } elseif ((            // line 9
(isset($context["info"]) ? $context["info"] : null) == "product-add-success")) {
                // line 10
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Produkt został dodany</div>
        ";
            } elseif ((            // line 11
(isset($context["info"]) ? $context["info"] : null) == "product-add-fail")) {
                // line 12
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">Produkt nie został doddany</div>
        ";
            } elseif ((            // line 13
(isset($context["info"]) ? $context["info"] : null) == "product-updateItem-success")) {
                // line 14
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Produkt został zaktualizowany</div>
        ";
            } elseif ((            // line 15
(isset($context["info"]) ? $context["info"] : null) == "product-updateItem-fail")) {
                // line 16
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">Produkt nie został zaktualizowany</div>
        ";
            } elseif ((            // line 17
(isset($context["info"]) ? $context["info"] : null) == "product-updateOrderSendTo-success")) {
                // line 18
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Wysyłka została zaktualizowana</div>
        ";
            } elseif ((            // line 19
(isset($context["info"]) ? $context["info"] : null) == "product-updateOrderSendTo-fail")) {
                // line 20
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">Wysyłka nie została zaktualizowana</div>
        ";
            } elseif ((            // line 21
(isset($context["info"]) ? $context["info"] : null) == "product-updateOrderUser-success ")) {
                // line 22
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Użytkownik został zmieniony</div>
        ";
            } elseif ((            // line 23
(isset($context["info"]) ? $context["info"] : null) == "product-updateOrderUser-fail")) {
                // line 24
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">Użytkownik nie został zmieniony</div>
        ";
            } elseif ((            // line 25
(isset($context["info"]) ? $context["info"] : null) == "product-updateOrderSendTo-success ")) {
                // line 26
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Notatka została zmieniona</div>
        ";
            } elseif ((            // line 27
(isset($context["info"]) ? $context["info"] : null) == "product-updateOrderSendTo-fail")) {
                // line 28
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">Notatka nie została zmieniona</div>
        ";
            } elseif ((            // line 29
(isset($context["info"]) ? $context["info"] : null) == "product-updateOrderPayment-success ")) {
                // line 30
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Wysyłka została zmieniona</div>
        ";
            } elseif ((            // line 31
(isset($context["info"]) ? $context["info"] : null) == "product-updateOrderPayment-fail")) {
                // line 32
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">Wysyłka nie została zmieniona</div>
        ";
            } elseif ((            // line 33
(isset($context["info"]) ? $context["info"] : null) == "updateOrderRanking-success")) {
                // line 34
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Ranking został zmieniony</div>
        ";
            } elseif ((            // line 35
(isset($context["info"]) ? $context["info"] : null) == "updateOrderRankingfail")) {
                // line 36
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">Ranking nie została zmieniony</div>
        ";
            } elseif ((            // line 37
(isset($context["info"]) ? $context["info"] : null) == "addDivideOrder-success")) {
                // line 38
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Zamówienie zostało podzielone</div>
        ";
            } elseif ((            // line 39
(isset($context["info"]) ? $context["info"] : null) == "addDivideOrder-fail")) {
                // line 40
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">Zamówienie nie zostało podzielone</div>
        ";
            } elseif ((            // line 41
(isset($context["info"]) ? $context["info"] : null) == "deleteDivideOrder-success")) {
                // line 42
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Zamówienie podzielone zostało usunięte</div>
        ";
            } elseif ((            // line 43
(isset($context["info"]) ? $context["info"] : null) == "deleteDivideOrder-fail")) {
                // line 44
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">Zamówienie podzielone nie zostało usunięte</div>
        ";
            }
            // line 46
            echo "    ";
        }
    }

    // line 49
    public function block_body($context, array $blocks = array())
    {
        // line 50
        echo "    
    <div class=\"row\">
        <div class=\"col-md-2\">
            ";
        // line 53
        $this->loadTemplate("admin/shop-menu.html.twig", "admin/shop-orderDetail.html.twig", 53)->display($context);
        // line 54
        echo "        </div>
        <div class=\"col-md-10\">
            <div class=\"well\">
                <div class=\"row\">
                    <div class=\"pull-right\">
                        <a href=\"index.php?site=admin&action=shop&act=orderDetail&orderId=";
        // line 59
        echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "order_id", array()) + 1), "html", null, true);
        echo "\">Następne zamówienie >></a>
                    </div>
                    <div class=\"pull-left\">
                        <a href=\"index.php?site=admin&action=shop&act=orderDetail&orderId=";
        // line 62
        echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "order_id", array()) - 1), "html", null, true);
        echo "\"><< Poprzednie zamówienie</a>
                    </div>
                </div>
                <div class=\"row\">
                    <div class=\"pull-left col-md-6\">
                    Zamówienie nr. ";
        // line 67
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "order_id", array()), "html", null, true);
        echo "<br/>
                    Data zamówienia: ";
        // line 68
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "cdate", array()), "d-m-Y H:i:s"), "html", null, true);
        echo "<br/>
                    Data modyfikacji: ";
        // line 69
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "mdate", array()), "d-m-Y H:i:s"), "html", null, true);
        echo "<br/>
                    Stan zamówienia: ";
        // line 70
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "order_status_name", array()), "html", null, true);
        echo "<br/>
                    <br/>
                    <br/>
                    </div>
                    <div class=\"pull-right well col-md-6\">
                         <!-- Nav tabs -->
                        <ul class=\"nav nav-tabs\" role=\"tablist\">
                            <li role=\"presentation\"><a href=\"#historia\" aria-controls=\"historia\" role=\"tab\" data-toggle=\"tab\">Historia</a></li>
                            <li role=\"presentation\"><a href=\"#status\" aria-controls=\"status\" role=\"tab\" data-toggle=\"tab\">Status</a></li>
                        </ul>
                         <div class=\"tab-content\">
                            <div role=\"tabpanel\" class=\"tab-pane fade\" id=\"historia\">
                                <table class=\"table table-condensed\">
                                    <tr>
                                        <td>Data</td>
                                        <td>Powiadomić klienta</td>
                                        <td>Status</td>
                                        <td>Komentarz</td>
                                    </tr>
                                        ";
        // line 89
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["orderHistory"]) ? $context["orderHistory"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["history"]) {
            // line 90
            echo "                                        <tr>
                                            <td>";
            // line 91
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["history"], "date_added", array()), "d-m-Y H:i:s"), "html", null, true);
            echo " </td>
                                            <td>";
            // line 92
            if (($this->getAttribute($context["history"], "customer_notified", array()) == 1)) {
                echo "Tak";
            } else {
                echo "Nie";
            }
            echo "</td>
                                            <td>";
            // line 93
            echo twig_escape_filter($this->env, $this->getAttribute($context["history"], "order_status_name", array()), "html", null, true);
            echo "</td>
                                            <td>";
            // line 94
            echo twig_escape_filter($this->env, $this->getAttribute($context["history"], "comments", array()), "html", null, true);
            echo "</td>
                                            </tr>
                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['history'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 97
        echo "                                </table>
                            </div>
                            <div role=\"tabpanel\" class=\"tab-pane fade \" id=\"status\">
                                <form method=\"POST\" class=\"form\" action=\"index.php?site=admin&action=shop&act=orderDetail&orderId=";
        // line 100
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "order_id", array()), "html", null, true);
        echo "&perf=updateOrderStatus\">
                                    <select class=\"form-control\" name=\"inputStatus\">
                                    ";
        // line 102
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["orderStatuses"]) ? $context["orderStatuses"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["orderStatus"]) {
            // line 103
            echo "                                        ";
            if (($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "order_status_name", array()) == $this->getAttribute($context["orderStatus"], "order_status_name", array()))) {
                // line 104
                echo "                                            <option selected value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["orderStatus"], "order_status_code", array()), "html", null, true);
                echo "\" >";
                echo twig_escape_filter($this->env, $this->getAttribute($context["orderStatus"], "order_status_name", array()), "html", null, true);
                echo "</option>
                                        ";
            } else {
                // line 106
                echo "                                            <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["orderStatus"], "order_status_code", array()), "html", null, true);
                echo "\" >";
                echo twig_escape_filter($this->env, $this->getAttribute($context["orderStatus"], "order_status_name", array()), "html", null, true);
                echo "</option>
                                        ";
            }
            // line 108
            echo "                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['orderStatus'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 109
        echo "                                    </select>
                                    <strong>Komentarz</strong>
                                    <textarea class=\"form-control\" name=\"comments\"></textarea>
                                    <input type=\"submit\" class=\"btn btn-default\" value=\"Zapisz\"/>
                                </form>
                            </div>
                          </div>
                    </div>
                </div>
                <div class=\"row\">
                    <div class=\"col-md-6\">
                        <strong>Rachunek</strong><br/>  
                        <table class=\"table table-bordered \">
                        <tr>
                            <td>E-mail:</td>
                            <td>";
        // line 124
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "user_email", array()), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <td>Nazwa firmy:</td>
                            <td>";
        // line 128
        echo twig_escape_filter($this->env, twig_replace_filter($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "company", array()), array("&quot;" => "\"")), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <td>Imię i Nazwisko:</td>
                            <td><a href=\"index.php?site=admin&action=shop&act=users&show=userDetail&userId=";
        // line 132
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "user_id", array()), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "first_name", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "last_name", array()), "html", null, true);
        echo "</a></td>
                        </tr>
                        <tr>
                            <td>Ulica:</td>
                            <td>";
        // line 136
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "address_1", array()), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <td>Miasto:</td>
                            <td>";
        // line 140
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "city", array()), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <td>Kod pocztowy:</td>
                            <td>";
        // line 144
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "zip", array()), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <td>Telefon:</td>
                            <td>";
        // line 148
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "phone_1", array()), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <td>Telefon kom.:</td>
                            <td>";
        // line 152
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "phone_2", array()), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <td>Numer NIP:</td>
                            <td>";
        // line 156
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "extra_field_1", array()), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <td>Konsultant:</td>
                            <td>";
        // line 160
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "extra_field_2", array()), "html", null, true);
        echo " -";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "konsultantId", array()), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "konsultantFirstName", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "konsultantLastName", array()), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <td>Zmień użytkownika:</td>
                            <td>
                                <form class=\"form-horizontal\" action=\"index.php?site=admin&action=shop&act=orderDetail&orderId=";
        // line 165
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "order_id", array()), "html", null, true);
        echo "&perf=updateOrderUser\" method=\"POST\">
                                    <select name=\"userId\" class=\"form-control\">
                                        <option>Wybierz użytkownika</option>
                                        ";
        // line 168
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 169
            echo "                                            ";
            if (($this->getAttribute($context["user"], "id", array()) == $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "user_id", array()))) {
                // line 170
                echo "                                                <option selected value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "id", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "username", array()), "html", null, true);
                echo " - ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "name", array()), "html", null, true);
                echo "</option>
                                            ";
            } else {
                // line 172
                echo "                                                <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "id", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "username", array()), "html", null, true);
                echo " - ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "name", array()), "html", null, true);
                echo "</option>
                                            ";
            }
            // line 174
            echo "                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 175
        echo "                                    </select>
                                    <input type=\"submit\" class=\"btn btn-default\" value=\"Zmień\">
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>Zmień dane faktury</td>
                            <td><a href=\"index.php?site=admin&action=shop&act=orderEdit&orderId=";
        // line 182
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "order_id", array()), "html", null, true);
        echo "\" class=\"btn btn-default\">Zmień</a></td>
                        </tr>
                         </table>
                    </div>
                    <div class=\"col-md-6\">
                        <strong>Wysyłka do</strong>
                        ";
        // line 188
        $context["countAddresses"] = twig_length_filter($this->env, (isset($context["orderSendAddress"]) ? $context["orderSendAddress"] : null));
        // line 189
        echo "                                ";
        if (((isset($context["countAddresses"]) ? $context["countAddresses"] : null) > 1)) {
            // line 190
            echo "                                    ";
            $context["addType"] = "ST";
            // line 191
            echo "                                ";
        } else {
            // line 192
            echo "                                    ";
            $context["addType"] = "BT";
            // line 193
            echo "                                ";
        }
        // line 194
        echo "                                ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["orderSendAddress"]) ? $context["orderSendAddress"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["userSendTo"]) {
            echo " 
                                    ";
            // line 195
            if (($this->getAttribute($context["userSendTo"], "address_type", array()) == (isset($context["addType"]) ? $context["addType"] : null))) {
                // line 196
                echo "                                        <table class=\"table table-bordered\">
                                        <tr>
                                            <td>Alias:</td>
                                            <td>";
                // line 199
                echo twig_escape_filter($this->env, $this->getAttribute($context["userSendTo"], "address_type_name", array()), "html", null, true);
                echo "</td>
                                        </tr>
                                        <tr>
                                            <td>Nazwa firmy:</td>
                                            <td>";
                // line 203
                echo twig_escape_filter($this->env, twig_replace_filter($this->getAttribute($context["userSendTo"], "company", array()), array("&quot;" => "\"")), "html", null, true);
                echo "</td>
                                        </tr>
                                        <tr>
                                            <td>Imię i Nazwisko:</td>
                                            <td>";
                // line 207
                echo twig_escape_filter($this->env, $this->getAttribute($context["userSendTo"], "first_name", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["userSendTo"], "last_name", array()), "html", null, true);
                echo "</td>
                                        </tr>
                                        <tr>
                                            <td>Ulica:</td>
                                            <td>";
                // line 211
                echo twig_escape_filter($this->env, $this->getAttribute($context["userSendTo"], "address_1", array()), "html", null, true);
                echo "</td>
                                        </tr>
                                        <tr>
                                            <td>Miasto:</td>
                                            <td>";
                // line 215
                echo twig_escape_filter($this->env, $this->getAttribute($context["userSendTo"], "city", array()), "html", null, true);
                echo "</td>
                                        </tr>
                                        <tr>
                                            <td>Kod pocztowy:</td>
                                            <td>";
                // line 219
                echo twig_escape_filter($this->env, $this->getAttribute($context["userSendTo"], "zip", array()), "html", null, true);
                echo "</td>
                                        </tr>
                                        <tr>
                                            <td>Telefon:</td>
                                            <td>";
                // line 223
                echo twig_escape_filter($this->env, $this->getAttribute($context["userSendTo"], "phone_1", array()), "html", null, true);
                echo "</td>
                                        </tr>
                                        <tr>
                                            <td>Telefon kom.:</td>
                                            <td>";
                // line 227
                echo twig_escape_filter($this->env, $this->getAttribute($context["userSendTo"], "phone_2", array()), "html", null, true);
                echo "</td>
                                        </tr>
                                        <tr>
                                            <td>Numer NIP:</td>
                                            <td>";
                // line 231
                echo twig_escape_filter($this->env, $this->getAttribute($context["userSendTo"], "extra_field_1", array()), "html", null, true);
                echo "</td>
                                        </tr>
                                        
                            <tr>
                                <td>Zmień na gotowy adres wysyłki: </td>
                                <td>
                                    <form class=\"form-horizontal\" action=\"index.php?site=admin&action=shop&act=orderDetail&orderId=";
                // line 237
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "order_id", array()), "html", null, true);
                echo "&perf=updateOrderSendTo\" method=\"POST\">
                                        <select name=\"userInfoId\"class=\"form-control\">
                                            ";
                // line 239
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["userAddresses"]) ? $context["userAddresses"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["userAddres"]) {
                    // line 240
                    echo "                                                ";
                    if (($this->getAttribute($context["userAddres"], "user_info_id", array()) == $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "user_info_id", array()))) {
                        // line 241
                        echo "                                                    <option selected value=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["userAddres"], "user_info_id", array()), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["userAddres"], "address_type_name", array()), "html", null, true);
                        echo "</option>
                                                ";
                    } else {
                        // line 243
                        echo "                                                    <option value=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["userAddres"], "user_info_id", array()), "html", null, true);
                        echo "\"> ";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["userAddres"], "address_type_name", array()), "html", null, true);
                        echo "</option>
                                                ";
                    }
                    // line 245
                    echo "                                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['userAddres'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 246
                echo "                                        </select>
                                        <input type=\"submit\" class=\"btn btn-default\" value=\"Zmień\">
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>Zmień dane wysyłki:</td>
                                <td>
                                    <td><a href=\"index.php?site=admin&action=shop&act=orderSendEdit&orderId=";
                // line 254
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "order_id", array()), "html", null, true);
                echo "\" class=\"btn btn-default\">Zmień</a></td>
                                </td>
                            </tr>
                             </table>
                             ";
            }
            // line 259
            echo "                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['userSendTo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 260
        echo "                    </div>
                </div>
            </div>

            <div class=\"row\">
                <div class=\"well table-responsive\">
                    <table class=\"table table-bordered\">
                    <thead>
                        <tr>
                            <td><strong>Usuń</strong></td>
                            <td><strong>Ilość</strong></td>
                            <td><strong>Nazwa</strong></td>
                            <td><strong>Cena netto</strong></td>
                            <td><strong>Cena brutto</strong></td>
                            <td><strong>Podatek</strong></td>
                            <td><strong>Suma</strong></td>
                            <td><strong>Zapisz</strong></td>
                        </tr>
                    </thead>
                    ";
        // line 279
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["orderProducts"]) ? $context["orderProducts"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 280
            echo "                        <form action=\"index.php?site=admin&action=shop&act=orderDetail&orderId=";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "order_id", array()), "html", null, true);
            echo "&perf=updateItem\" method=\"POST\">
                        <input type=\"hidden\" name=\"productAttribute\" value=\"\" />
                        <tr>
                            <td><a href=\"index.php?site=admin&action=shop&act=orderDetail&orderId=";
            // line 283
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "order_id", array()), "html", null, true);
            echo "&perf=delete&orderItemId=";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "order_item_id", array()), "html", null, true);
            echo "\" class=\"btn btn-danger\">Usuń</a></td>
                            <td><input  type=\"hidden\" name=\"itemId\" value=\"";
            // line 284
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "order_item_id", array()), "html", null, true);
            echo "\"/>
                            <input style=\"width:50px\" class=\"form-control\" name=\"productQuantity\" value=\"";
            // line 285
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "product_quantity", array()), "html", null, true);
            echo "\"/></td>
                            <td>";
            // line 286
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "product_name", array()), "html", null, true);
            echo "</td>
                            <td><input style=\"width:150px\" class=\"form-control\" name=\"productPrice\" value=\"";
            // line 287
            echo twig_escape_filter($this->env, twig_round($this->getAttribute($context["item"], "product_item_price", array()), 2, "common"), "html", null, true);
            echo "\"/></td>
                            <td><input style=\"width:150px\" class=\"form-control\" name=\"productFinalPrice\" value=\"";
            // line 288
            echo twig_escape_filter($this->env, twig_round($this->getAttribute($context["item"], "product_final_price", array()), 2, "common"), "html", null, true);
            echo "\"/></td>
                            <td>";
            // line 289
            echo twig_escape_filter($this->env, ($this->getAttribute($context["item"], "tax_rate", array()) * 100), "html", null, true);
            echo "%</td>
                            <td>";
            // line 290
            echo twig_escape_filter($this->env, ($this->getAttribute($context["item"], "product_quantity", array()) * twig_round($this->getAttribute($context["item"], "product_final_price", array()), 2, "common")), "html", null, true);
            echo "</td>
                            <td><input type=\"submit\" value=\"Zapisz\" class=\"btn btn-success\"/></td>
                        </tr>
                        </form>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 295
        echo "                        <tr>
                            <td colspan=\"5\">
                            </td>
                            <td>
                                Suma netto:
                            </td>
                            <td>
                                ";
        // line 302
        echo twig_escape_filter($this->env, twig_round($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "order_subtotal", array()), 2, "common"), "html", null, true);
        echo "zł
                            </td>
                        </tr>
                        <tr>
                            <td colspan=\"5\">
                            </td>
                        
                            <td>
                                Suma:
                            </td>
                            <td>
                                ";
        // line 313
        echo twig_escape_filter($this->env, twig_round($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "order_total", array()), 2, "common"), "html", null, true);
        echo "zł
                            </td>
                        </tr>
                        <tr>
                            <td colspan=\"5\">
                            </td>
                        
                            <td>
                                Koszt administracyjny:
                            </td>
                            <td>
                            <form action=\"index.php?site=admin&action=shop&act=orderDetail&orderId=";
        // line 324
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "order_id", array()), "html", null, true);
        echo "&perf=administrationFee\" method=\"POST\">
                                <input type=\"text\" name=\"administrationFee\" value=\"";
        // line 325
        echo twig_escape_filter($this->env, twig_round($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "administrationFee", array()), 2, "common"), "html", null, true);
        echo "\" /> zł
                            </td>
                            <td>
                                <input type=\"submit\" class=\"btn btn-default\" value=\"Zapisz\"/>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=\"5\">
                            </td>
                        
                            <td>
                               Ranking:
                            </td>
                            <td>
                            <form action=\"index.php?site=admin&action=shop&act=orderDetail&orderId=";
        // line 340
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "order_id", array()), "html", null, true);
        echo "&perf=ranking\" method=\"POST\">
                                <input type=\"text\" name=\"ranking\" value=\"";
        // line 341
        echo twig_escape_filter($this->env, twig_round($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "ranking", array()), 2, "common"), "html", null, true);
        echo "\" /> zł
                            </td>
                            <td>
                                <input type=\"submit\" class=\"btn btn-default\" value=\"Zapisz\"/>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=\"5\">
                            </td>
                        
                            <td>
                               Dzielone zamówienie:
                            </td>
                            <td>
                                ";
        // line 356
        echo twig_escape_filter($this->env, (isset($context["dividedSum"]) ? $context["dividedSum"] : null), "html", null, true);
        echo " zł
                            </td>
                        </tr>
                        <tr>
                            <td colspan=\"5\">
                            </td>
                        
                            <td>
                                Obrót:
                            </td>
                            <td>
                            ";
        // line 367
        $context["ron"] = (($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "order_subtotal", array()) - $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "administrationFee", array())) - (isset($context["dividedSum"]) ? $context["dividedSum"] : null));
        // line 368
        echo "                                ";
        echo twig_escape_filter($this->env, twig_round((isset($context["ron"]) ? $context["ron"] : null), 2, "common"), "html", null, true);
        echo " zł
                            </td>
                        </tr>
                    </table>
                    
                </div>
                <div class=\"well\">
                    <form class=\"form-horizontal\" action=\"index.php?site=admin&action=shop&act=orderDetail&orderId=";
        // line 375
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "order_id", array()), "html", null, true);
        echo "&perf=add\" method=\"POST\">
                    <div class=\"col-md-2\">
                        <strong>Dodaj produkt</strong>
                    </div>
                    <div class=\"col-md-6\">
                        <select name=\"itemId\" class=\"form-control\">
                            <option>Wybierz produkt</option>
                            ";
        // line 382
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["products"]) ? $context["products"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 383
            echo "                                <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "product_id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "product_name", array()), "html", null, true);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 385
        echo "                        </select>
                        
                    </div>
                    <div class=\"col-md-2\">
                        <input type=\"submit\" class=\"btn btn-primary\" value=\"Dodaj\">
                    </div>
                    </form>
                    <br/>
                </div>
                <div class=\"well\">
                    <strong>Informacje o wysyłce</strong><br/>
                    <div class=\"col-md-6\">
                        Metoda płatności: ";
        // line 397
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "payment_method_name", array()), "html", null, true);
        echo "<br/>
                        <form action='index.php?site=admin&action=shop&act=orderDetail&orderId=";
        // line 398
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "order_id", array()), "html", null, true);
        echo "&perf=paymentsMethod' method='POST'>
                            <select name='paymentMethodId' class='form-control'>
                                ";
        // line 400
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["payments"]) ? $context["payments"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["payment"]) {
            // line 401
            echo "                                    <option value='";
            echo twig_escape_filter($this->env, $this->getAttribute($context["payment"], "payment_method_id", array()), "html", null, true);
            echo "'>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["payment"], "payment_method_name", array()), "html", null, true);
            echo "</option>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['payment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 403
        echo "                            </select>
                            <input type='submit' value='Zmień' class='btn btn-default' />
                        </form>
                    </div>
                    <div class=\"col-md-6\">
                        Rodzaj wysyłki:
                        
                    </div>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                </div>
            </div>
            <div class=\"well\">
                <strong>Notatka klienta</strong><br/>
                <form action=\"index.php?site=admin&action=shop&act=orderDetail&orderId=";
        // line 419
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "order_id", array()), "html", null, true);
        echo "&perf=updateCustomerNote\" method=\"POST\">
                    <textarea name=\"customerNote\" class=\"form-control\" rows=\"5\">";
        // line 420
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "customer_note", array()), "html", null, true);
        echo "</textarea>
                    <input type=\"hidden\" value=\"";
        // line 421
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "order_id", array()), "html", null, true);
        echo "\" name=\"\" >
                    <input type=\"submit\" class=\"btn btn-default\" value=\"Zapisz\"/>
                </form>
            </div>
            <div class=\"well\">
                <strong>Zamówienia podzielone:</strong><br/>
                <table class=\"table table-bordered\">
                ";
        // line 428
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["dividedOrders"]) ? $context["dividedOrders"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["dividedOrder"]) {
            // line 429
            echo "                    <tr>
                        <td>";
            // line 430
            echo twig_escape_filter($this->env, $this->getAttribute($context["dividedOrder"], "orderIdDi", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 431
            echo twig_escape_filter($this->env, $this->getAttribute($context["dividedOrder"], "sumDi", array()), "html", null, true);
            echo " zł</td>
                        <td>";
            // line 432
            echo twig_escape_filter($this->env, $this->getAttribute($context["dividedOrder"], "konsultantFirstName", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["dividedOrder"], "konsultantLastName", array()), "html", null, true);
            echo "</td>
                        <td><a href=\"index.php?site=admin&action=shop&act=orderDetail&orderId=";
            // line 433
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "order_id", array()), "html", null, true);
            echo "&perf=divideOrderDelete&konsultantId=";
            echo twig_escape_filter($this->env, $this->getAttribute($context["dividedOrder"], "konsultantIdDi", array()), "html", null, true);
            echo "\" class=\"btn btn-danger\">Usuń</a></td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['dividedOrder'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 436
        echo "                </table>
                <form class=\"form-inline\" action=\"index.php?site=admin&action=shop&act=orderDetail&orderId=";
        // line 437
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "order_id", array()), "html", null, true);
        echo "&perf=divideOrder\" method=\"POST\">
                    <select class=\"form-control\" name=\"konsultantId\">
                        ";
        // line 439
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["konsultanci"]) ? $context["konsultanci"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["konsultant"]) {
            // line 440
            echo "                            ";
            if ((($this->getAttribute($context["konsultant"], "konsultantId", array()) == $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "extra_field_2", array())) || ($this->getAttribute($context["konsultant"], "block", array()) == 1))) {
                // line 441
                echo "                            ";
            } else {
                // line 442
                echo "                                <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["konsultant"], "konsultantId", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["konsultant"], "konsultantFirstName", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["konsultant"], "konsultantLastName", array()), "html", null, true);
                echo "</option>
                            ";
            }
            // line 444
            echo "                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['konsultant'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 445
        echo "                    </select>
                    <input type=\"text\" style=\"width:300px;\" name=\"sum\" class=\"form-control\" placeholder=\"Kwotę przeniesiona innemu konsultantowi\"/>
                    <input type=\"submit\" value=\"Dodaj\" class=\"btn btn-default\"/>
                </form>
            </div>
        </div>
    </div>
    
";
    }

    public function getTemplateName()
    {
        return "admin/shop-orderDetail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  935 => 445,  929 => 444,  919 => 442,  916 => 441,  913 => 440,  909 => 439,  904 => 437,  901 => 436,  890 => 433,  884 => 432,  880 => 431,  876 => 430,  873 => 429,  869 => 428,  859 => 421,  855 => 420,  851 => 419,  833 => 403,  822 => 401,  818 => 400,  813 => 398,  809 => 397,  795 => 385,  784 => 383,  780 => 382,  770 => 375,  759 => 368,  757 => 367,  743 => 356,  725 => 341,  721 => 340,  703 => 325,  699 => 324,  685 => 313,  671 => 302,  662 => 295,  651 => 290,  647 => 289,  643 => 288,  639 => 287,  635 => 286,  631 => 285,  627 => 284,  621 => 283,  614 => 280,  610 => 279,  589 => 260,  583 => 259,  575 => 254,  565 => 246,  559 => 245,  551 => 243,  543 => 241,  540 => 240,  536 => 239,  531 => 237,  522 => 231,  515 => 227,  508 => 223,  501 => 219,  494 => 215,  487 => 211,  478 => 207,  471 => 203,  464 => 199,  459 => 196,  457 => 195,  450 => 194,  447 => 193,  444 => 192,  441 => 191,  438 => 190,  435 => 189,  433 => 188,  424 => 182,  415 => 175,  409 => 174,  399 => 172,  389 => 170,  386 => 169,  382 => 168,  376 => 165,  362 => 160,  355 => 156,  348 => 152,  341 => 148,  334 => 144,  327 => 140,  320 => 136,  309 => 132,  302 => 128,  295 => 124,  278 => 109,  272 => 108,  264 => 106,  256 => 104,  253 => 103,  249 => 102,  244 => 100,  239 => 97,  230 => 94,  226 => 93,  218 => 92,  214 => 91,  211 => 90,  207 => 89,  185 => 70,  181 => 69,  177 => 68,  173 => 67,  165 => 62,  159 => 59,  152 => 54,  150 => 53,  145 => 50,  142 => 49,  137 => 46,  133 => 44,  131 => 43,  128 => 42,  126 => 41,  123 => 40,  121 => 39,  118 => 38,  116 => 37,  113 => 36,  111 => 35,  108 => 34,  106 => 33,  103 => 32,  101 => 31,  98 => 30,  96 => 29,  93 => 28,  91 => 27,  88 => 26,  86 => 25,  83 => 24,  81 => 23,  78 => 22,  76 => 21,  73 => 20,  71 => 19,  68 => 18,  66 => 17,  63 => 16,  61 => 15,  58 => 14,  56 => 13,  53 => 12,  51 => 11,  48 => 10,  46 => 9,  43 => 8,  41 => 7,  38 => 6,  35 => 5,  32 => 4,  29 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "admin/shop-orderDetail.html.twig", "/view/admin/shop-orderDetail.html.twig");
    }
}
