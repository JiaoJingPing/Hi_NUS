(function() {
    function getPagerItem(content, url, page, classes) {
        classes = classes || '';
        if (url.indexOf('?') === -1) {
            url += '?page=' + page;
        } else if (url.indexOf('page=') === -1) {
            url += '&page=' + page;
        } else {
            url = url.replace(/page=\d+/, 'page=' + page);
        }
        return '<li class="' + classes + '"><a href="' + url + '">' + content + '</a></li>';
    }

    function getPager(total, current, url) {
        if (!total)
            return;
        current = parseInt(current);
        var items = '';
        items += getPagerItem('Prev', url, current - 1, current > 1 ? undefined : 'disabled');
        var min = current - 2;
        var max = current + 2;
        if (min <= 0) {
            max = max + 1 - min;
            min = 1;
        }
        if (max > total) {
            min = Math.max(1, min - max + total);
            max = total;
        }
        if (min !== 1)
            items += getPagerItem(1, url, 1);
        if (min > 2)
            items += getPagerItem('...', url, 0, 'disabled');
        for (var i = min; i <= max; i++)
            items += getPagerItem(i, url, i, i === current ? 'active' : '');
        if (max < total - 1)
            items += getPagerItem('...', url, 0, 'disabled');
        if (max !== total)
            items += getPagerItem(total, url, total);
        items += getPagerItem('Next', url, current + 1, current < total ? undefined : 'disabled');
        return '<div class="pagination"><ul>' + items + '</ul></div>';
    }

    $.fn.extend({
        ajaxPager: function(total, current, url, update) {
            var $container = $(this);
            var $pager = $(getPager(total, current, url));
            $container.append($pager);
            $('a', $pager).click(function(event) {
                var $parent = $(this).parent();
                if (!$parent.hasClass('active') && !$parent.hasClass('disabled'))
                    loadAjaxContent($container, $(this).attr('href'), update);
                event.preventDefault();
            });
        }
    });

    window.loadAjaxContent = function($container, url, update) {
        $.get(url, function(data) {
            update($container, data, url);
            //scroll(0,0);            
        }, 'json');
    }
})();
