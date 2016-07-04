'use strict';
// WE DEFINED A GLOBAL OBJECT (Im really proud of this :D )
var SEED = {
    //Start the Ajax request
    getBlog: function () {
        jQuery.ajax({
            url: 'admin/getBlogAdmin.php',
            type: 'POST',
        }).done(function (response) {
            var data = JSON.parse(response)
              jQuery.each(data, function (index, value) {
                  jQuery('.gridder').append(
                    '<li class="gridder-list" data-griddercontent="' + index + '">' +
                    '<img src="' + value.pathImg + '"/>' +
                    '<span class="title">' + value.titulo + '</span>' +
                    '</li>'
                );
                  jQuery('.gridder').after(
                    '<div id="content' + index +'" class="gridder-content">' + value.cuerpo + '</div>'
                    );
              });
        })
        .fail(function (response) {
            console.warn("Something went wrong with this error: ", response.status);
            console.warn("Something went wrong with this error: ", response.statusText);
        });
    },

    gridder: function () {
        $('.gridder-show').hide();
        $('.gridder-list').on('click', function() {
            $('.gridder-show h2').text('Blog ' + this.id);
            $('.gridder-show').show();
        });

    }
};
SEED.gridder();
// SEED.getBlog();
