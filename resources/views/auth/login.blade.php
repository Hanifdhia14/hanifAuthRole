<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Yinka Enoch Adedokun">
	<title>Log-In AKIO</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script type="text/javascript" src="../jQuery.js"></script>
  <script type="text/javascript" src="script.js"></script>
</head>

<body>

  <style media="screen">
body{
  background-color: blue;
}
	.container-fluid{
	margin-top: 60px;
}
  .main-content{
  width: 50%;
  border-radius: 20px;
  box-shadow: 0 5px 5px rgba(0,0,0,.4);
  margin: 5em auto;
  display: flex;
  }
  .company__info{
  background-color: skyblue;
  border-top-left-radius: 20px;
  border-bottom-left-radius: 20px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  color: #fff;
  }
  .fa-android{
  font-size:3em;
  }
  @media screen and (max-width: 640px) {
  .main-content{width: 90%;}
  .company__info{
    display: none;
  }
  .login_form{
    border-top-left-radius:20px;
    border-bottom-left-radius:20px;
  }
  }
  @media screen and (min-width: 642px) and (max-width:800px){
  .main-content{width: 70%;}
  }
  .row > h2{
  color:darkblue;
	margin-top: 10px;
	font-family: Verdana;
	font-weight: bold;
  }
.row > h4{
	margin-top: 30px;
	font-family:sans-serif;
	font-weight: lighter;
}
  .login_form{
  background-color: #fff;
  border-top-right-radius:20px;
  border-bottom-right-radius:20px;
  border-top:1px solid #ccc;
  border-right:1px solid #ccc;
  }
  form{
  padding: 0 2em;
  }
  .form__input{
  width: 100%;
  border:0px solid transparent;
  border-radius: 0;
  border-bottom: 1px solid #aaa;
  padding: 1em .5em .5em;
  padding-left: 2em;
  outline:none;
  margin:1.5em auto;
  transition: all .5s ease;
  }
  .form__input:focus{
  border-bottom-color: #008080;
  box-shadow: 0 0 5px rgba(0,80,80,.4);
  border-radius: 4px;
  }
  .btn{
  transition: all .5s ease;
  width: 70%;
  border-radius: 30px;
  color:#008080;
  font-weight: 600;
  background-color: #fff;
  border: 1px solid #008080;
  margin-top: 1.5em;
  margin-bottom: 1em;
  }
  .btn:hover, .btn:focus{
  background-color: #008080;
  color:#fff;
  }
.footer{
	margin-top: 0px;
	font-size: 2rem;
}
  </style>
	<!-- Main Content -->
	<div class="container-fluid">
		<div class="row main-content bg-success text-center">
			<div class="col-md-4 text-center company__info">
				<img src="logo_asdp.PNG" class="rounded mx-auto d-block" width="200" height="150">
				<h4 class="company_title">We Bridge The Nation</h4>
			</div>
			<div class="col-md-8 col-xs-12 col-sm-12 login_form ">
				<div class="container-fluid">
					<div class="row">
						<h2>Log In To AKIO</h2>
            <h4 class="text-center" style=" color: darkblue"> Aplikasi Manajemen Kinerja Individu Organisasi </h4>
					</div>

					<div class="row">
          <form method="POST" action="{{ route('login') }}">
              @csrf
							<div class="row">
								<input type="text" name="email" id="email" class="form__input" placeholder="Email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
							</div>
							<div class="row">
								<!-- <span class="fa fa-lock"></span> -->
								<input type="password" name="password" id="myinput" class="form__input" placeholder="Password">
							</div>
							<div class="row">
								<input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="myFunction()">
								<label form="form-check-label" for="exampleCheck1">Lihat Password!</label>
							</div>
							<div class="row">
								<input type="submit" value="Submit" class="btn" href="{{url('/main')}}">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer -->
	<div class="container-fluid text-center footer" style="color: whitesmoke">
		Coded AKIO by <a style="color: whitesmoke">Earth Life.Id.</a></p>
    <small>© 2021 ALL Rights Reserved</small>
	</div>

  <script>
  function myFunction() {
    var x = document.getElementById("myinput");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
  </script>

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>
