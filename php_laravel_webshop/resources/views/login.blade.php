<!DOCTYPE html>

@if ($errors->has('password'))
    <div class="alert alert-danger">
        {{ $errors->first('password') }}
    </div>
@endif

@if (session('pass.error'))
    <div class="alert alert-success">
        {{ session('pass.error') }}
    </div>
@endif

@if (session('login.fail'))
    <div class="alert alert-success">
        {{ session('login.fail') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('signup_error'))
    <div class="alert alert-danger">
        {{ session('signup_error') }}
    </div>
@endif

@if (session('signup_error2'))
    <div class="alert alert-success">
        {{ session('signup_error2') }}
    </div>
@endif

@if (session('naam'))
    <div class="alert alert-success">
        {{ session('naam') }}
    </div>
@endif

@if (session('tekstvak2'))
    <div class="alert alert-success">
        {{ session('tekstvak2') }}
    </div>
@endif

@if (session('no-login'))
    <div class="alert alert-success">
        {{ session('no-login') }}
    </div>
@endif

@if (session('logout'))
    <div class="alert alert-success">
        {{ session('logout') }}
    </div>
@endif



<title>{{ config( 'app.name' ) }}</title>
<h1>{{ config( 'app.name' ) }}</h1><br><br>


<form method="POST" action="{{route('login.try')}}"> 
    @csrf
    <label for="first_name">Login<br></label>
    <input type="text" id="first_name" name="first_name" value="Gebruikersnaam">
    <label for="password"><br></label>
    <input type="password" id="password" name="password" value="wachtwoord">
    <br><button type="submit">Login</button>
</form>
<form method="POST" action="{{route('sign.up')}}">
    @csrf
    <br><label for="first_name">Sign up<br></label>
    <input type="text" id="first_name" name="first_name" value="Gebruikersnaam">
    <br><label for="password">Wachtwoord</label>
    <br><input type="password" id="password" name="password" value="Wachtwoord">
    <br><label for="password_confirmation">Bevestig Wachtwoord</label>
    <br><input type="password" id="password_confirmation" name="password_confirmation" value="Wachtwcheck">
    <br><button type="submit">Sign up</button>
</form>