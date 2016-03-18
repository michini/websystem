/**
 * Created by leonel on 06/03/16.
 */
$(document).ready(function() {

    var currentLangCode = 'es';

    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today myCustomButton',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        lang:currentLangCode,
        events:{
            url:'http://localhost/laravel/public/api'
        }
    })

});
