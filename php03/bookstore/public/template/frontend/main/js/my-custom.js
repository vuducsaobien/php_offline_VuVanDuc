$(document).ready(function () {
    // activeMenu();

// DUC
    var searchParams = new URLSearchParams(window.location.search);
    var moduleName = searchParams.get('module');
    var controllerName = searchParams.get('controller');
    
    // Prevent delete button
	$('.btn-delete-item').click(function (e) {
		var countCheckedInput = $('[name="checkbox[]"]:checked').length;
		if(countCheckedInput<0){
			alert('Vui Lòng Chọn Phần Tử Muốn Xóa');
		}
	   e.preventDefault();
	   if (confirm("Bạn có muốn xóa phần tử này không ??")) {
		   link = $(this).attr('href');
		   window.location.assign(link);
	   }
    });

    // Change input cart number order
    $('.input-change-quantities').change(function () {
        $inputChange = $(this);
        let quantities = $(this).val();
        let id = $(this).data('id');
        let url = `index.php?module=${moduleName}&controller=${controllerName}&action=ajaxQuantitiesCart&id=${id}&quantities=${quantities}`;

        $.get(url, function (data) {
            console.log(data);

                $('.modified-' + data.id).html(data.modified);
                $inputChange.notify('Cập nhật thành công!', {
                    className: 'success',
                    position: 'top center',
                });
        });
    });


// DUC

    // Caculate Slide height
    $('.slide-5').on('setPosition', function () {
        $(this).find('.slick-slide').height('auto');
        var slickTrack = $(this).find('.slick-track');
        var slickTrackHeight = $(slickTrack).height();
        $(this)
            .find('.slick-slide')
            .css('height', slickTrackHeight + 'px');
        $(this)
            .find('.slick-slide > div')
            .css('height', slickTrackHeight + 'px');
        $(this)
            .find('.slick-slide .category-wrapper')
            .css('height', slickTrackHeight + 'px');
    });

    $('.breadcrumb-section').css('margin-top', $('.my-header').height() + 'px');
    $('.my-home-slider').css('margin-top', $('.my-header').height() + 'px');

    $(window).resize(function () {
        let height = $('.my-header').height();
        $('.breadcrumb-section').css('margin-top', height + 'px');
        $('.my-home-slider').css('margin-top', height + 'px');
    });

    // show more show less
    if ($('.category-item').length > 10) {
        $('.category-item:gt(9)').hide();
        $('#btn-view-more').show();
    }

    $('#btn-view-more').on('click', function () {
        $('.category-item:gt(9)').toggle();
        $(this).text() === 'Xem thêm' ? $(this).text('Thu gọn') : $(this).text('Xem thêm');
    });

    $('li.my-layout-view > img').click(function () {
        $('li.my-layout-view').removeClass('active');
        $(this).parent().addClass('active');
    });

    $('#sort-form select[name="sort"]').change(function () {
        // console.log(getUrlParam('filter_price'));
        if (getUrlParam('filter_price')) {
            $('#sort-form').append(
                '<input type="hidden" name="filter_price" value="' +
                    getUrlParam('filter_price') +
                    '">'
            );
        }

        if (getUrlParam('search')) {
            $('#sort-form').append(
                '<input type="hidden" name="search" value="' +
                    getUrlParam('search') +
                    '">'
            );
        }

        $('#sort-form').submit();
    });


    setTimeout(function () {
        $('#frontend-message').toggle('slow');
    }, 4000);
});

function activeMenu() {
    // let controller = getUrlParam('controller') == null ? 'index' : getUrlParam('controller');
    // let action = getUrlParam('action') == null ? 'index' : getUrlParam('action');
    let dataActive = controller + '-' + action;
    $(`a[data-active=${dataActive}]`).addClass('my-menu-link active');
}

function getUrlParam(key) {
    let searchParams = new URLSearchParams(window.location.search);
    return searchParams.get(key);
}

// DUC
function quickView(linkAction)
{
    var searchParams = new URLSearchParams(window.location.search);
    var moduleName = searchParams.get('module');
    var controllerName = searchParams.get('controller');
    var linkImage = '/php_offline_VuVanDUC/php03/bookstore/public/files/book/'
    // $linkDetail = URL::createLink('frontend', 'book', 'index', ['book_id' => $bookID, 'category_id' => $cateID], 
    // "$cateNameURL/$bookNameURL-$cateID-$bookID.html");
    $.get(linkAction, function(data)
        {
            console.log(data)
            var bookID = data.id
            var cateID = data.category_id
            // var linkDetail = `index.php?module=${moduleName}&controller=book&action=index&book_id=${bookID}&category_id=${cateID}`;
            var linkDetail = `index.php?module=${moduleName}&controller=book&action=index&book_id=39&category_id=6`;

            $('h2.book-name').html(data.name)
            $('h3.book-price').html(data.price_format)
            // $('h3.book-price').html(data.price)
            // $('del').html(data.price_format)
            $('div.book-description').html(data.short_description)
            $('img.book-picture').attr('src', linkImage+data.picture)
            // $('img.book-picture')[0].src += data.picture
            $('div.product-buttons #button-detail').attr('src', linkDetail)
            // $('#button-detail').attr('src', linkDetail)
        }, 
        'json'
    );
};

function addToCart(link)
{
    var addCart = $('li.mobile-cart div a');
    $.get(link, function(data)
        {
            // console.log(data);
            $('li.mobile-cart div a span').html(data);
            showNotify(addCart, 'success-update');
        }, 
        'json'
    );
};

function showNotify($element, $type = 'success-update') {
    switch ($type) {
        case 'success-update':
            $element.notify('Cập nhật thành công!', {
                className: 'success',
                position: 'top center',
            });
            break;
    }
}


// DUC
