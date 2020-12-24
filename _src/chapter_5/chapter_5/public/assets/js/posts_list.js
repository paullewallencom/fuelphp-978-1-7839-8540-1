// When the DOM is ready
$(function() {
    
    // Triggered when the user clicks on the see more button
    $('body').on(
        'click',
        '.post_list .see_more button',
        function() {
            // JQuery elements initialization
            var $this = $(this);
            var $post_list = $this.closest('.post_list');
            var $see_more = $this.closest('.see_more');
            
            // Getting user_id and before_id (last displayed
            // post id)
            var user_id = $post_list.data('user_id');
            var before_id =
                $post_list.find('.post:last').data('post_id');
            
            /*
            Adding the loading class to the see more in order
            to tell the user we are loading older posts.
            */
            $see_more.addClass('loading');
            
            // Getting the older posts
            $.get(
                'post/list.json',
                {
                    user_id: user_id,
                    before_id: before_id
                }
            )
            .done(function(data) {
                if (data != null) {
                    // Displaying loaded posts
                    $see_more.before(
                        render('post/inside_list', {posts: data})
                    );
                } else {
                    // Everything has been loaded, no need
                    // to show the See more button anymore
                    $see_more.addClass('all_loaded');
                }
                $see_more.removeClass('loading');
                
                // Refreshing posts dates
                refreshPostsDates();
            })
            .fail(function() {
                $see_more.removeClass('loading');
                alert('Sorry, it seems there was an issue ' +
                      'somewhere. Please try again later.');
            });
            
        }
    );
    
    // When the See more button appears in the screen, the following
    // code triggers a click on it to load older posts, resulting in
    // an infinite scroll
    $(document).scroll(function() {
        var $this = $(this);
        var $see_more_button = $('.see_more button');
        if ($see_more_button.length > 0 &&
            $see_more_button.is(':visible')) {
            if (
                $this.scrollTop() + $(window).height() >
                $see_more_button.offset().top) {
                $see_more_button.click();
            }
        }
    });


});
