<?php

/* admin/shop-orderEdit.html.twig */
class __TwigTemplate_252ede9359226fd1c2acba3de7e4c911efddb256469d65196148e1d6ad1f23fe extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin/base.html.twig", "admin/shop-orderEdit.html.twig", 1);
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
            if (((isset($context["info"]) ? $context["info"] : null) == "updateUserInfo-edit-success")) {
                // line 6
                echo "            <div class=\"alert alert-success text-center\" role=\"alert\">Dane zostały zmienione</div>
        ";
            } elseif ((            // line 7
(isset($context["info"]) ? $context["info"] : null) == "updateUserInfo-edit-fail")) {
                // line 8
                echo "            <div class=\"alert alert-danger text-center\" role=\"alert\">Dane nie zostały zmienione</div>
        ";
            }
            // line 10
            echo "    ";
        }
    }

    // line 13
    public function block_body($context, array $blocks = array())
    {
        // line 14
        echo "    
    <div class=\"row\">
        <div class=\"col-md-2\">
            ";
        // line 17
        $this->loadTemplate("admin/shop-menu.html.twig", "admin/shop-orderEdit.html.twig", 17)->display($context);
        // line 18
        echo "        </div>
        <div class=\"col-md-10\">
            <div class=\"well\">
                <div class=\"row\">
                    <div class=\"pull-left col-md-6\">
                    Zamówienie nr. ";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "order_id", array()), "html", null, true);
        echo "<br/>
                    Data zamówienia: ";
        // line 24
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "cdate", array()), "d-m-Y H:i:s"), "html", null, true);
        echo "<br/>
                    Data modyfikacji: ";
        // line 25
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "mdate", array()), "d-m-Y H:i:s"), "html", null, true);
        echo "<br/>
                    Stan zamówienia: ";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "order_status_name", array()), "html", null, true);
        echo "<br/>
                    <br/>
                    <br/>
                    </div>
                </div>
                <div class=\"row\">
                    <div class=\"col-md-6\">
                        <form method=\"POST\" class=\"form\" action=\"index.php?site=admin&action=shop&act=orderEdit&orderId=";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "order_id", array()), "html", null, true);
        echo "\">
                            <strong>Rachunek</strong><br/>  
                            <table class=\"table table-bordered \">
                            <tr>
                                <td>E-mail:</td>
                                <td><input class=\"form-control\" type=\"text\" name=\"email\" value=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "user_email", array()), "html", null, true);
        echo "\"/></td>
                            </tr>
                            <tr>
                                <td>Nazwa firmy:</td>
                                <td><input class=\"form-control\" type=\"text\" name=\"company\" value=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "company", array()), "html", null, true);
        echo "\"/></td>
                            </tr>
                            <tr>
                                <td>Imię:</td>
                                <td><input class=\"form-control\" type=\"text\" name=\"firstName\" value=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "first_name", array()), "html", null, true);
        echo "\"/></a></td>
                            </tr>
                            <tr>
                                <td>Nazwisko:</td>
                                <td><input class=\"form-control\" type=\"text\" name=\"lastName\" value=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "last_name", array()), "html", null, true);
        echo "\"/> </a></td>
                            </tr>
                            <tr>
                                <td>Ulica:</td>
                                <td><input class=\"form-control\" type=\"text\" name=\"address\" value=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "address_1", array()), "html", null, true);
        echo "\"/></td>
                            </tr>
                            <tr>
                                <td>Miasto:</td>
                                <td><input class=\"form-control\" type=\"text\" name=\"city\" value=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "city", array()), "html", null, true);
        echo "\"/></td>
                            </tr>
                            <tr>
                                <td>Kod pocztowy:</td>
                                <td><input class=\"form-control\" type=\"text\" name=\"zip\" value=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "zip", array()), "html", null, true);
        echo "\"/></td>
                            </tr>
                            <tr>
                                <td>Telefon:</td>
                                <td><input class=\"form-control\" type=\"text\" name=\"phone\" value=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "phone_1", array()), "html", null, true);
        echo "\"/></td>
                            </tr>
                            <tr>
                                <td>Telefon kom.:</td>
                                <td><input class=\"form-control\" type=\"text\" name=\"phone2\" value=\"";
        // line 70
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "phone_2", array()), "html", null, true);
        echo "\"/></td>
                            </tr>
                            <tr>
                                <td>Numer NIP:</td>
                                <td><input class=\"form-control\" type=\"text\" name=\"extra_field_1\" value=\"";
        // line 74
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "extra_field_1", array()), "html", null, true);
        echo "\"/></td>
                            </tr>
                            <tr>
                                <td>Konsultant:</td>
                                <td>
                                <select class=\"form-control\" name=\"konsultant\">
                                    ";
        // line 80
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["konsultanci"]) ? $context["konsultanci"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["konsultant"]) {
            // line 81
            echo "                                        ";
            if (($this->getAttribute($context["konsultant"], "konsultantId", array()) == $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "extra_field_2", array()))) {
                // line 82
                echo "                                            <option selected value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["konsultant"], "konsultantId", array()), "html", null, true);
                echo "\" >";
                echo twig_escape_filter($this->env, $this->getAttribute($context["konsultant"], "konsultantFirstName", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["konsultant"], "konsultantLastName", array()), "html", null, true);
                echo "</option>
                                        ";
            } else {
                // line 84
                echo "                                            <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["konsultant"], "konsultantId", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["konsultant"], "konsultantFirstName", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["konsultant"], "konsultantLastName", array()), "html", null, true);
                echo "</option>
                                        ";
            }
            // line 86
            echo "                                        
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['konsultant'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 88
        echo "                                </select>
                                </td>
                            </tr>
                             </table>
                             <input type=\"hidden\" value=\"";
        // line 92
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "user_id", array()), "html", null, true);
        echo "\" name=\"userId\"/>
                             <input type=\"hidden\" value=\"";
        // line 93
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "order_info_id", array()), "html", null, true);
        echo "\" name=\"order_info_id\"/>
                             <input type=\"hidden\" value=\"saveEdit\" name=\"saveEdit\"/>
                             <input type=\"submit\" class=\"btn btn-submit\" value=\"Zapisz\"/>
                         </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
";
    }

    public function getTemplateName()
    {
        return "admin/shop-orderEdit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  215 => 93,  211 => 92,  205 => 88,  198 => 86,  188 => 84,  178 => 82,  175 => 81,  171 => 80,  162 => 74,  155 => 70,  148 => 66,  141 => 62,  134 => 58,  127 => 54,  120 => 50,  113 => 46,  106 => 42,  99 => 38,  91 => 33,  81 => 26,  77 => 25,  73 => 24,  69 => 23,  62 => 18,  60 => 17,  55 => 14,  52 => 13,  47 => 10,  43 => 8,  41 => 7,  38 => 6,  35 => 5,  32 => 4,  29 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "admin/shop-orderEdit.html.twig", "/view/admin/shop-orderEdit.html.twig");
    }
}
