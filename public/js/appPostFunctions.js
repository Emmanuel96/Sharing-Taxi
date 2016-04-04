/**
 * Created by Emmanuel on 22/03/2016.
 */
//Description: This file contains all the functions concerning the users journey posts

//Uses an ajax query to check if the statuses of the logged in users posts
function postCheck()
{
    var studentId = 1600428;
    // Get the logged in users Id
    // Send the user id with the ajax request
    $.ajax({
        type: "GET",
        data: {studentId:studentId, _token: '{{csrf_token()}}' },
        url: './loggedInUsersRequestNotification',
        success: function(output) {
            //Decode the notifications array from the server
            var results = JSON.parse(output);
            var postHTML = "";
            var n = 0;

            //Iterate for every post
            for(var post in results)
            {
                ++n;

                //Get fields from the database
                var postId = results[post]['postId'];
                var studentID = results[post]['studentId'];
                var destination = results[post]['destination'];
                var requestStatus = results[post]['requestStatus']

                //HTML Injection: generate a box
                postHTML += "<div class='notif-post' id='notif-post-" + postId + "'><div class='photo'>"
                    + "<p>"+studentId+ "</p>"+"<p>"+ destination +"<p>";

                //Add buttons to the notification box
                if(requestStatus == 0)
                {
                    postHTML += "<input type='button' id='notif-post-accept-" + postId + "' class='btn btn-primary' onclick = 'acceptRequest(" + postId + "," + studentID + ")' value='Accept' style='position:relative; margin-top: -15px;'>"
                        + "  "
                        + "<input type='button' id='notif-post-reject-" + postId + "' class='btn btn-primary' onclick = 'rejectRequest(" + postId + "," + studentID + ")' value='Reject' style='position:relative; margin-top:-15px;'>";
                }
                else if(requestStatus == 1)
                {
                    postHTML += "<p class='label label-success'>Accepted</p>"
                }
                else if(requestStatus == 2)
                {
                    postHTML += "<p class='label label-danger'>Rejected</p>"
                }
                postHTML += "</div><br><br>";
            }
            //Check if there are no notifications
            if(n > 0)
            {
                document.getElementById("notifPosts").innerHTML = postHTML;
            }
            else
            {
                document.getElementById("notifPosts").innerHTML = "You haven't created any posts.";
            }
        }
    });
}