<html>
<head>
    <title>Form Registrasi</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/kube.min.css') ?>" />

</head>

<body style="width:80%;margin:40px auto">
    <div class="units-container">
	
        {{Form::open(array('action' => 'UserController@store')) }}
            <h3>Form Registrasi</h3>
            <label>
                Email <span class="error"><?php echo $errors->first('email') ?></span>
                <input type="text" name="email" value="<?php echo Form::old('email') ?>" class="width-50" />
            </label>
            <label>
                Username <span class="error"><?php echo $errors->first('username') ?></span>
                <input type="text" name="username" value="<?php echo Form::old('username') ?>" class="width-50" />
            </label>
            <label>
                Password <span class="error"><?php echo $errors->first('password') ?></span>
                <input type="password" name="password" value="<?php echo Form::old('password') ?>" class="width-50" />
            </label>
            <input type="submit" class="btn" value="Submit">

        </form>

    </div>
</body>
</html>