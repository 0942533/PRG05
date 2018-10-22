var cardId = 0;

$(document).ready(function() {
    // If there has been clicked on the like element, de function will be executed
    $('.like').on('click', function () {
        event.preventDefault();

        // Get the card id
        postId = event.target.parentNode.parentNode.dataset['postid'];

        // Check if you have a like or dislike event
        var isLike = event.target.previousElementSibling == null;

        // Send the Ajax request
        $.ajax({
            method: 'POST',
            url: urlLike,
            // We will use one single route and we will pass a parameter if it's is a like or dislike action
            data: {isLike: isLike, cardId: cardId, _token: token}
        })

        // Done callback
        .done(function(){
            // Change te page
        });
    });
});