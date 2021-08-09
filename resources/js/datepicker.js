const date = new Date();
   const today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
   const tomorrow = new Date(today);
   tomorrow.setDate(tomorrow.getDate() + 1);

   const dayInSeconds = 86400000;
   const night = Math.floor((tomorrow.getTime() - today.getTime()) / dayInSeconds);


    $('.datepicker').datepicker({
        format: 'd-mm-yyyy',
        autoclose: true,
        startDate: date,
        todayHighlight: true

    });

    $('#check-in').datepicker('setDate', today);
    $('#check-out').datepicker('setDate', tomorrow);
    $('#night').val(night);


    $('#check-in').datepicker({

        format: 'd-mm-yyyy',
        autoclose: true,
        
        
    }).on('changeDate', function(){
        
        let currentDate = $(this).datepicker('getDate');
        let tomorrow = new Date(currentDate);
        tomorrow.setDate(tomorrow.getDate() + 1);

        $('#check-out').datepicker('setDate', tomorrow);

    })

    $('#check-out').on('change', function(){

        let date1 = $('#check-in').datepicker('getDate');
        let date2 = $('#check-out').datepicker('getDate');
        let diff = 0;

        if (date1 && date2) {

            diff = Math.floor((date2.getTime() - date1.getTime()) / 86400000);
        }

        console.log(diff);
        $('#night').val(diff);
        
    })