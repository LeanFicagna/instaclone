$(document).ready(function () {
    $('.post-image[data-img!=""]').each(function (index, elem) {
        $(elem).css('background-image', 'url(' + $(elem).data('img') + ')');
    });

    $('a.like').each(function (index, elem) {
        $(this).on('click', function (event) {
            $(this).toggleClass('liked');
            // $('span.item')
            $.ajax({
                url: $(this).attr('value'),
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    console.log('Liked');
                },
                error: function () {
                    console.log('Liked fail');
                }
            });
        });
    });

    $("input#img-user").change(function(event){
        console.log($('form.form-user'));
        $('form.form-user').submit();
    })
});
