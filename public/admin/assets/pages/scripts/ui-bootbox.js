var UIBootbox = function () {

    var handleDemo = function() {

        $('#demo_1').click(function(){
                bootbox.alert("Hello world!");
            });
            //end #demo_1

            $('#demo_2').click(function(){
                bootbox.alert("Hello world!", function() {
                    alert("Hello world callback");
                });
            });
            //end #demo_2

            $('#demo_3').click(function(){
                bootbox.confirm("Are you sure?", function(result) {
                   alert("Confirm result: "+result);
                });
            });
            //end #demo_3

            $('#demo_4').click(function(){
                bootbox.prompt("What is your name?", function(result) {
                    if (result === null) {
                        alert("Prompt dismissed");
                    } else {
                        alert("Hi <b>"+result+"</b>");
                    }
                });
            });
            //end #demo_6

            $('#demo_5').click(function(){
                bootbox.dialog({
                    message: "This category contains sub-categories. Are you sure you want to affect this category and the sub-caegories?",
                    title: "Contains sub-categories!",
                    buttons: {
                      success: {
                        label: "Cancel",
                        className: "green",
                        callback: function() {
                        }
                      },
                      danger: {
                        label: "Proceed",
                        className: "red",
                        callback: function() {
                          $('#delete_category').click();
                        }
                      }
                    }
                });
            });
            //end #demo_7

    }

    return {

        //main function to initiate the module
        init: function () {
            handleDemo();
        }
    };

}();

jQuery(document).ready(function() {
   UIBootbox.init();
});
