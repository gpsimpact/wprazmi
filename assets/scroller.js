jQuery(function (){
    console.log('hi');
  var qs = [];
  jQuery('.hqs-item').each(function(i, obj) {
    qs.push(obj);
});

var listTicker = function(options) {

    var listTickerInner = function(index) {

        if (options.list.length == 0) return;

        if (!index || index < 0 || index > options.list.length) index = 0;

        var value= options.list[index];

        options.trickerPanel.fadeOut(function() {
            jQuery(this).html(value).fadeIn();
        });

        var nextIndex = (index + 1) % options.list.length;

        setTimeout(function() {
            listTickerInner(nextIndex);
        }, options.interval);

    };

    listTickerInner(options.startIndex);
}


jQuery(function() {
    listTicker({
        list: qs ,
        startIndex: 0,
        trickerPanel: jQuery('#hqs'),
        interval: 8000,
    });
});
});
