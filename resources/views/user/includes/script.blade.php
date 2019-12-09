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
        $('.training-name').click(function () {
            $('source').attr('src', $(this).data('link'));
        })

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

    function disableEdit() {
        $('#edit').addClass('disabled');
        $('#save').removeClass('d-none');
    }
    function visible(){
        $('#save-btn').removeClass('d-none');
        $('#close-btn').removeClass('d-none');
        $('#manage-btn').addClass('d-none');
    }
    function redo(){
        $('#save-btn').addClass('d-none');
        $('#close-btn').addClass('d-none');
        $('#manage-btn').removeClass('d-none');
    }

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
</script>
