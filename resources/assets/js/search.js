/**
 * Created by Lothar on 29/05/17.
 */

$(function () {
    showLevelIfClassSelected();

    var delay = (function () {
        var timer = 0;
        return function (callback, ms) {
            clearTimeout(timer);
            timer = setTimeout(callback, ms);
        };
    })();

    $('#classes-sel').on('change', function () {
        showLevelIfClassSelected();

    });

    $('.filter-input-onchange').on('change', function () {
        sendFilters()
    });

    //We se
    $('#spell-search-text').keyup(function () {
        delay(function () {
            sendFilters();
        }, 500);
    });

});

function sendFilters() {
    var delay = 250;
    $.ajax({
        url: '/spells',
        type: "post",
        data: {
            'name': $('#spell-search-text').val(),
            'school': $('#schools-sel').val(),
            'class': $('#classes-sel').val(),
            'level': $('#spell-level-sel').val(),
            '_token': $('input[name=_token]').val()
        },
        beforeSend: function () {
            $('#spinner-default').show();
        },
        success: function (data) {
            $('#spinner-default').hide();
            $('#spell-table').fadeOut().html(data).fadeIn();
            bindTableRowsClicks();
        }
    });
}


function showLevelIfClassSelected() {
    if ($('#classes-sel').val() != '') {
        $('#spell-level-sel').show();
    }
    else {
        $('#spell-level-sel').hide();
        $('#spell-level-sel').val('');
    }
}

function bindTableRowsClicks(){
    $('tr[data-href]').on("click", function () {
        document.location = $(this).data('href');
    });
}