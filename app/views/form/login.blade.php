<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Login to Account</title>
        <meta name="description" content="Custom Login Form Styling with CSS3" />
        <meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />
        <meta name="author" content="Codrops" />
		
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="{{ asset('assetlogin/css/style.css') }}" />
        <script src="{{ asset('assetlogin/js/jquery.min.js') }}"></script>
		
        <!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
		<style>
			body {
				background:#4289c9;
			}
		</style>
    </head>
    <body>
        <div class="container">
		
			<header>
			
				
				<img src="assetlogin/images/logo.png" align="absmiddle">
				
				

				
			</header>
			
			<section class="main">
				
				<form role="form" action="{{ route('login') }}" method="post" class="form-2">
					<h1><span class="log-in"></span> <span class="sign-up">Login Admin</span></h1>
					
					<p class="float">
						<label for="login"><i class="icon-user"></i>Username</label>
						<input type="text" name="username" id="username" placeholder="Username or email" value="{{ Input::old('username') }}">
						
					</p>
					
					<p class="float">
						<label for="password"><i class="icon-lock"></i>Password</label>
						<input type="password" name="password" id="password" placeholder="Password" class="showpassword" value="{{ Input::old('password') }}">
						
					</p>
					
					
					<!-- start Info error waktu pengecekan login-->		
					<p class="form-group {{ ($errors->has('username') ? 'has-error' : '') }}"></p>
						<p class="help-block">{{ $errors->first('username') }}</p>
						
					<p class="form-group {{ ($errors->has('password') ? 'has-error' : '') }}"></p>
						<p class="help-block">{{ $errors->first('password') }}</p> 
					<!-- end Info error waktu pengecekan login-->
					
					<p class="clearfix">   
						<input type="submit" name="submit" value="Log in" valign=right>
						<input type="reset" name="submit" value="Reset" valign=right> 
					</p>
					
				</form>​​
			</section>
			
        </div>
		
		    <!-- url -->
				@include('includes.url')
		
		<!-- jQuery if needed -->
        <script type="text/javascript" src="{{ asset('assetlogin/js/jquery.min.js') }}"></script>
		<script type="text/javascript">
			$(function(){
			    $(".showpassword").each(function(index,input) {
			        var $input = $(input);
			        $("<p class='opt'/>").append(
			            $("<input type='checkbox' class='showpasswordcheckbox' id='showPassword' />").click(function() {
			                var change = $(this).is(":checked") ? "text" : "password";
			                var rep = $("<input placeholder='Password' type='" + change + "' />")
			                    .attr("id", $input.attr("id"))
			                    .attr("name", $input.attr("name"))
			                    .attr('class', $input.attr('class'))
			                    .val($input.val())
			                    .insertBefore($input);
			                $input.remove();
			                $input = rep;
			             })
			        ).append($("<label for='showPassword'/>").text("Show password")).insertAfter($input.parent());
			    });

			    $('#showPassword').click(function(){
					if($("#showPassword").is(":checked")) {
						$('.icon-lock').addClass('icon-unlock');
						$('.icon-unlock').removeClass('icon-lock');    
					} else {
						$('.icon-unlock').addClass('icon-lock');
						$('.icon-lock').removeClass('icon-unlock');
					}
			    });
			});
		</script>
    </body>
</html>