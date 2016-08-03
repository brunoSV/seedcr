'use strict';
// WE DEFINED A GLOBAL OBJECT (Im really proud of this :D )
var SEED = {
    gridderBttn: function () {
        $('.gridder-list').on('click', function() {
            var id =  $(this).attr('data-griddercontent');
            jQuery('.gridder-show').hide();
            jQuery('.blog-content-' + id).slideToggle('slow');
            jQuery('.blog-content-' + id).css('display', 'inline-block');
            $('html, body').animate({
                scrollTop: $('.blog-content-' + id).offset().top - 40
            }, 1500);
        });
        $('.gridder-close').on('click', function () {
            jQuery('.gridder-show').slideUp();
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
              jQuery.each(data, function (index, value) {
                jQuery('.gridder').append(
                    '<li class="gridder-list col-lg-3 col-md-6" data-griddercontent="' + value.id + '">' +
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
                                                    '<img src="admin/' + value.pathImg + '" class="img-responsive img-blog">' +
                                                    '<div class="carousel-caption">' +
                                                        value.titulo +
                                                    '</div>' +
                                                '</div>' +
                                            '</div>' +
                                        '</div>' +
                                    '</div>' +
                                    '<div class="body-blog col-sm-6">' +
                                        '<h2>' + value.titulo + '</h2>' +
                                        '<span class="text-muted">By ' + value.nombreAutor + '</span>' +
                                        '<p>' + value.cuerpo + '</p>' +
                                    '</div>' +
                            '</div>' +
                        '</div>' +
                    '</div>'
                );
              });
            SEED.gridderBttn();
        })
        .fail(function (response) {
            console.warn("Something went wrong with this error: ", response.status);
            console.warn("Something went wrong with this error: ", response.statusText);
        });
    },

};
SEED.getBlog();
