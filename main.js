$(document).ready(function(){
    var current_nameItem = "down";
    $(".select-item").click(function(){
        let name_item = $(this).attr('name_item');
        $('#'+current_nameItem).removeClass('activeI');
        $('#show_item_text').text(name_item);
        $('#'+name_item).addClass('activeI');
        current_nameItem = name_item;
    });
    $('#reset').click(function(){
        $('td').each(function(){
            $(this).css('background-image', 'none');
        });
        $('#'+current_nameItem).removeClass('activeI');
        $('#show_item_text').text('down');
        $('#down').addClass('activeI');
        current_nameItem = "down";
    });
});

$('td').each(function(){
    $(this).click(function(){
        var id = $('.activeI').attr('id');
        if(id != undefined){
            var bg =  'url("img/'+id+'.jpg")';
            $(this).css('background-image', bg);
        }
  });
});

