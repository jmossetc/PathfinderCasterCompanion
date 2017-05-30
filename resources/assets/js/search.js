/**
 * Created by Lothar on 29/05/17.
 */

$(function () {
    showLevelIfClassSelected();
    $('#classes-sel').on('change', function () {
        showLevelIfClassSelected();

    })

    $('.filter-input').on('change', function () {
        $.ajax({
            url: '/spells',
            type: "post",
            data: {
                'name':$('#spell-search-text').val(),
                'school': $('#schools-sel').val(),
                'class': $('#classes-sel').val(),
                'level': $('#spell-level-sel').val(),
                '_token': $('input[name=_token]').val()
            },
            success: function (data) {
                //alert(data);
                console.log('success!');
            }
        });
    });

})


function showLevelIfClassSelected() {
    if ($('#classes-sel').val() != '') {
        $('#spell-level-sel').show();
    }
    else {
        $('#spell-level-sel').hide();
        $('#spell-level-sel').val('');
    }
}
