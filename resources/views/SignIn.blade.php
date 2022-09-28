<!DOCTYPE html>    
<html lang="en">
 
<head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <style>
        body {background-image: url('{{ asset('images/Librarus.gif') }}'); margin: 0; padding: 0; font-family: 'Optima'; background-position: center; height: 100%; background-repeat: no-repeat; background-size: cover;}
        h1   {color: blue;}
        p    {color: red;}
        .login{width: 382px; overflow: hidden; margin: auto; padding: 50px; background: #23463f; border-radius: 15px ;}  
        h2{text-align: center; color: white;  }  
        label{color: white; font-size: 17px;}  
        #Uname{width: 300px; height: 30px; border: none; border-radius: 3px; padding-left: 8px;}  
        #Pass{width: 300px; height: 30px; border: none; border-radius: 3px; padding-left: 8px;}  
        #log{width: 300px; height: 30px; border: none; border-radius: 17px; padding-left: 7px; color: rgb(44, 44, 63);} 
        #Regs{width: 300px; height: 30px; border: none; border-radius: 17px; padding-left: 7px; color: rgb(44, 44, 63);} 
        span{color: white; font-size: 17px;}  
        a{float: right; background-color: grey;}  
        label, input { display:block; }
          input.text { margin-bottom:12px; width:95%; padding: .4em; }
        fieldset { padding:0; border:0; margin-top:25px; }
         h1 { font-size: 1.2em; margin: .6em 0; }
         div#Register { width: 350px; margin: 20px 0; }
         div#Register table { margin: 1em 0; border-collapse: collapse; width: 100%; }
         div#Register table td, div#Register table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
        .ui-dialog .ui-state-error { padding: .3em; }
        .validateTips { border: 1px solid transparent; padding: 0.3em; }
    </style>
     <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
     <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
     <script>
     $( function() {
       var dialog, form,
    
         Name = $( "#Name" ),
         Username = $( "#Username" ),
         Password = $( "#Password" ),
         allFields = $( [] ).add( Name ).add( Username).add( Password),
         tips = $( ".validateTips" );
    
       function updateTips( t ) {
         tips
           .text( t )
           .addClass( "ui-state-highlight" );
         setTimeout(function() {
           tips.removeClass( "ui-state-highlight", 1500 );
         }, 500 );
       }
    
       function checkLength( o, n, min, max ) {
         if ( o.val().length > max || o.val().length < min ) {
           o.addClass( "ui-state-error" );
           updateTips( "Length of " + n + " must be between " +
             min + " and " + max + "." );
           return false;
         } else {
           return true;
         }
       }
    
       function checkRegexp( o, regexp, n ) {
         if ( !( regexp.test( o.val() ) ) ) {
           o.addClass( "ui-state-error" );
           updateTips( n );
           return false;
         } else {
           return true;
         }
       }
    
       function RegLib() {
         var valid = true;
         allFields.removeClass( "ui-state-error" );
    
         valid = valid && checkLength( Name, "Name", 2, 30 );
         valid = valid && checkLength( Username, "Username", 5, 10 );
         valid = valid && checkLength( Password, "Password", 5, 20 );
    
         valid = valid && checkRegexp( Name, /^[a-z]([0-9a-z_\s])+$/i, "name may consist of a-z, 0-9, underscores, spaces and must begin with a letter." );
         valid = valid && checkRegexp( Username, /^[a-z]([0-9a-z_\s])+$/i, "username may consist of a-z, 0-9, underscores, spaces and must begin with a letter." );
         valid = valid && checkRegexp( Password, /^([0-9a-zA-Z])+$/, "password field may consist of a-z, 0-9, underscores, spaces and must begin with a letter." );

    
         if ( valid ) {
           $( "#register tbody" ).append( "<tr>" +
             "<td>" + Name.val() + "</td>" +
             "<td>" + Username.val() + "</td>" +
             "<td>" + Password.val() + "</td>" +
           "</tr>" );
           dialog.dialog( "close" ); 
         }
         return valid;
       }
    
       dialog = $( "#dialog-formR" ).dialog({
         autoOpen: false,
         height: 400,
         width: 350,
         modal: true,
         buttons: {
           "Create an account": RegLib,
           Cancel: function() {
             dialog.dialog( "close" );
           }
         },
         close: function() {
           form[ 0 ].reset();
           allFields.removeClass( "ui-state-error" );
         }
       });
    
       form = dialog.find( "form" ).on( "submit", function( event ) {
         event.preventDefault();
         RegLib();
       });
    
       $( "#Regs" ).button().on( "click", function() {
         dialog.dialog( "open" );
       });
     } );
     </script>
</head>    
<body>    
    <br><br><br><br><br><br>     
    <div class="login">    
    <form id="login" method="get" action="login.php"> 
        <h2>LOGIN PAGE</h2><br><br>
        <label><b>Username     
        </b>    
        </label>    
        <input type="text" name="Uname" id="Uname" placeholder="Username">    
        <br><br>    <br>
        <label><b>Password     
        </b>    
        </label>    
        <input type="Password" name="Pass" id="Pass" placeholder="Password" >    
        <br><br><br> <br>
        <input type="button" name="log" id="log" value="Log In">     
        <br><br>   <br>
        <input type="button" name="Regis" id="Regs" value="Register">    
    </form>     
    
</div>    

<div id="dialog-formR" title="Register" >
  <p class="validateTips">All form fields are required.</p>
 
  <form method="POST" action="Register.php">
    <fieldset>
      <label for="name">Name</label>
      <input type="text" name="name" id="Name" placeholder="name" class="text ui-widget-content ui-corner-all">
      <label for="username">Username</label>
      <input type="text" name="username" id="Username" placeholder="username" class="text ui-widget-content ui-corner-all">
      <label for="password">Password</label>
      <input type="password" name="password" id="Password" placeholder="password" class="text ui-widget-content ui-corner-all">
      <input type="submit" name = "submit" value='submit' tabindex="-1" style="position:absolute; top:-1000px">
    </fieldset>
  </form>
</div><div>

  <?php

$con = mysqli_connect('localhost', 'root', '', 'librarium-imperialis');

      if (!$con)
        die("Connection failed!" . mysqli_connect_error());
      else 
        echo "Successfully connected to the database =>";

        $name = '';
        $user = '';
        $pass = '';

      if(isset($GET["submit"]))
      {
        echo "hmmmmm";
        $name = $_POST['Name'];
        $user = $_POST['Username'];
        $pass = $_POST['Password'];
        echo "Contact Records Acquired";
      }

      // database insert SQL code
      $sql = "INSERT INTO librarians (LName, Username, LPassword) 
      VALUES ('$name', '$user', '$pass')";
      
      
      // insert in database 
      $rs = mysqli_query($con, $sql);
      if($rs)
      
      {
        echo "Contact Records Inserted";
      }
      mysqli_close($con);
?>
  
</div>

<div id="Register" class="ui-widget">
  <h1>Existing Users:</h1>
  <table id="register" class="ui-widget ui-widget-content">
    <thead>
      <tr class="ui-widget-header ">
        <th>Name</th>
        <th>Username</th>
        <th>Password</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Hockey Casbad</td>
        <td>Ugranovsk.</td>
        <td>Hockey</td>
      </tr>
    </tbody>
  </table>
</div>
</body>    
</html>     

