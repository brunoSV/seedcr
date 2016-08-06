'use strict';
// WE DEFINED A GLOBAL OBJECT (Im really proud of this :D )
var SEED = {
    paginatorManager: function (value) {
        var $first = $('gridder-list:first', 'gridder'),
            $last = $('gridder-list', 'gridder');

        $("#pager-next").click(function () {
            var $next, $selected = $(".gridder-list-show");
            $next = $selected.next('li').length ? $selected.next('li') : $first;
            $selected.removeClass('gridder-list-show');
            $selected.addClass('gridder-list-hide');
            $next.addClass('gridder-list-show');
            $next.removeClass('gridder-list-hide');
            $('#pager-preview').show();
            if ($next.is(':last-child')) {
                $("#pager-next").hide();
            }
        });

        $("#pager-preview").click(function () {
            var $prev, $selected = $(".gridder-list-show");

            $prev = $selected.prev('li').length ? $selected.prev('li') : $last;
            $selected.removeClass('gridder-list-show');
            $selected.addClass('gridder-list-hide');
            $prev.addClass('gridder-list-show');
            $prev.removeClass('gridder-list-hide');
            $('#pager-next').show();
            if ($prev.is(':first-child')) {
                $("#pager-preview").hide();
            }
        });
    },
    gridderBttn: function () {
        $('.gridder-list').on('click', function() {
            var id =  $(this).attr('data-griddercontent');
            $('.gridder-show').hide();
            $('.blog-content-' + id).slideToggle('slow');
            $('.blog-content-' + id).css('display', 'inline-block');
            $('html, body').animate({
                scrollTop: $('.blog-content-' + id).offset().top - 40
            }, 1500);
        });
        $('.gridder-close').on('click', function () {
            $('.gridder-show').slideUp();
            $('html, body').animate({
                scrollTop: $('.gridder').offset().top - 40
            }, 1500);
        });
    },
    //Start the Ajax request
    getBlog: function () {
        var language,
            showClass = 'gridder-list-show',
            count;
        if ($('#seed-eng').length) {
            language = 1;
        } else {
            language = 0;
        }
        $.ajax({
            url: 'admin/getBlog.php',
            type: 'POST',
            data: {pBit: language},
        }).done(function (response) {
            var data = JSON.parse(response);
              $.each(data, function (index, value) {
                if (index <= 8) {
                    jQuery('#pager-next').hide();
                    jQuery('#pager-preview').hide();
                }
                if (index > 8) {
                    jQuery('#pager-next').show();
                    showClass = 'gridder-list-hide';
                }
                $('.gridder').append(
                    '<li class="gridder-list ' + showClass + ' col-lg-3 col-md-6" data-griddercontent="' + value.id + '">' +
                        '<h3>' + value.titulo + '</h3>' +
                        '<img class="img-blog" src="admin/' + value.pathImg + '"/>'+
                    '</li>'
                );
                $('.blog-gridder-show').append(
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
                count = index;

              });
            SEED.gridderBttn();
            SEED.paginatorManager(count);
        })
        .fail(function (response) {
            console.warn("Something went wrong with this error: ", response.status);
            console.warn("Something went wrong with this error: ", response.statusText);
        });
    },

};
SEED.getBlog();
