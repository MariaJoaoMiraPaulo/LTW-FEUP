function submittedLogin() {
    username = $('#usernameSelected').val();
    password = $('#passwordSelected').val();

    console.log(username);
    console.log(password+"\n");

    $.ajax({
        type: "POST",
        url: "db/register.php",
        data:{
            "username":username,
            "password":password
        }
    });
}


