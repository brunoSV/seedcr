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
            console.log(data);
              jQuery.each(data, function (index, value) {
                jQuery('.gridder').append(
                    '<li class="gridder-list col-lg-3 col-md-6" data-griddercontent="' + index + '">' +
                        '<img src="http://placehold.it/200x200&amp;text=' + value.titulo + '"/>'+
                    '</li>'
                );
                jQuery('.gridder').append(
                    '<div class="gridder-show">' +
                        '<div class="gridder-padding">' +
                            '<div class="gridder-navigation">' +
                                '<a class="gridder-close">Close</a>' +
                            '</div>' +
                            '<div class="gridder-expanded-content">' +
                                '<div class="row">' +
                                    '<div class="col-sm-6">' +
                                        '<div id="carousel-0" class="carousel slide">' +
                                            '<div class="carousel-inner" role="listbox">' +
                                                '<div class="item active">' +
                                                    '<img src="" class="img-responsive">' +
                                                    '<div class="carousel-caption">' +
                                                        'Blog' +
                                                    '</div>' +
                                                '</div>' +
                                            '</div>' +
                                        '</div>' +
                                    '</div>' +
                                    '<div class="body-blog col-sm-6">' +
                                        '<h2>' + value.titulo + '</h2>' +
                                        '<p>' + value.cuerpo + '</p>' +
                                    '</div>' +
                            '</div>' +
                        '</div>' +
                    '</div>'
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
        $('.gridder-close').on('click', function() {
            $('.gridder-show').hide();
        });

    }
};
SEED.gridder();
SEED.getBlog();
