/*
Converts a timestamp to relative format.
You could use plugins as jquery.timeago for doing that, and
it would probably be better that way, but we implemented
ourselves the method for being sure we won't have any
compatibility issues in the future.
*/
function relativeFormat(timestamp) {
    var timeLabels = [
        {
            divider: 31536000,
            label: '(:nb) year ago',
            label_plural: '(:nb) years ago'
        },
        {
            divider: 2592000,
            label: '(:nb) month ago',
            label_plural: '(:nb) months ago'
        },
        {
            divider: 86400,
            label: '(:nb) day ago',
            label_plural: '(:nb) days ago'
        },
        {
            divider: 3600,
            label: '(:nb) hour ago',
            label_plural: '(:nb) hours ago'
        },
        {
            divider: 60,
            label: '(:nb) minute ago',
            label_plural: '(:nb) minutes ago'
        }
    ];
    
    var seconds = Math.floor(
        (new Date() - timestamp) / 1000);

    for (var i = 0; i < timeLabels.length; i++) {
        var nb = Math.floor(seconds / timeLabels[i].divider);
        
        if (nb > 0) {
            var label = timeLabels[i][
                (nb == 1 ? 'label' : 'label_plural')];
            return label.replace('(:nb)', nb);
        }
    }
    return 'Few seconds ago';
}

// Refresh all posts dates
function refreshPostsDates() {
    $('.post_date').each(function() {
        var $this = $(this);
        $this.text(
            relativeFormat(
                parseInt($this.data('timestamp')) * 1000
            )
        );
    });
}

// When the DOM is ready
$(function(){
    refreshPostsDates();
    
    // Regularly refresh posts dates (every 30000ms = 30s)
    setInterval(refreshPostsDates, 30000);
});
