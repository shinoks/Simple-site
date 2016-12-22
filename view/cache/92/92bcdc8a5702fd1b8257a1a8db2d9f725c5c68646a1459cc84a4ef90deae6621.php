<?php

/* shop-info.html.twig */
class __TwigTemplate_8e005ab105a33d99998d54077849a0ac19891fc8b53c00d1e7900f926072fe60 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'info' => array($this, 'block_info'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('info', $context, $blocks);
    }

    public function block_info($context, array $blocks = array())
    {
        // line 2
        echo "    <div class=\"well text-center\">
        Zalogowany konsultant <b>";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["session"]) ? $context["session"] : null), "fN", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["session"]) ? $context["session"] : null), "lN", array()), "html", null, true);
        echo "  <a href=\"index.php?action=logoutKonsultant\" class=\"btn btn-default\">Zmień konsultanta</a></b>
    </div>

    ";
        // line 6
        if (array_key_exists("info", $context)) {
            // line 7
            echo "        ";
            if (((isset($context["info"]) ? $context["info"] : null) == "cart-add")) {
                // line 8
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Produkt został dodany do koszyka</div>
        ";
            } elseif ((            // line 9
(isset($context["info"]) ? $context["info"] : null) == "cart-updated")) {
                // line 10
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Produkt został zaktualizowany</div>
        ";
            } elseif ((            // line 11
(isset($context["info"]) ? $context["info"] : null) == "cart-removed")) {
                // line 12
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Produkt został usunięty</div>
        ";
            } elseif ((            // line 13
(isset($context["info"]) ? $context["info"] : null) == "cart-empty")) {
                // line 14
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Koszyk został opróżniony</div>
        ";
            } elseif ((            // line 15
(isset($context["info"]) ? $context["info"] : null) == "login-success")) {
                // line 16
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Klient został poprawnie zalogowany</div>
        ";
            } elseif ((            // line 17
(isset($context["info"]) ? $context["info"] : null) == "login-fail")) {
                // line 18
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">Nie zostałeś zalogowany</div>
        ";
            } elseif ((            // line 19
(isset($context["info"]) ? $context["info"] : null) == "logout-success")) {
                // line 20
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Klient został wylogowany</div>
        ";
            } elseif ((            // line 21
(isset($context["info"]) ? $context["info"] : null) == "logout-fail")) {
                // line 22
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">Nie zostałeś wylogowany</div>
        ";
            } elseif ((            // line 23
(isset($context["info"]) ? $context["info"] : null) == "deleteOrder-success")) {
                // line 24
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Zamówienie zostało usunięte</div>
        ";
            } elseif ((            // line 25
(isset($context["info"]) ? $context["info"] : null) == "deleteOrder-fail")) {
                // line 26
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">Zamówienie nie zostało usunięte</div>
        ";
            } elseif ((            // line 27
(isset($context["info"]) ? $context["info"] : null) == "updateOrderStatus-success")) {
                // line 28
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Status zamówienia został zmieniony</div>
        ";
            } elseif ((            // line 29
(isset($context["info"]) ? $context["info"] : null) == "updateOrderStatus-fail")) {
                // line 30
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">Status zamówienia nie został zmieniony</div>
        ";
            } elseif ((            // line 31
(isset($context["info"]) ? $context["info"] : null) == "updateUserInfo-success")) {
                // line 32
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Dane do Faktury użytkownika zostały zmienione</div>
        ";
            } elseif ((            // line 33
(isset($context["info"]) ? $context["info"] : null) == "updateUserInfo-fail")) {
                // line 34
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">Dane do Faktury użytkownika nie zostały zmienione</div>
        ";
            } elseif ((            // line 35
(isset($context["info"]) ? $context["info"] : null) == "updateUserData-success")) {
                // line 36
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Dane użytkownika zostały zmienione</div>
        ";
            } elseif ((            // line 37
(isset($context["info"]) ? $context["info"] : null) == "updateUserData-fail")) {
                // line 38
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">Dane użytkownika nie zostały zmienione</div>
        ";
            } elseif ((            // line 39
(isset($context["info"]) ? $context["info"] : null) == "addUserInfo-success")) {
                // line 40
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Adres wysyłki został dodany</div>
        ";
            } elseif ((            // line 41
(isset($context["info"]) ? $context["info"] : null) == "addUserInfo-fail")) {
                // line 42
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">Adres wysyłki nie został dodany</div>
        ";
            } elseif ((            // line 43
(isset($context["info"]) ? $context["info"] : null) == "deleteUserInfo-success")) {
                // line 44
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Adres wysyłki został usunięty</div>
        ";
            } elseif ((            // line 45
(isset($context["info"]) ? $context["info"] : null) == "deleteUserInfo-fail")) {
                // line 46
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">Adres wysyłki nie został usunięty</div>
        ";
            } elseif ((            // line 47
(isset($context["info"]) ? $context["info"] : null) == "shop-doOrder-success-addOrder")) {
                // line 48
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Zamówienie zostało złożone</div>
        ";
            } elseif ((            // line 49
(isset($context["info"]) ? $context["info"] : null) == "shop-doOrder-fail-addOrder")) {
                // line 50
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">Niestety zamówienie nie zostało zapisane</div>
        ";
            } elseif ((            // line 51
(isset($context["info"]) ? $context["info"] : null) == "shop-addNewUser-success")) {
                // line 52
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Użytkownik został utworzony. Zaloguj się.</div>
        ";
            } elseif ((            // line 53
(isset($context["info"]) ? $context["info"] : null) == "shop-addNewUser-fail")) {
                // line 54
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">Użytkownik nie został utworzony.</div>
        ";
            } elseif ((            // line 55
(isset($context["info"]) ? $context["info"] : null) == "shop-updateSendInfo-success")) {
                // line 56
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Dane do wysyłki zmienione.</div>
        ";
            } elseif ((            // line 57
(isset($context["info"]) ? $context["info"] : null) == "shop-updateSendInfo-fail")) {
                // line 58
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">Dane do wysyłki nie zostały zmienione</div>
        ";
            }
            // line 60
            echo "    ";
        }
        // line 61
        echo "    
    ";
        // line 62
        if (((((isset($context["error"]) ? $context["error"] : null) != true) && array_key_exists("error", $context)) &&  !twig_test_empty((isset($context["error"]) ? $context["error"] : null)))) {
            // line 63
            echo "        ";
            $context["error"] = twig_split_filter($this->env, (isset($context["error"]) ? $context["error"] : null), ";");
            // line 64
            echo "        <div class=\"alert alert-danger text-center\" rolet=\"alert\">
            Poniższe pola nie zostały wypełnione:<br/>
            ";
            // line 66
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["error"]) ? $context["error"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["er"]) {
                // line 67
                echo "                ";
                echo twig_escape_filter($this->env, $context["er"], "html", null, true);
                echo ", 
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['er'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 69
            echo "        </div>
    ";
        }
    }

    public function getTemplateName()
    {
        return "shop-info.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  199 => 69,  190 => 67,  186 => 66,  182 => 64,  179 => 63,  177 => 62,  174 => 61,  171 => 60,  167 => 58,  165 => 57,  162 => 56,  160 => 55,  157 => 54,  155 => 53,  152 => 52,  150 => 51,  147 => 50,  145 => 49,  142 => 48,  140 => 47,  137 => 46,  135 => 45,  132 => 44,  130 => 43,  127 => 42,  125 => 41,  122 => 40,  120 => 39,  117 => 38,  115 => 37,  112 => 36,  110 => 35,  107 => 34,  105 => 33,  102 => 32,  100 => 31,  97 => 30,  95 => 29,  92 => 28,  90 => 27,  87 => 26,  85 => 25,  82 => 24,  80 => 23,  77 => 22,  75 => 21,  72 => 20,  70 => 19,  67 => 18,  65 => 17,  62 => 16,  60 => 15,  57 => 14,  55 => 13,  52 => 12,  50 => 11,  47 => 10,  45 => 9,  42 => 8,  39 => 7,  37 => 6,  29 => 3,  26 => 2,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% block info %}
    <div class=\"well text-center\">
        Zalogowany konsultant <b>{{session.fN}} {{session.lN}}  <a href=\"index.php?action=logoutKonsultant\" class=\"btn btn-default\">Zmień konsultanta</a></b>
    </div>

    {% if info is defined %}
        {% if info == 'cart-add'%}
            <div class=\"alert alert-success text-center\" role=\"alert\">Produkt został dodany do koszyka</div>
        {% elseif info == 'cart-updated'%}
            <div class=\"alert alert-success text-center\" role=\"alert\">Produkt został zaktualizowany</div>
        {% elseif info == 'cart-removed'%}
            <div class=\"alert alert-success text-center\" role=\"alert\">Produkt został usunięty</div>
        {% elseif info == 'cart-empty' %}
            <div class=\"alert alert-success text-center\" role=\"alert\">Koszyk został opróżniony</div>
        {% elseif info == 'login-success' %}
            <div class=\"alert alert-success text-center\" role=\"alert\">Klient został poprawnie zalogowany</div>
        {% elseif info == 'login-fail' %}
            <div class=\"alert alert-danger text-center\" role=\"alert\">Nie zostałeś zalogowany</div>
        {% elseif info == 'logout-success' %}
            <div class=\"alert alert-success text-center\" role=\"alert\">Klient został wylogowany</div>
        {% elseif info == 'logout-fail' %}
            <div class=\"alert alert-danger text-center\" role=\"alert\">Nie zostałeś wylogowany</div>
        {% elseif info == 'deleteOrder-success'%}
            <div class=\"alert alert-success text-center\" role=\"alert\">Zamówienie zostało usunięte</div>
        {% elseif info == 'deleteOrder-fail'%}
            <div class=\"alert alert-danger text-center\" role=\"alert\">Zamówienie nie zostało usunięte</div>
        {% elseif info == 'updateOrderStatus-success'%}
            <div class=\"alert alert-success text-center\" role=\"alert\">Status zamówienia został zmieniony</div>
        {% elseif info == 'updateOrderStatus-fail'%}
            <div class=\"alert alert-danger text-center\" role=\"alert\">Status zamówienia nie został zmieniony</div>
        {% elseif info == 'updateUserInfo-success'%}
            <div class=\"alert alert-success text-center\" role=\"alert\">Dane do Faktury użytkownika zostały zmienione</div>
        {% elseif info == 'updateUserInfo-fail'%}
            <div class=\"alert alert-danger text-center\" role=\"alert\">Dane do Faktury użytkownika nie zostały zmienione</div>
        {% elseif info == 'updateUserData-success'%}
            <div class=\"alert alert-success text-center\" role=\"alert\">Dane użytkownika zostały zmienione</div>
        {% elseif info == 'updateUserData-fail'%}
            <div class=\"alert alert-danger text-center\" role=\"alert\">Dane użytkownika nie zostały zmienione</div>
        {% elseif info == 'addUserInfo-success'%}
            <div class=\"alert alert-success text-center\" role=\"alert\">Adres wysyłki został dodany</div>
        {% elseif info == 'addUserInfo-fail'%}
            <div class=\"alert alert-danger text-center\" role=\"alert\">Adres wysyłki nie został dodany</div>
        {% elseif info == 'deleteUserInfo-success'%}
            <div class=\"alert alert-success text-center\" role=\"alert\">Adres wysyłki został usunięty</div>
        {% elseif info == 'deleteUserInfo-fail'%}
            <div class=\"alert alert-danger text-center\" role=\"alert\">Adres wysyłki nie został usunięty</div>
        {% elseif info == 'shop-doOrder-success-addOrder'%}
            <div class=\"alert alert-success text-center\" role=\"alert\">Zamówienie zostało złożone</div>
        {% elseif info == 'shop-doOrder-fail-addOrder'%}
            <div class=\"alert alert-danger text-center\" role=\"alert\">Niestety zamówienie nie zostało zapisane</div>
        {% elseif info == 'shop-addNewUser-success'%}
            <div class=\"alert alert-success text-center\" role=\"alert\">Użytkownik został utworzony. Zaloguj się.</div>
        {% elseif info == 'shop-addNewUser-fail'%}
            <div class=\"alert alert-danger text-center\" role=\"alert\">Użytkownik nie został utworzony.</div>
        {% elseif info == 'shop-updateSendInfo-success'%}
            <div class=\"alert alert-success text-center\" role=\"alert\">Dane do wysyłki zmienione.</div>
        {% elseif info == 'shop-updateSendInfo-fail'%}
            <div class=\"alert alert-danger text-center\" role=\"alert\">Dane do wysyłki nie zostały zmienione</div>
        {% endif %}
    {% endif %}
    
    {% if error != true and error is defined and error is not empty %}
        {% set error = error|split(';') %}
        <div class=\"alert alert-danger text-center\" rolet=\"alert\">
            Poniższe pola nie zostały wypełnione:<br/>
            {% for er in error %}
                {{er}}, 
            {% endfor %}
        </div>
    {% endif %}
{% endblock %}", "shop-info.html.twig", "/view/shop-info.html.twig");
    }
}
