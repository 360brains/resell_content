<script>

    $('#one').vTimer('start', {duration: 5})
        .on('update', function (e, remaining) {
            $('#one').text('One: ' + remaining);
        })
        .on('complete', function () {
            $('#one').text('One: Time Out');
        });

    // start the timer
    $('#el').vTimer('start');

    // stop the timer
    $('#el').vTimer('stop');

    // cancel the timer
    $('#el').vTimer('cancel');

</script>
