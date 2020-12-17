$(document).ready(function() {
    //Checj if admin password is correct or not
    $("#current_pwd").keyup(function(){
    	var current_pwd = $("#current_pwd").val();
    	//alert(current_pwd);
    	$.ajax({
    		type:'post',
    		url:'/admin/check-current-pwd',
    		data:{current_pwd:current_pwd},
    		success:function(resp){
    			//alert(resp);
    			if (resp=="false") {
    				$("#chkPwd").html("<font color=red>Current Passwrod is Incorrect");
    			}else if(resp == "true"){
                    $("#chkPwd").html("<font color=green>Current Passwrod is Correct");                   
    			}
    		},error:function(){
    			alert("Error");
    		}
    	});
    });
});