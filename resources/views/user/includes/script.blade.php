<script>

    function markNotificationAsRead(notificationCount) {
        if(notificationCount !=='0'){
            $.get('/markAsRead');
        }
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
