<?php

/* shop-register.html.twig */
class __TwigTemplate_ca8c847a0bd55a248e688d83fd5837f94fc6cf338e987b488c2556730a1092d5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "shop-register.html.twig", 1);
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
        echo "<script>
    \$(document).ready(function (){
         \$(\"#nip\").change(function () {

            var nip = \$(\"#nip\").val();
            var msgbox = \$(\"#nip_lbl\");

            if (nip.length > 9) {
                \$(\"#nip_lbl\").html('Sprawdzanie poprawności email...');
                function validatenip(nip) {
                    var nip_bez_kresek = nip.replace(/-/g,\"\");
                    var reg = /^[0-9]{10}\$/;
                    if(reg.test(nip_bez_kresek) == false) {
                    return false;}
                    else
                    {
                        var dig = (\"\"+nip_bez_kresek).split(\"\");
                        var kontrola = (6*parseInt(dig[0]) + 5*parseInt(dig[1]) + 7*parseInt(dig[2]) + 2*parseInt(dig[3]) + 3*parseInt(dig[4]) + 4*parseInt(dig[5]) + 5*parseInt(dig[6]) + 6*parseInt(dig[7]) + 7*parseInt(dig[8]))%11;
                        if(parseInt(dig[9])==kontrola)
                        return true;
                        else
                        return false;
                    }
                 
                }
                
                if(validatenip(nip)==true) {
                    \$(\"#nip\").removeClass(\"text-danger\");
                    \$(\"#nip\").addClass(\"text-success\");
                    \$(\"#nip_lbl\").html('<div style=\"float:right;margin-right:20px;\"><span class=\"ui-icon ui-icon-check\"></span> <font color=\"Green\">Nip jest poprawny</font></div> ');
                } else {
                    \$(\"#nip\").removeClass(\"text-success\");
                    \$(\"#nip\").addClass(\"text-danger\");
                    \$(\"#nip_lbl\").html('<div style=\"float:right;margin-right:20px;\"><font color=\"Red\">Nip nie jest poprawny</font></div> ');
                }
                
            }
            else {
                \$(\"#nip\").addClass(\"text-danger\");
                \$(\"#nip_lbl\").html('<div style=\"float:right;margin-right:20px;\"><font color=\"Red\">Za mało znaków</font></div>');
            }
            return false;
        });
    })
</script>
    ";
        // line 49
        $context["url"] = "index.php?site=shop&view=register";
        // line 50
        echo "    <div class=\"container width-full\">
        <div class=\"well\">
            <div class=\"row\">
                <div class=\"row\">
                    <div class=\"col-md-3\">
                        ";
        // line 55
        $this->loadTemplate("shop-leftMenu.html.twig", "shop-register.html.twig", 55)->display($context);
        // line 56
        echo "                    </div>
                    <div class=\"col-md-9\">
                        <div class=\"well responsive\">
                            <div class=\"row\">
                                ";
        // line 60
        if (twig_test_empty((isset($context["user"]) ? $context["user"] : null))) {
            // line 61
            echo "                                    <form class=\"form-inline\" action=\"";
            echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
            echo "&perf=gus\" method=\"POST\">
                                        <input class=\"form-control\" type=\"text\" name=\"gusNip\" value=\"";
            // line 62
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gus"]) ? $context["gus"] : null), "nip", array()), "html", null, true);
            echo "\"/>
                                        <input type=\"submit\" value=\"Pobierz dane z gus\" class=\"btn btn-primary\"/>
                                    </form><br/>
                                    ";
            // line 65
            if ( !twig_test_empty((isset($context["gus"]) ? $context["gus"] : null))) {
                // line 66
                echo "                                        <div class=\"alert alert-success text-center\"> Dane poprawnie pobrane </div>
                                    ";
            }
            // line 68
            echo "                                    <form class=\"form-inline\" action=\"";
            echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
            echo "&perf=register\" method=\"POST\">
                                        <table class=\"table-responsive\">
                                            
                                            <tr>
                                                <td>
                                                    <label>Nazwa konta:*</label>
                                                </td>
                                                <td style=\"width:10px;\">  
                                                </td>
                                                <td>
                                                    <input style=\"width:600px;\" class=\"form-control\" type=\"text\" name=\"name\" placeholder=\"nazwa konta\" value=\"";
            // line 78
            if ( !twig_test_empty((isset($context["gus"]) ? $context["gus"] : null))) {
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gus"]) ? $context["gus"] : null), "nazwa", array()), "html", null, true);
            }
            echo "\" required/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Login:*</label>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                    <input class=\"form-control\" type=\"text\" name=\"username\" placeholder=\"login\" value=\"";
            // line 88
            if ( !twig_test_empty((isset($context["gus"]) ? $context["gus"] : null))) {
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gus"]) ? $context["gus"] : null), "nip", array()), "html", null, true);
            }
            echo "\" required/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Hasło:*</label>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                    <input class=\"form-control\" type=\"password\" name=\"password\" placeholder=\"hasło\" value=\"nmnmnm\" required/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Email:*</label>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                    <input class=\"form-control\" type=\"text\" name=\"email\" placeholder=\"email\" required/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Firma:*</label>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                    <input style=\"width:600px;\" class=\"form-control\" type=\"text\" name=\"company\" placeholder=\"firma\" value=\"";
            // line 118
            if ( !twig_test_empty((isset($context["gus"]) ? $context["gus"] : null))) {
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gus"]) ? $context["gus"] : null), "nazwa", array()), "html", null, true);
            }
            echo "\" required/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Imię:*</label>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                    <input class=\"form-control\" type=\"text\" name=\"firstName\" placeholder=\"wpisz imię\" required/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Nazwisko:*</label>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                    <input class=\"form-control\" type=\"text\" name=\"lastName\" placeholder=\"wpisz nazwisko\" required/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Telefon:*</label>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                    <input class=\"form-control\" type=\"text\" name=\"phone1\" required/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Telefon 2:</label>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                    <input class=\"form-control\" type=\"text\" name=\"phone2\"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Adres:*</label>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                    <input class=\"form-control\" type=\"text\" name=\"address1\"  value=\"";
            // line 168
            if ( !twig_test_empty((isset($context["gus"]) ? $context["gus"] : null))) {
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gus"]) ? $context["gus"] : null), "ulica", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gus"]) ? $context["gus"] : null), "nr", array()), "html", null, true);
            }
            echo "\" required/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Miasto:*</label>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                    <input class=\"form-control\" type=\"text\" name=\"city\" value=\"";
            // line 178
            if ( !twig_test_empty((isset($context["gus"]) ? $context["gus"] : null))) {
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gus"]) ? $context["gus"] : null), "miasto", array()), "html", null, true);
            }
            echo "\" required/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>NIP:*</label>
                                                </td>
                                                <td>
                                                </td>
                                                <td> <span id=\"nip_lbl\"></span>
                                                    <input id=\"nip\" class=\"form-control\" type=\"text\" name=\"extraField1\"  value=\"";
            // line 188
            if ( !twig_test_empty((isset($context["gus"]) ? $context["gus"] : null))) {
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gus"]) ? $context["gus"] : null), "nip", array()), "html", null, true);
            }
            echo "\" required/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Kod pocztowy:*</label>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                    <input class=\"form-control\" type=\"text\" name=\"zip\"  value=\"";
            // line 198
            if ( !twig_test_empty((isset($context["gus"]) ? $context["gus"] : null))) {
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gus"]) ? $context["gus"] : null), "zip", array()), "html", null, true);
            }
            echo "\" required/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                    <input class=\"btn btn-success\" type=\"submit\" value=\"Zarejestruj\"/>
                                                </td>
                                            </tr>
                                        </table>
                                        <input type=\"hidden\" name=\"register\"/>
                                    </form>
                                ";
        } else {
            // line 214
            echo "                                    Jesteś zalogowany jako:<br/>
                                    ";
            // line 215
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "name", array()), "html", null, true);
            echo "<br/>
                                    <a href=\"";
            // line 216
            echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
            echo "&view=account\" class=\"btn btn-default btn-xs\">Moje konto</a>
                                    <a href=\"";
            // line 217
            echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
            echo "&view=orders\" class=\"btn btn-default btn-xs\">Moje zamówienia</a><br/><br/>
                                    <a href=\"index.php?site=shop&action=logout\" class=\"btn btn-info\">Wyloguj się</a>
                                ";
        }
        // line 220
        echo "                            </div>
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
        return "shop-register.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  318 => 220,  312 => 217,  308 => 216,  304 => 215,  301 => 214,  280 => 198,  265 => 188,  250 => 178,  233 => 168,  178 => 118,  143 => 88,  128 => 78,  114 => 68,  110 => 66,  108 => 65,  102 => 62,  97 => 61,  95 => 60,  89 => 56,  87 => 55,  80 => 50,  78 => 49,  31 => 4,  28 => 3,  11 => 1,);
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
<script>
    \$(document).ready(function (){
         \$(\"#nip\").change(function () {

            var nip = \$(\"#nip\").val();
            var msgbox = \$(\"#nip_lbl\");

            if (nip.length > 9) {
                \$(\"#nip_lbl\").html('Sprawdzanie poprawności email...');
                function validatenip(nip) {
                    var nip_bez_kresek = nip.replace(/-/g,\"\");
                    var reg = /^[0-9]{10}\$/;
                    if(reg.test(nip_bez_kresek) == false) {
                    return false;}
                    else
                    {
                        var dig = (\"\"+nip_bez_kresek).split(\"\");
                        var kontrola = (6*parseInt(dig[0]) + 5*parseInt(dig[1]) + 7*parseInt(dig[2]) + 2*parseInt(dig[3]) + 3*parseInt(dig[4]) + 4*parseInt(dig[5]) + 5*parseInt(dig[6]) + 6*parseInt(dig[7]) + 7*parseInt(dig[8]))%11;
                        if(parseInt(dig[9])==kontrola)
                        return true;
                        else
                        return false;
                    }
                 
                }
                
                if(validatenip(nip)==true) {
                    \$(\"#nip\").removeClass(\"text-danger\");
                    \$(\"#nip\").addClass(\"text-success\");
                    \$(\"#nip_lbl\").html('<div style=\"float:right;margin-right:20px;\"><span class=\"ui-icon ui-icon-check\"></span> <font color=\"Green\">Nip jest poprawny</font></div> ');
                } else {
                    \$(\"#nip\").removeClass(\"text-success\");
                    \$(\"#nip\").addClass(\"text-danger\");
                    \$(\"#nip_lbl\").html('<div style=\"float:right;margin-right:20px;\"><font color=\"Red\">Nip nie jest poprawny</font></div> ');
                }
                
            }
            else {
                \$(\"#nip\").addClass(\"text-danger\");
                \$(\"#nip_lbl\").html('<div style=\"float:right;margin-right:20px;\"><font color=\"Red\">Za mało znaków</font></div>');
            }
            return false;
        });
    })
</script>
    {% set url = \"index.php?site=shop&view=register\" %}
    <div class=\"container width-full\">
        <div class=\"well\">
            <div class=\"row\">
                <div class=\"row\">
                    <div class=\"col-md-3\">
                        {% include \"shop-leftMenu.html.twig\" %}
                    </div>
                    <div class=\"col-md-9\">
                        <div class=\"well responsive\">
                            <div class=\"row\">
                                {% if user is empty %}
                                    <form class=\"form-inline\" action=\"{{url}}&perf=gus\" method=\"POST\">
                                        <input class=\"form-control\" type=\"text\" name=\"gusNip\" value=\"{{ gus.nip }}\"/>
                                        <input type=\"submit\" value=\"Pobierz dane z gus\" class=\"btn btn-primary\"/>
                                    </form><br/>
                                    {%if gus is not empty%}
                                        <div class=\"alert alert-success text-center\"> Dane poprawnie pobrane </div>
                                    {%endif%}
                                    <form class=\"form-inline\" action=\"{{url}}&perf=register\" method=\"POST\">
                                        <table class=\"table-responsive\">
                                            
                                            <tr>
                                                <td>
                                                    <label>Nazwa konta:*</label>
                                                </td>
                                                <td style=\"width:10px;\">  
                                                </td>
                                                <td>
                                                    <input style=\"width:600px;\" class=\"form-control\" type=\"text\" name=\"name\" placeholder=\"nazwa konta\" value=\"{%if gus is not empty %}{{gus.nazwa}}{%endif%}\" required/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Login:*</label>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                    <input class=\"form-control\" type=\"text\" name=\"username\" placeholder=\"login\" value=\"{%if gus is not empty %}{{gus.nip}}{%endif%}\" required/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Hasło:*</label>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                    <input class=\"form-control\" type=\"password\" name=\"password\" placeholder=\"hasło\" value=\"nmnmnm\" required/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Email:*</label>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                    <input class=\"form-control\" type=\"text\" name=\"email\" placeholder=\"email\" required/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Firma:*</label>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                    <input style=\"width:600px;\" class=\"form-control\" type=\"text\" name=\"company\" placeholder=\"firma\" value=\"{%if gus is not empty %}{{gus.nazwa}}{%endif%}\" required/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Imię:*</label>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                    <input class=\"form-control\" type=\"text\" name=\"firstName\" placeholder=\"wpisz imię\" required/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Nazwisko:*</label>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                    <input class=\"form-control\" type=\"text\" name=\"lastName\" placeholder=\"wpisz nazwisko\" required/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Telefon:*</label>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                    <input class=\"form-control\" type=\"text\" name=\"phone1\" required/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Telefon 2:</label>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                    <input class=\"form-control\" type=\"text\" name=\"phone2\"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Adres:*</label>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                    <input class=\"form-control\" type=\"text\" name=\"address1\"  value=\"{%if gus is not empty %}{{gus.ulica}} {{gus.nr}}{%endif%}\" required/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Miasto:*</label>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                    <input class=\"form-control\" type=\"text\" name=\"city\" value=\"{%if gus is not empty %}{{gus.miasto}}{%endif%}\" required/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>NIP:*</label>
                                                </td>
                                                <td>
                                                </td>
                                                <td> <span id=\"nip_lbl\"></span>
                                                    <input id=\"nip\" class=\"form-control\" type=\"text\" name=\"extraField1\"  value=\"{%if gus is not empty %}{{gus.nip}}{%endif%}\" required/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Kod pocztowy:*</label>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                    <input class=\"form-control\" type=\"text\" name=\"zip\"  value=\"{%if gus is not empty %}{{gus.zip}}{%endif%}\" required/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                    <input class=\"btn btn-success\" type=\"submit\" value=\"Zarejestruj\"/>
                                                </td>
                                            </tr>
                                        </table>
                                        <input type=\"hidden\" name=\"register\"/>
                                    </form>
                                {% else %}
                                    Jesteś zalogowany jako:<br/>
                                    {{user.name}}<br/>
                                    <a href=\"{{url}}&view=account\" class=\"btn btn-default btn-xs\">Moje konto</a>
                                    <a href=\"{{url}}&view=orders\" class=\"btn btn-default btn-xs\">Moje zamówienia</a><br/><br/>
                                    <a href=\"index.php?site=shop&action=logout\" class=\"btn btn-info\">Wyloguj się</a>
                                {% endif %}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{% endblock%}
", "shop-register.html.twig", "/view/shop-register.html.twig");
    }
}
