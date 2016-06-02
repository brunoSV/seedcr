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
        });
  }

  // arr = $.map(JSON.parse(data), function(el) { return el });
  //       for (i=0;i<arr.length;i++){
  //           $('#result').append(
  //               '<form>'+
  //               '<input type="text" name="pTitulo" value ="'+arr[i].titulo+'">'+
  //               '<input type="text"  name="pNombreAutor" value ="'+arr[i].nombreAutor+'">'+
  //               '<textarea name="pCuerpo" >'+arr[i].cuerpo+'</textarea>'+
  //               '<input type="date" name="pFecha" value ="'+arr[i].fecha+'">'+
  //               '<input type="checkbox" checked ='+arr[i].pBit+' name="pBit">Ingles '+
  //               '<button onclick = "UpdateBlog('+i+')">Guardar</button>'+
  //               '<button onclick = "DeleteBlog('+i+')">Eliminar</button>'+
  //               '</form>');
  //       }
//<li class="gridder-list" data-griddercontent="#content1">
                //     <img src="" />
                // </li>

};