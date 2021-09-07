'use strict';
$(document).ready(function () {

    $(document).on('click', 'a.tour', function () {
        var enjoyhint_instance = new EnjoyHint({});

        enjoyhint_instance.set([
            {
                'next .header': 'دسترسی سریع.',
            },
            {
                'next .navigation': 'از این نویگیشن برای رفتن به قسمت های مختلف استفاده کنید.',
            }
        ]);
        enjoyhint_instance.run();
    });

});