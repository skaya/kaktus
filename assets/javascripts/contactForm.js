(function($){
  function contactForm($element, options) {

    if (typeof(options) === "undefined") {
      options = {};
    }

    settings = {
      $openingElem: $('.js--show-contact-form'),
      $closingElem: $('.js--hide-contact-form')
    }

    options =  $.extend(settings, options);

    // PRIVATE VARIABLES
    var $container = $element,
        errorMessages = {
          empty: 'Please fill all fields',
          email: 'wrong email'
        },
        $formReguest = $('form', $container),
        $formFields = $('input[type="text"], textarea', $formReguest);


    // PRIVATE METHODS

    // constructor
    function init() {
      resetForm();
      bindDomEvents();
    }

    function bindDomEvents() {
      options.$openingElem.on('click', function(event) {
        event.preventDefault();
        showForm();
      });

      options.$closingElem.on('click', function(event) {
        event.preventDefault();
        hideForm();
      })

      $formReguest.on('submit', function(event) {
        event.preventDefault();
        sendRequest();
      });
    }

    function showForm() {
      $container.addClass('opened');
    }

    function hideForm() {
      $container.removeClass('opened');
    }

    function toggleForm() {
      $container.toggleClass('opened');
    }

    function resetForm() {
      $formFields.val("");
      hideForm();
    }

    function isFormValid() {
      message = [];
      $formFields.each(function(index, elem) {
        if ($(this).val() == "") {
          message.push(errorMessages.empty);
          return false;
        }
      });

      var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if (!re.test($("#email").val())) {
        message.push(errorMessages.email);
      }

      if (message.length == 0) {
        return true;
      } else {
        alert(message);
        return true;
      }
    }

    function sendRequest() {
      if (isFormValid()) {
        $.ajax({
          url: 'contact.php',
          type: 'POST',
          dataType: 'json',
          data: $formReguest.serializeArray(),
          success: function(response, textStatus, XMLHttpRequest){
            if (response["success"] == 1) {

            }
            console.log(response["success"] == 0);
          },
          error: function(xhr, response, text) {
            console.log(xhr, response, text)
          }
        });
      }
    }

    // run constructor
    init();

    // PUBLIC METHODS
    return {
      showForm: showForm,
      hideForm: hideForm
    }
  }

  // jQuery plugin method
  $.fn.contactForm = function(options) {
    return this.each(function() {
      var $this = $(this);

      // If not already stored, store plugin object in this element's data
      if (!$this.data('contactForm')) {
        $this.data('contactForm', contactForm($this, options));
      }
    });
  };


})(jQuery);
