
$(function() {
jQuery.validator.addMethod( 'passwordMatch', function(value, element) {
    
    // The two password inputs
    var password = $("#inputSenha").val();
    var confirmPassword = $("#inputSenhaRepete").val();

    // Check for equality with the password inputs
    if (password != confirmPassword ) {
        return false;
    } else {
        return true;
    }

}, "Your Passwords Must Match");
});



$(function() {
jQuery.validator.addMethod( 'senhaPreenchidasss', function(value, element) {
    
    // The two password inputs
    var password = $("#inputSenha").val();
    var confirmPassword = $("#inputSenhaAntiga").val();

   if (password.lenght() > 0 && confirmPassword.lenght() == 0) {
        return false;
    } else {
       return true;
    }

}, "Your Passwords Must Match");
});





$(function() {
  $("form[name='alteradados']").validate({
    rules: {
      inputNome: {
       required: true
      },
      inputEmail: {
        remote: { 
                url:"../Utils/CheckEmail.php", 
                data: {mail:function(){return $('#inputEmail').val()}},
                async:false 
            },
        email: true
      },

        inputSenhaRepete: {
            minlength: 3,
            passwordMatch: true 
      },
      inputSenha: {
        minlength: 5
      },
   
    

    },
    messages: {
      inputNome: "Por favor, digite seu nome.",

      inputSenha: {
        minlength: "Sua senha deve possuir no minimo 5 caracteres.",
       
      },

      inputSenhaRepete:{
        minlength: "Sua senha deve possuir no minimo 5 caracteres.",
         passwordMatch: "As senhas devem coincidir."
      },
      inputEmail:{
       email: "Email invalido",
       remote: "Este e-mail já está em uso."
      },

    
    },

    submitHandler: function(form) {
      form.submit();
    }
  });

});