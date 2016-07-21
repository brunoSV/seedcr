'use strict';
// WE DEFINED A GLOBAL OBJECT (Im really proud of this :D )
var SEED = {
    gridderBttn: function () {
        $('.gridder-list').on('click', function() {
            console.log('this is when i click this shit', this);
        });
    },
    //Start the Ajax request
    getBlog: function () {
        jQuery.ajax({
            url: 'admin/getBlog.php',
            type: 'POST',
            data: {pBit: 1},
        }).done(function (response) {
            var data = JSON.parse(response)
            console.log(data);
              jQuery.each(data, function (index, value) {
                jQuery('.gridder').append(
                    '<li class="gridder-list col-lg-3 col-md-6" data-griddercontent="' + index + '">' +
                        '<h3>' + value.titulo + '</h3>' +
                        '<img class="img-blog" src="admin/' + value.pathImg + '"/>'+
                    '</li>'
                );
                jQuery('.blog-gridder-show').append(
                    '<div class="gridder-show blog-content-'+ value.id +'">' +
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
        // $('.gridder-show').hide();
        console.log('here');
        // $('.gridder-list').trigger('gridderBttn');
        SEED.gridderBttn();
    },

};
SEED.getBlog();
// SEED.gridderBttn();
