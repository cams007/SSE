$(document).ready(function() {

    document.getElementById('otra_nacionalidad').style.display='none';
    
    var max_fields      = 3; //maximum input boxes allowed
    var wrapper         = $(".input"); //Fields wrapper
    var add_button      = $(".addInput"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
            $(add_button).remove();
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
        $(this).append('<label class="link addInput"> Agregar un correo electronico</label>');
    })
});

function changeNacionalidad( val )
{
    if (val == 'Otra'){
        document.getElementById('otra_nacionalidad').style.display='block';
        document.getElementById('otra_nacionalidad').required = true;
    }else{
        document.getElementById('otra_nacionalidad').style.display='none';
        document.getElementById('otra_nacionalidad').required = false;
    }
}