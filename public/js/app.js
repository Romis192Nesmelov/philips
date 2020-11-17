function startCheckingCode(code) {
//    console.log('start check');
    setInterval(function() {
//        console.log('check');
        $.post('/codes/check-discount-code', {
            'dis_code': code,
            '_token': $('input[name=_token]').val()
        }, function (data) {
            if (!data.success) {
                window.location = '/codes#shop';
            }
        });
    }, 30000);
}

function startTimer(actionEndTime) {
    setInterval(function() {
        var t = Date.parse(actionEndTime) - Date.parse(new Date());
        var seconds = Math.floor( (t/1000) % 60 );
        var minutes = Math.floor( (t/1000/60) % 60 );
        var hours = Math.floor( (t/(1000*60*60)) % 24 );
        var days = Math.floor( t/(1000*60*60*24) );

        if (seconds.toString().length == 1) seconds = '0'+seconds;
        if (minutes.toString().length == 1) minutes = '0'+minutes;
        if (hours.toString().length == 1) hours = '0'+hours;

        $('#timer .days .digits').html(days);
        $('#timer .hours .digits').html(hours);
        $('#timer .minutes .digits').html(minutes);
        $('#timer .seconds .digits').html(seconds);

    }, 1000);
}

$(function() {
    $('input[name=code]').mask("****-****");

    $(window).scroll(function() {
        var button = $('#up-arrow');
        if ($(this).scrollTop() > $(this).outerHeight()) button.fadeIn();
        else button.fadeOut();
    });

    $('#up-arrow').click(function() {
        $(window).scrollTop(0);
    });

    $('input[type=radio]').each(function () {
        var _self = $(this);
        _self.click(function () {
            _self.toggleClass('checked');
            if (!_self.hasClass('checked')) {
                _self.removeAttr('checked');
            }
        });
    });

    $('input[name=agree_rules]').click(function () {
        if ($(this).is(':checked')) {
            $('button[type=submit]').removeAttr('disabled');
        } else {
            $('button[type=submit]').attr('disabled','disabled');
        }
    });

    $('.icon-close').click(function() {
        $('#pop-up').remove();
    });
});