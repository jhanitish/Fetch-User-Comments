<?php

require "connection.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	    <meta charset="utf-8">
		<style type="text/css">
		.row{
			padding-left:20px;
			padding-right:20px;
		}
		#response-section-title {
           font-size: 21px;
           padding-bottom: 10px;
           border-bottom: solid 2px #f1f6f6;
        }
		#comments-section-title {
		  font-size: 19.5px;
		}
		#response-form{
		  overflow: hidden;
		}
		.response-form-row{
		  overflow: hidden;
		  position: relative;
		  padding-bottom: 15px;
		}
		.reponse-form-label-div{
		  width: 20%;
		  float: left;
		  text-align: right;
		  padding-right: 10px;
		}
		.reponse-form-input-div{
		  width: 80%;
		  /*float: left; */
		}
		#response-comment-text-area {
		  width: 50%;
		  resize: none;
		}
		#response-name-input, #response-email-input{
		  width: 50%;
		  height: 35px;
		}
		#post-button-whitespace {
		  min-height: 1px;
		}
		#post-button {
		  /*background-color: #b3b3b3;*/
		  background-color: #EA235B;
		  width: 40%;
		  border-style: hidden;
		  color: white;
		  padding: 10px;
		  border-radius: 6px;
		  
		}
		#post-button:hover, #post-button:focus {
		  outline: 0;
		}
		#comment-email-subtext{
		  padding-left: 5px;
		}
		.error-message, .email-error-message{
		  padding-left: 5px;
		  display: block;
		  color: red;
		  font-weight: 400;
		  height: 0px;
		  overflow: hidden;
		  transition: 0.5s;
		  /*display: none;*/
		}
		.reponse-form-input{
		  border: thin solid #cccccc;
		  border-radius: 3px;
		  padding-left: 5px;
		  display: block;
		}
		.reponse-form-input:focus{
			outline: 0;
			border-color: rgba(234, 35, 91,0.8);
		}
        @media(max-width:480px){

			#response-name-input, #response-email-input{
				width: 80%;
			}
		}
		.comment-element{
			  display: table;
			  margin-bottom: 36px;
			}
		.user-profile-image{
			  width: 70px;
			  border-radius: 3px;
			  display: table-cell;
			}
		.comment-details {
			  display: table-cell;
			  vertical-align: top;
			  padding-left: 10px;
			}
		.comment-meta, .comment-text, .comment-reply {
			  display: block;
			}
		.comment-text {
			  padding-top: 10px;
			  padding-bottom: 10px;
			}
        .error-message{
			  padding-left: 5px;
			  display: block;
			  color: red;
			  font-weight: 400;
			  height: 0px;
			  overflow: hidden;
			  transition: 0.5s;
			  /*display: none;*/
			}
		
		</style>
	</head>
    <body>
	    <div class="row">
			    <div id="response-section" name="response-section">
					<?php
					$str="Select * from user_comments where comment_Status='1' and comment_Approved='Approved' ORDER BY comment_Id DESC";
					$comments=mysqli_query($con,$str);
					if(!empty(count($comments)) > 0){?>	
						<h3 id="response-section-title">User Comments</h3>
						<div id="response-form">
							<div id="comments-list">
								<?php
								   foreach($comments as $postComments){?>
										<div id="comment-<?php echo $postComments['comment_Id'] ?>" class="comment-element">
											<img class="user-profile-image" alt="" src="user-placeholder-profile-image.png"/>
											<div id="commment-details" class="comment-details">
												<span id="comment-meta" class="comment-meta">
													<?php echo $postComments['comment_Author'] ?> said on <a class="comment-date-anchor" href="#comment- <?php echo $postComments['comment_Id']?>">
														<?php echo $postComments['comment_Date'] ?></a>:
												</span>
												<span id="comment-text" class="comment-text">
													<?php echo $postComments['comment_Content'] ?>
												</span>
											</div>
										</div>
										
								 <?php } ?>
					        </div>
							<?php }
							?> 
			            </div>			
            
                </div>

		
			<div id="response-section" name="response-section">
                    <h3 id="response-section-title">Post a comment</h3>
                    <div id="response-form">
							<div id="comment-area" class="response-form-row">
                            <div id="response-comment-label-div" class="reponse-form-label-div">
                                <label id="response-comment-label">Comment</label>
                            </div>
                            <div id="response-comment-text-area-div" class="reponse-form-input-div">
                                <textarea id="response-comment-text-area" class="reponse-form-input" rows="8"></textarea>
                                <label id="response-comment-error-message" class="error-message">Please type a comment!</label>
                            </div>
                        </div>
							<div id="name-input" class="response-form-row">
								<div id="response-name-label-div" class="reponse-form-label-div">
									<label id="response-name-label">Name</label>
								</div>
								<div id="response-name-input-div" class="reponse-form-input-div">
									<input id="response-name-input" class="reponse-form-input" type="text">
								</div>
							</div>
							<div id="email-input" class="response-form-row" >
								<div id="response-email-label-div" class="reponse-form-label-div">
									<label id="response-comment-label">Email</label>
								</div>
								<div id="response-email-input-div" class="reponse-form-input-div">
									<input id="response-email-input" class="reponse-form-input" type="text">
									<label id="response-email-error-message" class="error-message">Please enter valid Email Id!</label>
								</div>
							</div>
							<div id="post-button-row" class="response-form-row" >
								<div id="post-button-whitespace" class="reponse-form-label-div">
								</div>
								<div id="post-button-div" class="reponse-form-input-div">
									 <button id="post-button" type="button" name="button">POST COMMENT</button>
								</div>
							</div>
                    </div>
			</div>
		</div>	
    </body>
