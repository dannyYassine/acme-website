;(function (admin) {
    'use strict';

    admin.update = function () {
        $('.update-category').click(function (event) {
            event.preventDefault();

            const token = $(this).data('token');
            const id = $(this).attr('id');
            const name = $('#item-name-'+id).val();

            $.ajax({
                type: 'POST',
                url: `/admin/product/categories/${id}/edit`,
                data: {token, name},
                success: function (data) {
                    let response = jQuery.parseJSON(data);

                    $('.notification')
                        .css('display', 'block')
                        .delay(4000)
                        .slideUp(300)
                        .html(response.success);
                },
                error: function(request, error) {
                    let errors = jQuery.parseJSON(request.responseText);

                    let ul = document.createElement('ul');

                    $.each(errors, function (key, value) {
                        let li = document.createElement('li');

                        li.appendChild(document.createTextNode(value));
                        ul.appendChild(li);
                    });

                    $('.notification')
                        .css('display', 'block')
                        .removeClass('primary')
                        .addClass('alert')
                        .delay(6000)
                        .slideUp(300)
                        .html(ul);
                }
            });
        });

        $('.update-subcategory').click(function (event) {
            event.preventDefault();

            const token = $(this).data('token');
            const id = $(this).attr('id');
            let category_id = $(this).data('category-id');
            const name = $('#item-subcategory-name-'+id).val();

            const selected_category_id = $('#item-category-' + category_id + ' option:selected').val();

            if (category_id !== selected_category_id) {
                category_id = selected_category_id;
            }

            $.ajax({
                type: 'POST',
                url: `/admin/product/subcategory/${id}/edit`,
                data: {token, name, category_id},
                success: function (data) {
                    let response = jQuery.parseJSON(data);

                    $('.notification')
                        .css('display', 'block')
                        .delay(4000)
                        .slideUp(300)
                        .html(response.success);
                },
                error: function(request, error) {
                    let errors = jQuery.parseJSON(request.responseText);

                    let ul = document.createElement('ul');

                    $.each(errors, function (key, value) {
                        let li = document.createElement('li');

                        li.appendChild(document.createTextNode(value));
                        ul.appendChild(li);
                    });

                    $('.notification')
                        .css('display', 'block')
                        .removeClass('primary')
                        .addClass('alert')
                        .delay(6000)
                        .slideUp(300)
                        .html(ul);
                }
            });
        });

    };

}(window.ACMESTORE.admin));