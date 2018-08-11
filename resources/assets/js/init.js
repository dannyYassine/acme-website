(function () {
    'use strict';

    $(document).foundation();

    // check for current page
    $(document).ready(function () {
        switch ($('body').data('page-id')) {
            case 'home':
                break;
            case 'adminCategories':
                ACMESTORE.admin.update();
                ACMESTORE.admin.delete();
                ACMESTORE.admin.create();
                break;
            default:
                // do nothing
        }
    });
}());