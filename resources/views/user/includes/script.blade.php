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

    // start the timer
    $('#el').vTimer('start');

    // stop the timer
    $('#el').vTimer('stop');

    // cancel the timer
    $('#el').vTimer('cancel');

</script>
