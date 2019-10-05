<script>


    $(".summernote").summernote({
        height: 300
    });

    $(".date-picker").datepicker({
        autoclose: 0,
        format: "yyyy-m-d",
        todayHighlight: true,
        setDate: new Date(),
        autoclose: true,
    });

    $('.device').change(function(){
        var deviceID = $(this).val();
        if(deviceID){
            $.ajax({
                type:"GET",
                url:"{{url('admin/get-device-companies')}}?device_id="+deviceID,
                success:function(res){
                    if(res){
                        $(".company").empty();
                        $(".company").append('<option value="">Select Company</option>');
                        $.each(res, function(key,value){
                            $(".company").append('<option value="'+key+'">'+value+'</option>');
                        });

                    }else{
                        $(".company").empty();
                    }
                }
            });
        }
    });

    $('#company').change(function(){
        var deviceCompanyID = $(this).val();
        if(deviceCompanyID){
            $.ajax({
                type:"GET",
                url:"{{url('admin/get-device-models')}}?device_company_id="+deviceCompanyID,
                success:function(res){
                    if(res){
                        $(".model").empty();
                        $(".model").append('<option value="">Select Model</option>');
                        $.each(res, function(key,value){
                            $(".model").append('<option value="'+key+'">'+value+'</option>');
                        });

                    }else{
                        $(".model").empty();
                    }
                }
            });
        }
    });

    $('#getModelByDevice').change(function(){
        var deviceID = $(this).val();
        if(deviceID){
            $.ajax({
                type:"GET",
                url:"{{url('admin/get-device-models-by-device')}}?device_id="+deviceID,
                success:function(res){
                    if(res){
                        $(".model").empty();
                        $(".model").append('<option value="">Select Model</option>');
                        $.each(res, function(key,value){
                            $(".model").append('<option value="'+key+'">'+value+'</option>');
                        });

                    }else{
                        $(".model").empty();
                    }
                }
            });
        }
    });


</script>
