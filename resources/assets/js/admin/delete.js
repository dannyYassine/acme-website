;(function (admin) {
    'use strict';

    admin.delete = function () {

        $('table[data-form="deleteForm"]').on('click', '.delete-item', function (event) {
            event.preventDefault();

            let form = $(this);

            $('#confirm').foundation('open').on('click', '#delete-btn', function () {
                form.submit();
            });
        });
    }

}(window.ACMESTORE.admin));