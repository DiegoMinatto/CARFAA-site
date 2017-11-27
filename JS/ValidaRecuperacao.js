// Wait for the DOM to be ready
function emailEnviado(email){

var elementExists = document.getElementById("labelEnviado");
if(!elementExists){
       document.getElementById("inputEmail").value = email;
     $('#inputEmail').attr('readonly', true);
    $("<label for=\"inputEmail\" id=\"labelEnviado\" class=\"error1\"><font color=\"#00FF00\"><i style=\"font-size:20px;color:#00FF00\" class=\"fa\">&#xf00c;</i> Um link de recuperação foi enviado para seu e-mail</font></label>").insertAfter("#inputEmail");    
     document.getElementById("btnRecuperar").innerHTML = "Re-Enviar";
     }
}

$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='validarec']").validate({
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      inputEmail: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        remote: { 
                url:"../Utils/VerificaEmail.php", 
                data: {mail:function(){return $('#inputEmail').val()}},
                async:false 
            },
        email: true
      },
    },
    // Specify validation error messages
    messages: {
  
      inputEmail:{
       required: "Digite seu e-mail.",
       email: "Email invalido",
       remote: "Este e-mail não está cadastrado."
      } 
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });

});