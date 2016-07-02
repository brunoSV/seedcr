'use strict';
// WE DEFINED A GLOBAL OBJECT (Im really proud of this :D )
var SEED = {
    //Start the Ajax request
    getBlog: function () {
        jQuery.ajax({
            url: '/admin/getBlog.php',
            type: 'GET'
        }).done(function (response) {
            var data = JSON.parse(response)
              jQuery.each(data, function (index, value) {
                  jQuery('.gridder').append(
                    '<li class="gridder-list" data-griddercontent="' + index + '">' +
                    '<img src="' + value.pathImg + '"/>'                          +
                    '<span class="title">' + value.titulo + '</span>'       +
                    '</li>'
                );
              });
        })
        .fail(function (response) {
            console.warn("Something went wrong with this error: ", response.status);
            console.warn("Something went wrong with this error: ", response.statusText);
        });
    }
};
SEED.getBlog();
