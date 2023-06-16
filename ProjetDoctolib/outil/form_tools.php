<?php

// form_begin
// --------------------------------------------------

function form_begin($class, $method, $action) {
    echo ("\n<!-- ============================================== -->\n");
    echo ("<!-- form_begin : $class $method $action) -->\n");
    printf("<form class='%s' method='%s' action='%s'>\n", $class, $method, $action);
}

// --------------------------------------------------
// form_input_text
// --------------------------------------------------

function form_input_text($label, $name, $size, $value, $type = null, $required="", ...$others) {
    echo ("\n<!-- form_input_text : $label $name $size $value -->\n");
    echo ("  <p>\n");

    echo ("<div class='form-group col-6'>");
    echo (" <label for='$label' class=' fw-bold'>$label</label>");
    $typeInput = ($type != null && $type != "") ? $type : "text";
    $inputToDisplay = " <input type='$typeInput' class='form-control' id='$name' name='$name' size='$size' value='$value' $required ";
    foreach ($others as $param){
        $inputToDisplay .= $param . " ";
    }
    $inputToDisplay .= " >";
    echo ($inputToDisplay);
    echo ("</div>");
}

// --------------------------------------------------
// form_input_number_limit
// --------------------------------------------------

function form_input_number_limit($label, $name, $size, $value, $min, $max, $required="") {
    echo ("\n<!-- form_input_text : $label $name $size $value -->\n");
    echo ("  <p>\n");

    echo ("<div class='form-group col-6'>");
    echo (" <label for='$label' class=' fw-bold'>$label</label>");
    echo (" <input type='number' class='form-control' min='$min' max='$max' id='$name' name='$name' size='$size' value='$value' $required >");
    echo ("</div>");
}


// =========================
// form_select
// =========================

// Parametre $label    : permet un affichage (balise label)
// Parametre $name     : attribut pour identifier le composant du formulaire
// Parametre $multiple : si cet attribut n'est pas vide alors sélection multiple possible
// Parametre $size     : attribut size de la balise select
// Parametre $liste    : un liste d'options. Vous utiliserez un foreach pour générer les balises option

function form_select($label, $name, $multiple, $complex, $size, $liste) {
    echo ("\n<!-- form_select : $label $name $multiple $size -->\n");
    echo ("  <p>\n");
    echo ("<div class='form-group col-6'>");
    echo (" <label for='$label' class=' fw-bold'>$label</label>");
    if($multiple) {
        printf("<select class='form-control' name='%s[]' size='%s' multiple>\n", $name, $size);
    } else {
        printf("<select class='form-control' name='%s' size='%s'>\n", $name, $size);
    }
    if ($complex){
        foreach($liste as $key => $value) {
            printf("<option value='%s'>%s</option>\n", $key, $value);
        }
    } else{
        foreach($liste as $valeur) {
            printf("<option value='%s'>%s</option>\n", $valeur, $valeur);
        }
    }

    echo ("</select>");
    echo ("</div>");
}

// =========================

function form_input_reset($value) {
    echo ("\n<!-- form_input_reset : $value -->\n");
    echo ("<p><input class='btn btn-outline-secondary' type='reset' value='$value'></p>\n");
}

// =========================

function form_input_submit($value) {
    echo ("\n<!-- form_input_submit : $value -->\n");
    echo ("<p><input class='btn btn-outline-success' type='submit' value='$value'></p>\n");

}

// =========================


function form_end() {
    echo ("</form>\n");
    echo ("<!-- ============================================== -->\n\n");
}

// =========================

?>


