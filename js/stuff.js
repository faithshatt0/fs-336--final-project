/* global $*/

$(document).ready(function(){
    
    $("#logoutBtn").click( function() {
        window.location.href="logout.php";
    });
    
    $("#addExploreBtn").click( function() {
        window.location.href="addExplore.php";
    });
    
    var moreExist = true;

    if($('#postImage0').length > 0 && moreExist == true) {
        $('#postImage0').click( function() {
            window.location = 'blog.php?postName=' + $('#postImage0').attr('name');
        });
    } else {
        moreExist = false;
    }
    
    if($('#postImage1').length > 0 && moreExist == true) {
        $('#postImage1').click( function() {
            window.location = 'blog.php?postName=' + $('#postImage1').attr('name');
        });
    } else {
        moreExist = false;
    }
    
    if($('#postImage2').length > 0 && moreExist == true) {
        $('#postImage2').click( function() {
            window.location = 'blog.php?postName=' + $('#postImage2').attr('name');
        });
    } else {
        moreExist = false;
    }
    
    $('#editBlogBtn').click(function() {
        window.location = 'editBlog.php?postNam=' + $('#editBlogBtn').attr('name');
    });
    
    $('#doneBtn').click(function () {
        $.ajax({
            type : "POST",
            url : "updatePost.php",
            dataType : "json",
            data : { "username" : $('#usernameHere').val(),
                     "newContent" : $('#editPost').text(),
                     "postName" : $('#postNameHere').val()},
            success : function(data) {
                window.location.href = 'blog.php';
            }
        });
    });
    
});