
jQuery(document).ready(function($){
	//this is used for the video effect only
	if( $('.cd-bg-video-wrapper').length > 0 ) {
		var videoWrapper = $('.cd-bg-video-wrapper'),
			mq = window.getComputedStyle(document.querySelector('.cd-bg-video-wrapper'), '::after').getPropertyValue('content').replace(/"/g, "").replace(/'/g, "");
		if( mq == 'desktop' ) {
			// we are not on a mobile device 
			var	videoUrl = videoWrapper.data('video'),
				video = $('<video loop><source src="'+videoUrl+'.mp4" type="video/mp4" /><source src="'+videoUrl+'.webm" type="video/webm" /></video>');
			video.appendTo(videoWrapper);
			video.get(0).play();
		}
	}
});

function submittedLogin() {
    console.log("Entrei na acao do submite");
    username = $('#loginEmail').val();
    password = $('#passwordSelected').val();
    console.log(password+"\n");
    console.log(username);

    $.ajax({
        type: "POST",
        url: "db/login.php",
        data:{
            "login":username,
            "pwd":password
        },
        success: function(result){
            console.log(result);
            if(result==true){
                console.log("Encontrei USER  :) ");
            }
            else{
                console.log("Não encontrei USER  :( ");
            }
        }
    });
}

