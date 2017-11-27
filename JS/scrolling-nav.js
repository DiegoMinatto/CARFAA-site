(function($) {
  "use strict"; // Start of use strict

  // Smooth scrolling using jQuery easing
  $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);

      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: (target.offset().top)
        }, 1000);
        return false;
      }
    }
  });

    $('.js-scroll-trigger').click(function() {
    $('.navbar-collapse').collapse('hide');
  });


 
})(jQuery); 

$(document).ready(function() {


  $(window).scroll(function () { 


    if ($(window).scrollTop() >= 440) {
 
      $('#mainNav').addClass('navbar-fixed');

            $('.har1').addClass('active');
             $('.har2').removeClass('active');

    }

    if ($(window).scrollTop() <= 400) {
      $('#mainNav').removeClass('navbar-fixed');
        $('.har2').addClass('active');
        $('.har1').removeClass('active');


    }
  });
});

function showLogin(){
$('body').css('overflow', 'hidden');
$('#divBgLogin').css('visibility', 'visible');
}

function hideLogin(){
$('body').css('overflow', 'visible');
$('#divBgLogin').css('visibility', 'hidden');
}

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
jQuery.validator.addMethod( 'loginFiled', function(value, element) {
    
    // The two password inputs
    var login = $("#loginUsuario").val();
    var senha = $("#loginSenha").val();

    // Check for equality with the password inputs
   if (login.length() == 0 || senha.length() == 0) {
        return false;
  } else {
        return true;
    }

}, "Campo login está vazio");
});




$(function() {
$("form[name='frmlogin']").validate({
   onkeyup: false,
   onclick: false,
  focusInvalid: false,
    rules: {
 loginSenha: {
  loginFiled:true,
        remote: { 
                url:"Utils/CheckLogin.php", 
                 data: {usuario:function(){return $('#loginUsuario').val()},senha:function(){return $('#loginSenha').val()}},
                async:false
            },
      },
    },
    // Specify validation error messages
    messages: {
        loginSenha:{
        loginFiled: "Usuario e senha devem ser preenchidos",
       remote: "Usuario ou senha incorretos!.",
      }, 
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});







// Wait for the DOM to be ready
$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='validarecuperacao']").validate({
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      inputNome: {
       required: true
      },
      inputEmail: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        remote: { 
                url:"../Utils/CheckEmail.php", 
                data: {mail:function(){return $('#inputEmail').val()}},
                async:false 
            },
        email: true
      },

        inputSenhaRepete: {
         required: true,
            minlength: 3,
            passwordMatch: true 
      },
      inputSenha: {
        required: true,
        minlength: 5
      },
    },
    // Specify validation error messages
    messages: {
      inputNome: "Por favor, digite seu nome.",

      inputSenha: {
        required: "Por favor, digite uma senha.",
        minlength: "Sua senha deve possuir no minimo 5 caracteres.",
       
      },

      inputSenhaRepete:{
       required: "Por favor, digite uma senha.",
        minlength: "Sua senha deve possuir no minimo 5 caracteres.",
         passwordMatch: "As senhas devem coincidir."
      },
      inputEmail:{
       required: "Digite seu e-mail.",
       email: "Email invalido",
       remote: "Este e-mail já está em uso."
      } 
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });

});







// Wait for the DOM to be ready
$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='registro']").validate({
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      inputNome: {
       required: true
      },
      inputEmail: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        remote: { 
                url:"../Utils/CheckEmail.php", 
                data: {mail:function(){return $('#inputEmail').val()}},
                async:false 
            },
        email: true
      },

        inputSenhaRepete: {
         required: true,
            minlength: 3,
            passwordMatch: true 
      },
      inputSenha: {
        required: true,
        minlength: 5
      },
    },
    // Specify validation error messages
    messages: {
      inputNome: "Por favor, digite seu nome.",

      inputSenha: {
        required: "Por favor, digite uma senha.",
        minlength: "Sua senha deve possuir no minimo 5 caracteres.",
       
      },

      inputSenhaRepete:{
       required: "Por favor, digite uma senha.",
        minlength: "Sua senha deve possuir no minimo 5 caracteres.",
         passwordMatch: "As senhas devem coincidir."
      },
      inputEmail:{
       required: "Digite seu e-mail.",
       email: "Email invalido",
       remote: "Este e-mail já está em uso."
      } 
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });

});









