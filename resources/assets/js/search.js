/**
 * Created by Lothar on 29/05/17.
 */

$(function () {
    console.log('test');
    console.log$('#classes-sel').val(););
    showLevelIfClassSelected();

    $('#classes-sel').on('change', function(){
        showLevelIfClassSelected();
        console.log('val:'+$('#classes-sel').val());
    })

});


function showLevelIfClassSelected(){
    if($('#classes-sel').val() != ''){
        $('#spell-level-sel').show();
    }
}
