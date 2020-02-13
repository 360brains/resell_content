<script>
    $(document).ready(function () {
        <?php if (Session::has("success")): ?>
            toastr["success"]('<?php echo Session::get("success"); ?>');
        <?php endif ?>

            <?php if (Session::has("error")): ?>
            toastr["error"]('<?php echo Session::get("error"); ?>');
        <?php endif ?>

            @if ($errors->any())
                @foreach($errors->all() as $e)
                    toastr["error"]('{{ $e }}');
                @endforeach
            @endif

        <?php

        if(Session::has("success")):
            Session::remove("success");
        endif;

        if(Session::has("error")):
            Session::remove("error");
        endif;
        ?>
    })

</script>
