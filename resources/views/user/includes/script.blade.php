<script>

        // $("#amount").on("blur", function() {
        //     console.log($(this).val());
        //     var amount = $("#amount").val();
        //      var balance = $("#balance").val();
        //      if ($("#amount").val() < $("#balance").val()){
        //          alert('Withdraw amount must be less than or equal to available balance!');
        //      }
        // });

    // function markNotificationAsRead(notificationCount) {
    //     if(notificationCount !=='0'){
    //         $.get('/markAsRead');
    //     }
    // }
        //     $('.training-name').click(function () {
        //         $('source').attr('src', $(this).data('link'));
        //         $('#myVideo').load();
        //     })
        (function($) {
            "use strict";
            $(window).on('load', function () {
                $('.Loader').delay(350).fadeOut('slow');
                $('body').delay(350).css({'overflow': 'visible'});
            })
        })

        function changeVideo(url) {
            document.getElementById("myVideoSrc").src = url;
            document.getElementById("myVideo").load();
            document.getElementById("myVideo").play();
        }

    var myDate = $('#count-down').val();console.log(myDate)
    $('#one').vTimer('start', {duration: Number(myDate)})
        .on('update', function (e, remaining) {
            $('#one').text(remaining);
        })
        .on('complete', function () {
            $('#one').text('Time Out');
        });
        // l
         // start the timer
        // $(document).on('click', function () {
        //     let element1 =  window.document.getElementById('notification');
        //     let element =  window.document.getElementById('notification-icon');
        //     // if( element1.className === 'dropdown-menu'){
        //     //     element.style.color = 'green'
        //     // }else{
        //         element.style.color = 'grey'
        //     // }
        // })
        //#notification
        //navbarDropdown
        $('#notification-menu').on('hidden.bs.dropdown', function () {
            alert("hello")
            // do something…
        })

    $('#el').vTimer('start');

    // stop the timer
    $('#el').vTimer('stop');

    // cancel the timer
    $('#el').vTimer('cancel');


        function disableEdit() {
            $('#edit').addClass('disabled');
            $('#save').removeClass('d-none');
            $('#user-img').removeClass('d-none');
            $('#full-name').prop("disabled", false)
            $('#gender').prop("disabled", false)
            $('#country').prop("disabled", false)
            $('#mobile-number').prop("disabled", false)
        }

    function visible(){
        $('#save-btn').removeClass('d-none');
        $('#close-btn').removeClass('d-none');
        $('#manage-btn').addClass('d-none');
        $('.remove-d-none').removeClass('d-none');
    }
        function redo(){
            $('#save-btn').addClass('d-none');
            $('#close-btn').addClass('d-none');
            $('#manage-btn').removeClass('d-none');
            $('.remove-d-none').addClass('d-none');
        }

    function changeColor() {
        let element1 =  window.document.getElementById('notification');
        let element =  window.document.getElementById('notification-icon');
        if( element1.className === 'dropdown-menu'){
            element.style.color = '#75CB63'
        }else{
            element.style.color = 'grey'
        }
    }
        $(document).on('click' , function () {
            let element1 =  window.document.getElementById('notification');
            let element =  window.document.getElementById('notification-icon');
            if( element1.className === 'dropdown-menu'){
                element.style.color = 'grey'
            }else{
                element.style.color = '#75CB63'
            }
        });


        $("#carousel").owlCarousel({
            autoplay: true,
            dots:false,
            loop: true,
            items: 1,
            autoHeight: true,
            autoplayTimeout: 3000,
            smartSpeed: 800,

        });

        CKEDITOR.replace( 'messageArea',
            {
                customConfig : 'config.js',
                toolbar : 'simple'
            })
        $(document).ready(function(e) {
            $('.Loader').delay(350).css({'display': 'none'});
            $(".showonhover").click(function(){
                $("#selectfile").trigger('click');
            });
        });


        // var input = document.querySelector('input[type=file]'); // see Example 4
        //
        // input.onchange = function () {
        //     var file = input.files[0];
        //
        //     drawOnCanvas(file);   // see Example 6
        //     displayAsImage(file); // see Example 7
        // };

        function drawOnCanvas(file) {
            var reader = new FileReader();

            reader.onload = function (e) {
                var dataURL = e.target.result,
                    c = document.querySelector('canvas'), // see Example 4
                    ctx = c.getContext('2d'),
                    img = new Image();

                img.onload = function() {
                    c.width = img.width;
                    c.height = img.height;
                    ctx.drawImage(img, 0, 0);
                };

                img.src = dataURL;
            };

            reader.readAsDataURL(file);
        }

        function displayAsImage(file) {
            var imgURL = URL.createObjectURL(file),
                img = document.createElement('img');

            img.onload = function() {
                URL.revokeObjectURL(imgURL);
            };

            img.src = imgURL;
            document.body.appendChild(img);
        }

        $("#upfile1").click(function () {
            $("#file1").trigger('click');
        });
</script>
