(function($) {
    $.fn.prettyFileInput = function(options) {
        var defaults = {
            inputHolderClass: 'file-input',
            buttonClass: 'btn',
            additionalButtonClasses: 'btn-file-input',
            buttonActiveClass: 'btn-file-input-active',
            fakeFileHolderClass: 'file-holder',
            defaultText: 'выберите файл',
            defaultFileSelectedText: 'файл указан'

        };
        var options = $.extend(defaults, options);

        return this.each(function() {

            var obj = $(this);

            obj.wrap('<span class="' + options.inputHolderClass + '"></span>');
            obj.after('<span class="' + options.buttonClass + ' ' + options.additionalButtonClasses + '">' + options.defaultText + '</span>');

            obj.bind('change focus click', function() {

                $val = obj.val();

                valArray = $val.split('\\');
                newVal = valArray[valArray.length - 1];
                $button = obj.siblings('.' + options.buttonClass + '');
                $fakeHolder = obj.siblings('.' + options.fakeFileHolderClass + '');

                if (newVal !== '') {
                    $button.addClass(options.buttonActiveClass).html(options.defaultFileSelectedText);
                }

                if ($fakeHolder.length === 0) {
                   //obj.parent().append('<strong class="'+options.fakeFileHolderClass+'"></strong>');
                } else {
                    //$fakeHolder.text(newVal);
                }

                if (($fakeHolder.length > 0) && (newVal === '')) {
                    $fakeHolder.remove();
                    $button.html(options.defaultText).removeClass().addClass(options.buttonClass + ' ' + options.additionalButtonClasses);
                }

            });
        });
    };
})(jQuery);
