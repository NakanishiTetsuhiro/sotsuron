$(function() {
  $(".kind-box").change(function() {
    var kindBoxValue = $('select[name="kindBox"]').val();
    console.log(kindBoxValue);
    var foodBoxId = $(this).parents('[id^=food-box-]').attr('id');

    $.ajax({
        type: "POST",
        scriptCharset: 'utf-8',
        dataType: "json",
        url: "get-food-name.php",
        data: {
          item:kindBoxValue
        },
    }).done(function(data){
        // alert(data);
        // console.log(data[0]);
        // alert('success!!');
        // var foodBoxId = $(this).closest(li).attr('id');

        console.log(foodBoxId);

        $('#' + foodBoxId + ' .food-name-box > option').remove();
        for (var i = 0; i < data.length; i++){
          $('.food-name-box').append($('<option>').html(data[i]["japanese"]).val(data[i]["id"]));
        }
    }).fail(function(data){
        alert('error!!!' + data);
    });
  });
});