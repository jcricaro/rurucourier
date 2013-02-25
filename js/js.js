$(document).ready(function() {
    
    $("#delivery_type").change(handleNewSelection);
    handleNewSelection.apply($("#delivery_type"));

    $("#box").change(handleNewSelection2);
    handleNewSelection2.apply($("#box"));

    $("#weight").change(handleNewSelection3);
    handleNewSelection3.apply($("#weight"));



    $('.dropdown-toggle').dropdown();
    
    $('#myTab a').click(function (e) {
      e.preventDefault();
      $(this).tab('show');
    })



    });





handleNewSelection = function() {
    hide1();

    switch($(this).val()) {
        case '1':
            $("#transmit1").show('slow');
            $("#box1").show('slow');
        break;
        case '2':
            $("#transmit2").show('slow');
            $("#box1").show('slow');
        break;
    }
}
hide1 = function() {
    $("#transmit2").hide();
    $("#transmit1").hide();
    $("#box1").hide();
    
}

handleNewSelection2 = function() {
    hide2();
    switch($(this).val()) {
        case '1':
            $("#dimensions").show('slow');
        break;
        case '2':
            $("#weight_option").show('slow');
        break;
    }
}

hide2 = function() {
    $("#weight_option").hide();
    $("#add_cargo_weight").hide();
    $("#dimensions").hide();
    
}

handleNewSelection3 = function() {
    hide3();
    switch($(this).val()) {
        case '5':
            $("#add_cargo_weight").show('slow');
    }
}

hide3 = function() {
    $("#add_cargo_weight").hide();
    $("#dimensions").hide();
}