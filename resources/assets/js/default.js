/**
 * Created by Lothar on 29/05/17.
 */

$(function () {
    /**
     * Link helper
     * Use data-href to specify links on an html tag
     * Made by Ron van der Heijden
     * https://stackoverflow.com/questions/1460958/html-table-row-like-a-link
     * */
    $('tr[data-href]').on("click", function () {
        document.location = $(this).data('href');
        console.log('test');
    });
});