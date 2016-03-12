<?php
    //so this partial is simply meant to update the controller button when the view is opened depending on the user that visits that page
    $class = "btn btn-primary";
    $text = "Request";

    if($studentsRequests != null)
    {
        foreach($studentsRequests as $request)
        {
            if($request->postId == $results->postId)
            {
                if($request->requestStatus == 1){
                    $class = "btn btn-success";
                    $text = "Accepted";
                }
                else if($request->requestStatus == 2){
                    $class = "btn btn-danger";
                    $text = "Rejected";
                }
            }
        }
    }
?>