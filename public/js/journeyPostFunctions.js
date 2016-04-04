/**
 * Created by Emmanuel on 22/03/2016.
 */
//Description: File contains all the functions required for posting a journey

//This the what happens when the user posts a new journey
function postJourneySubmit()
{
    var studentId = 1600428;
    var destination = document.getElementById("post-journey-destination").value;
    var date = document.getElementById("post-journey-date").value;
    $.ajax({
        type: "GET",
        data:{studentId:studentId, destination:destination, date:date, _token:'{{csrf_token()}}'},
        url: './postJourney',
        success: function(output)
        {
            $('#postJourney').modal('hide');
        }
        //
    });
}

//I had issues handling my date
// So i created this function as the onload function when the user opens the journey
function dateInput()
{

}

//updating the users destination on the post journey modal
//I know, this is a waste of time but oh well
function postJourney()
{
    //get the value of the destination
    var value = document.getElementById('destination').value;
    //update users destination with the value
    document.getElementById('post-journey-destination').value = value;

    //var postHTML = "<input style='height: 50px; width: 80%;' type='text' id='post-journey-destination' class='' value='" + document.getElementById("destination").value + "' placeholder='Destination'>"
    //    + "<br><br>"
    //    + "<input style='height: 50px; width: 80%;' class = 'datetimepicker' id='post-journey-date'  placeholder='Date/Time'>"
    //    + "<br><br><br>"
    //    + "<input type='button' id='post-journey-submit' class='btn btn-primary' onclick='postJourneySubmit()' value='Submit' style='position:relative; margin-top: -15px;'>"
    //    + "<br>";
    //document.getElementById("postJourneyBody").innerHTML = postHTML;
}