</html>

<script>
       var emailInputBox = document.getElementById("response-email-input");
        function validateEmail(email) {
			var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return re.test(email);
		}
		function errorMessageFadeIn(element) {
            element.style.height = "20px";
         }
        function errorMessageFadeOut(element) {
            element.style.height = "0px";
         }
		if (emailInputBox != null) {
			emailInputBox.addEventListener("keyup",function(e){
            var emailId = this.value;
                if (emailId.length > 0 && !validateEmail(emailId)) {
                    this.style.color = "red";
                }
                else{
                    this.style.color = "black";
                }
            });
    }
		 var postComment = document.getElementById("post-button");
			if(postComment != null){
				postComment.addEventListener("click",function(e){
            var postComment = document.getElementById("post-button");
			var commentTextArea = document.getElementById("response-comment-text-area");
			var commentatorNameInput = document.getElementById("response-name-input");
            var commentatorEmailInput = document.getElementById("response-email-input");
			var commentErrorMessage = document.getElementById("response-comment-error-message");
            var emailErrorMessage = document.getElementById("response-email-error-message");
			var validComment = true;
            var validEmail = true;
			if (commentatorEmailInput !== null && commentatorNameInput != null && commentTextArea !== null) {
                var comment = commentTextArea.value.trim();
                var email = commentatorEmailInput.value.trim();
                var commentErrorMessage = document.getElementById("response-comment-error-message");
                var emailErrorMessage = document.getElementById("response-email-error-message");
                if (comment.length == 0) {
                    errorMessageFadeIn(commentErrorMessage);
                    validComment = false;
                }
                else{
                    errorMessageFadeOut(commentErrorMessage);
                }
                if (email.length > 0 && !validateEmail(email)) {
                    errorMessageFadeIn(emailErrorMessage);
                    validEmail = false;
                }
                else{
                    errorMessageFadeOut(emailErrorMessage);
                }
				if (validComment && validEmail) {
					var postName = commentatorNameInput.value.trim();
					var params = "comment="+comment+"&name="+postName+"&email="+email;
					var ajax = new XMLHttpRequest();
					ajax.open("GET", "insertComment.php?" + params, true);
					ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
					ajax.onload = function() {
						try{
							var jsonResponse = this.responseText;
							console.log(jsonResponse['status']);
							if (ajax.status === 200 && jsonResponse['status'] != 'Fail') {
								//console.log("Oh Yeah !! Comment Submitted.");
							}
							else{
							}
						}
						catch(e){
							return;
							alert("Here");
						}
					};
					ajax.send(params);
				}
            }else{
			}
        });
    }			

</script>
