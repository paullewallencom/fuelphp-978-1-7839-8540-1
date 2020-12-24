// When the DOM is ready
$(function(){
    // jQuery elements initialization
    var $postContent = $('#post_content');
    var $postRemainingCharacters =
        $('#post_remaining_characters');
    var $postSuccess = $('#post_success');
    var $postFail = $('#post_fail');
    var $postSubmitButton = $('#post_submit_button');
    
    // Defining the max number of characters of a post
    var postMaxNbCharacters =
        MMBConfiguration['post_max_nb_characters'];

    
    /*
    Refreshes the remaining number of characters indicator,
    and whether or not the submission button is enabled.
    */
    function refreshPostWindow() {
        var postLength = $postContent.val().length;
        var remainingCharacters =
            postMaxNbCharacters - postLength;
        
        $postRemainingCharacters
        .text(remainingCharacters)
        .attr(
            'class',
            remainingCharacters >= 0 ? '' : 'too_much'
        );
        
        $postSubmitButton.prop(
            'disabled',
            postLength == 0 || remainingCharacters < 0
        );
    }
    
    // Initialization
    refreshPostWindow();
    
    /*
    When showing the post creation modal window, clearing
    all previous messages. Useful if a user publishes many
    posts in a row.
    */
    $('#create_post_modal')
    .on('show.bs.modal', function() {
        $postFail.hide();
        $postSuccess.hide();
    });
    
    // When the user type in the post textarea
    $postContent.keyup(function() {
        // In case he writes two posts in a row
        $postSuccess.hide();
        // See comments above
        refreshPostWindow();
    });
    
    // When clicking on the submit button
    $postSubmitButton.click(function() {
        
        // Sending an AJAX POST request to post/create.json
        // with the post content.
        $.post(
            'post/create.json',
            {post_content: $postContent.val()}
        )
        .done(function(data) {
            // In case the connection succeeded
            
            /*
            The action will defines whether or not the
            post passed validation using the data.success
            variable.
            */ 
            if (data.success) {
                // If succeeded
                $postFail.hide();
                $postContent.val('');
                refreshPostWindow();
                $postSuccess.show();
            } else {
                // If failed, the error message will be
                // defined in data.error.
                $postFail
                .text(data.error)
                .show();
            }
        })
        .fail(function() {
            // In case the connection failed
            $postFail
            .text('Sorry, it seems there was an issue ' +
                  'somewhere. Please try again later.')
            .show();
        });
    });
});
