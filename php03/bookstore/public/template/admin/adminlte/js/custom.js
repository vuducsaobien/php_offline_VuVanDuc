$(document).ready(function () {
	var searchParams = new URLSearchParams(window.location.search);
	var moduleName = searchParams.get('module');
    var controllerName = searchParams.get('controller');

    // Change Password Button
    $('.btn-generate-password').click(function(e){
        e.preventDefault()
        var newString = randomString()
        // $('#generatepassword').val(newString);
        $('input[name="new-password"]').val(newString);
    })
    
    // Check all
	$('#check-all').change(function () {
        var checkStatus = this.checked;
        $('#form-table input[name="checkbox[]"]').each(function () {
            this.checked = checkStatus;
        });
        showSelectedRowInBulkAction();
    });

	// Number Check All
    $('#form-table input[name="checkbox[]"]').change(function () {
        showSelectedRowInBulkAction();
    });

    // Clear Search
	$('#btn-clear-search').click(function () {
		$('input[name=search]').val('');
	});

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
		
	// AJAX FILTER GROUP ACP SELECT BOX CHECK
	$('#filter-bar select[name=filter_group_acp]').change(function () {
		$('#filter-bar').submit();
    });

    // Bulk Acion Multi Acion
    $('#bulk-apply').click(function () {
        var action = $('#bulk-action').val();
        var link = 'index.php?module=' + moduleName + '&controller=' + controllerName + '&action=';
        var countCheckInput = $('[name="checkbox[]"]:checked').length

        switch (action) {
            case 'multi-active':
                link += 'multi_active';
                break;

            case 'multi-inactive':
                link += 'multi_inactive';
                break;

            case 'multi-delete':
                link += 'multi_delete';
                break;

            case 'multi-ordering':
                link += 'multi_ordering';
                break;

            case 'multi-special':
                link += 'multi_special';
                break;

            case 'multi-unspecial':
                link += 'multi_unspecial';
                break;
            
            default:
                alert("Vui lòng chọn Bulk-Action")
                returnToPreviousPage();
                break;
        }
        checkCountInput(countCheckInput)
        $('#form-table').attr('action', link);
        $('#form-table').submit();
    });    

    // AJAX FILTER GROUP SELECT BOX CHECK USER
	$('#filter-bar select[name=filter_group_id]').change(function () {
		$('#filter-bar').submit();
    });

    // AJAX FILTER CATEGORY
	$('#filter-bar select[name=filter_category_id]').change(function () {
		$('#filter-bar').submit();
    });

    // AJAX FILTER SPECIAL
    $('#filter-bar select[name=filter_special]').change(function () {
		$('#filter-bar').submit();
    });

    // Change ordering event
    $('.chkOrdering').change(function () {
        $chkOrdering = $(this);
        let ordering = $(this).val();
        let id = $(this).data('id');
        let url = `index.php?module=${moduleName}&controller=${controllerName}&action=ajaxOrdering&id=${id}&ordering=${ordering}`;
        $.get(url, function (data) {
            console.log(data);

            // if (data > 0) {
                $('.modified-' + data.id).html(data.modified);
                $chkOrdering.notify('Cập nhật thành công!', {
                    className: 'success',
                    position: 'top center',
                });
            // });
        // }
        });
    });

    // Change group event    
    $('[name="slb_group_id"]').change(function () {
        $currentSelectGroup = $(this);
        let groupId = $(this).val();
        let userId = $(this).data('id');
        var url = 'index.php?module=' + moduleName + '&controller=' + controllerName + `&action=ajaxChangeGroup&id=${userId}&group_id=${groupId}`;
        // let url = `index.php?module=backend&controller=user&action=ajaxChangeGroup&id=${userId}&group_id=${groupId}`;
        
        $.get(
            url,
            function (data) {
                $('.modified-' + data.id).html(data.modified);
                // showToast('success', 'edit');
                $currentSelectGroup.notify('Cập nhật thành công!', {
                    className: 'success',
                    position: 'top center',
                });
            },
            'json'
        );
    });

    // Change category event    
    $('[name="slb_category_id"]').change(function () {
        $currentSelectGroup = $(this);
        let category_id = $(this).val();
        let userId = $(this).data('id');
        var url = 'index.php?module=' + moduleName + '&controller=' + controllerName + `&action=ajaxChangeCategory&id=${userId}&category_id=${category_id}`;
        // let url = `index.php?module=backend&controller=user&action=ajaxChangeGroup&id=${userId}&group_id=${groupId}`;
        
        $.get(
            url,
            function (data) {
                $('.modified-' + data.id).html(data.modified);
                // showToast('success', 'edit');
                $currentSelectGroup.notify('Cập nhật thành công!', {
                    className: 'success',
                    position: 'top center',
                });
            },
            'json'
        );
    });

   $('.my-btn-ajax').click(function (e) {
    e.preventDefault()
    var myBtnState = $(this);
    var url = $(this).attr('href');
    $.get(
        url,
        function (data) {
            console.log(data);
            if (data.state == 1 || data.state == 'active') {
                myBtnState.removeClass('btn-danger');
                myBtnState.addClass('btn-success');
                myBtnState.find('i').attr('class', 'fas fa-check');
            } else {
                myBtnState.removeClass('btn-success');
                myBtnState.addClass('btn-danger');
                myBtnState.find('i').attr('class', 'fas fa-minus');
            }

            $('.modified-' + data.id).html(data.modified);
            myBtnState.attr('href', data.link);
            showNotify(myBtnState, 'success-update');
        },
        'json'
    );
});

});

function randomString()
{
    var stringRandom = Math.random().toString(36).slice(-10);
    return stringRandom;
}

function checkCountInput(countCheckInput)
{
    if(countCheckInput <= 0)
    {
        alert("Chọn ít nhất 1 ô dữ liệu!")
        returnToPreviousPage();
    }
}

function showSelectedRowInBulkAction() {
    let checkbox = $('#form-table input[name="checkbox[]"]:checked');
    let navbarBadge = $('#bulk-apply .navbar-badge');
    if (checkbox.length > 0) {
        navbarBadge.html(checkbox.length);
        navbarBadge.css('display', 'inline');
    } else {
        navbarBadge.html('');
        navbarBadge.css('display', 'none');
    }
}

function submitForm(url) {
	$('#admin-form').attr('action', url);
	$('#admin-form').submit();
}

function sortList(column, order) {
	$('input[name=sort_field]').val(column);
	$('input[name=sort_order]').val(order);
	$('#form-table').submit();
}

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





