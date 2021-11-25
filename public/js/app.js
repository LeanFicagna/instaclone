let arrayImg = [];
let i;

let arrayLike = [];

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}
$('.effect-img').each(function (i, e) {arrayImg.push($(e).data('img'))});

$('.item.like').each(function (i, e) {arrayLike.push($(this))});

$(document).ready(function () {
    $('.post-image[data-img!=""]').each(function (index, elem) {
        $(elem).css('background-image', 'url(' + $(elem).data('img') + ')');
    });

    $

    $('.item.like').each(function (index, elem) {
        $(this).on('click', function (event) {
            $.ajax({
                url: arrayLike[index].attr('value'),
                type: 'GET',
                dataType: 'json',
                success: async function (response) {
                    await sleep(200);
                    if(response['like'] == 'liked') {
                        $('div.img-liked')[index].classList.add('reded');
                        $(elem).toggleClass('liked');
                        $('.item-like')[index].innerText = parseInt($('.item-like')[index].innerText) + 1;
                    } else if(response['like'] == 'removed') {
                        $('div.img-liked')[index].classList.remove('reded');
                        $(elem).toggleClass('liked');
                        $('.item-like')[index].innerText = parseInt($('.item-like')[index].innerText) - 1;
                    }
                },
                error: function () {
                    console.log('Liked fail');
                }
            });
        });
    });

    $('.post-image').each(function (index, elem) {
        $(this).on('dblclick', function (event) {
            $.ajax({
                url: arrayLike[index].attr('value'),
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    if(response['like'] == 'liked') {
                        $('div.img-liked')[index].classList.add('reded');
                        $(arrayLike[index]).toggleClass('liked');
                        $('.item-like')[index].innerText = parseInt($('.item-like')[index].innerText) + 1;
                    } else if(response['like'] == 'removed') {
                        $('div.img-liked')[index].classList.remove('reded');
                        $(arrayLike[index]).toggleClass('liked');
                        $('.item-like')[index].innerText = parseInt($('.item-like')[index].innerText) - 1;
                    }
                },
                error: function () {
                    console.log('Liked fail');
                }
            });
        });
    });

    $("input#img-user").change(function(event){
        console.log($('form.form-user'));
        // $(this).preventDefault();
        $('form.form-user').submit();
    })

    $('.effect-img-perfil').each(function (index, elem) {
        $(elem).on('click', function (event) {
            i = index;
            changeImg(i, null);
            $('.prev').on('click', function (e) {
                changeImg(false);
            });
            $('.next').on('click', function (e) {
                changeImg(true);
            });
        });
    })
});

function changeImg(next) {
        if(next == true && i < arrayImg.length -1) {
            i++;
        }
        else if(next == false && i > 0) {
            i--;
        }
    $('#open-img').modal('show');
    $('.show-img').css('background-image', 'url(' + arrayImg[i] + ')');
}
