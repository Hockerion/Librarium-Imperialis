<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" name="viewport"  content="IE=edge", content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Sriracha&display=swap');

    body {margin: 0; box-sizing: border-box;}

    /* CSS for header */
    .header {display: flex; justify-content: space-between; align-items: center; background-color: #f5f5f5;}
    .header .logo {font-size: 25px; font-family: 'Sriracha', cursive; color: #000; text-decoration: none; margin-left: 30px;}
    .nav-items {display: flex; justify-content: space-around; align-items: center; background-color: #f5f5f5; margin-right: 20px;}
    .nav-items a {text-decoration: none; color: #000; padding: 35px 20px;}

    /* CSS for main element */
    .intro {display: flex; flex-direction: column; justify-content: center; align-items: center; width: 100%; height: 520px; background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0.5) 100%), url('{{ asset('images/Librarium.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;}
    .intro h1 {font-family: sans-serif; font-size: 60px; color: #fff; font-weight: bold; text-transform: uppercase; margin: 0;}
    .intro p {font-size: 20px; color: #d1d1d1; text-transform: uppercase; margin: 20px 0;}
    .intro button {background-color: #5edaf0; color: #000; padding: 10px 25px; border: none; border-radius: 5px; font-size: 20px; font-weight: bold; cursor: pointer; box-shadow: 0px 0px 20px rgba(255, 255, 255, 0.4)}
    .Library {display: flex; justify-content: space-around; align-items: center; padding: 40px 80px;}
    .Library .Book {display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 0 40px;}
    .Library .Book .Book-heading {font-size: 20px; color: #333333; text-transform: uppercase; margin: 10px 0;}
    .Library .Book .Book-text {font-size: 15px; color: #585858; margin: 10px 0; text-align:justify; text-justify:values;}
    .about-me {display: flex; justify-content: center;align-items: center; padding: 40px 80px; border-top: 2px solid #eeeeee;}
    .about-me img {width: 500px; max-width: 100%; height: auto; border-radius: 10px;}
    .about-me-text h2 {font-size: 30px; color: #333333; text-transform: uppercase; margin: 0;}
    .about-me-text p {font-size: 15px; color: #585858; margin: 10px 0;}

    /* CSS for footer */
    .footer {display: flex; justify-content: space-between; align-items: center; background-color: #302f49; padding: 40px 80px;}
    .footer .copy {color: #fff;}
    .bottom-links {display: flex; justify-content: space-around; align-items: center; padding: 40px 0;}
    .bottom-links .links {display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 0 40px;}
    .bottom-links .links span {font-size: 20px; color: #fff; text-transform: uppercase; margin: 10px 0;}
    .bottom-links .links a {text-decoration: none; color: #a1a1a1; padding: 10px 20px;}

    /*For pop up*/
    label, input { display:block; }
    input.text { margin-bottom:12px; width:95%; padding: .4em; }
    fieldset { padding:0; border:0; margin-top:25px; }
    h1 { font-size: 1.2em; margin: .6em 0; }
    div#books-contain { width: 350px; margin: 20px 0; }
    div#books-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#books-contain table td, div#books-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
    .ui-dialog .ui-state-error { padding: .3em; }
    .validateTips { border: 1px solid transparent; padding: 0.3em; }

    #display-image{
  width: 400px;
  height: 225px;
  border: 1px solid black;
  background-position: center;
  background-size: cover;
}
  </style>
  
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

  <script>
  $( function() {
    var dialog, form,
 
      Name = $( "#name" ),
      Publisher = $( "#publisher" ),
      Author = $( "#author" ),
      Year = $( "#year" ),
      Volume = $( "#volume" ),
      Cover = $( "#cover" ),
      allFields = $( [] ).add( name ).add( publisher).add( author).add( year ).add( volume ).add( cover ),
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
 
    function addBook() {
      var valid = true;
      allFields.removeClass( "ui-state-error" );
 
      valid = valid && checkLength( Name, "Bookname", 3, 16 );
      valid = valid && checkLength( Publisher, "Publisher", 6, 80 );
      valid = valid && checkLength( Author, "Author", 5, 16 );
      valid = valid && checkLength( Year, "Year", 3, 16 );
      valid = valid && checkLength( Volume, "Volume", 1, 80 );
 
      valid = valid && checkRegexp( Name, /^[a-z]([0-9a-z_\s])+$/i, "Bookname may consist of a-z, 0-9, underscores, spaces and must begin with a letter." );
      valid = valid && checkRegexp( Publisher, /^[a-z]([0-9a-z_\s])+$/i, "publisher may consist of a-z, 0-9, underscores, spaces and must begin with a letter." );
      valid = valid && checkRegexp( Author, /^([0-9a-zA-Z])+$/, "author field may consist of a-z, 0-9, underscores, spaces and must begin with a letter." );
      valid = valid && checkRegexp( Year, /^([0-9a-z_\s])+$/i, "year may consist of 0-9" );
      valid = valid && checkRegexp( Volume, /^([0-9a-zA-Z])+$/, "volume may consist of a-z, 0-9, underscores, spaces and must begin with a letter." );
 
      if ( valid ) {
        $( "#books tbody" ).append( "<tr>" +
          "<td>" + Name.val() + "</td>" +
          "<td>" + Publisher.val() + "</td>" +
          "<td>" + Author.val() + "</td>" +
          "<td>" + Year.val() + "</td>" +
          "<td>" + Volume.val() + "</td>" +
          "<td>" + Cover.val() + "</td>" +
        "</tr>" );
        dialog.dialog( "close" ); 
      }
      return valid;
    }
 
    dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 400,
      width: 350,
      modal: true,
      buttons: {
        "Create an account": addBook,
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
      addBook();
    });
 
    $( "#add-book" ).button().on( "click", function() {
      dialog.dialog( "open" );
    });
  } );

    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }
  };       
  </script>
</head>

<body>
  <header class="header">
    <a href="#" class="logo">LIBRARIUM IMPERIALIS</a>
    <nav class="nav-items">
      <a href="#">Library</a>
      <a href="#">Add a Book</a>
      <a href="#">Sign Out</a>
    </nav>
  </header>
  <main>
    <div class="intro">
      <h1>WELCOME</h1>
      <p>TO THE LIBRARY THAT CAN CHANGE THE WORLD.</p>
      <button id="add-book">ADD A BOOK</button>
    </div>
    <div>
    </div>
    <div id="books-contain" class="ui-widget">
        <table id="books" class="ui-widget ui-widget-content">
          <thead>
            <tr class="ui-widget-header ">
              <th>Existing Books:</th>
            </tr>
          </thead>
          <fieldset>
          <tbody class="Library">
            <tr>
              <td>
                <div class="Book"><br><br>
                <p class="Book-heading"><b>Leviathan</b></p>
                <img id="output"></th>
                </div>
            </td>
              <td>
                <div class="Book" color>
                <br><br>
                <p class="Book-heading"><b>Behemoth</b></p>
                <img src="{{URL::asset('images/Behemoth.jpg')}}">            
              </div>
            </td>
              <td>
                <div class="Book">
                <br><br>    
                <p class="Book-heading"><b>Goliath</b></p>
                <img src="{{URL::asset('images/Goliath.jpg')}}"> 
                </div>
            </td>
            </tr>
          </tbody>
        </fieldset>
        </table>
      </div>
    <div class="about-me">
      <div class="about-me-text">
        <h2>About Me</h2>
        <p>I am a web developer and I love to create websites. I am a very good developer and I am always looking for new projects. I am a very good developer and I am always looking for new projects.</p>
      </div>
      <img src="https://images.unsplash.com/photo-1596495578065-6e0763fa1178?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=871&q=80" alt="me">
    </div>
  </main>
  <footer class="footer">
    <div class="copy">&copy; 2022 Developer</div>
    <div class="bottom-links">
      <div class="links">
        <span>More Info</span>
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
      </div>
      <div class="links">
        <span>Social Links</span>
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
  </footer>
 
  <?php
$con = mysqli_connect('localhost', 'root', '', 'librarium-imperialis');


        $title = '';
        $publish = '';
        $author = '';
        $year = '12';
        $volume = '';

      if (!$con)
        die("Connection failed!" . mysqli_connect_error());
      else 
        echo "Successfully connected to the database =>";


      if(isset($_POST['submit']))
      {
        $title = $_POST['name'];
        $publish = $_POST['publisher'];
        $author = $_POST['author'];
        $year = $_POST['year'];
        $volume = $_POST['volume'];
        echo "Contact Records Acquired";
      }
      // database insert SQL code
      $sql = "INSERT INTO book (BOOK_TITLE, Publisher, Author, Taon, Volume) 
      VALUES ('$title', '$publish', '$author', '$year', '$volume')";
      
      // insert in database 
      $rs = mysqli_query($con, $sql);
      if($rs)
      
      {
        echo "Contact Records Inserted";
      }
?>

  <div id="dialog-form" title="Add a Book">
    <p class="validateTips">All form fields are required.</p>
   
    <form method="POST" action="">
      <fieldset>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="title" class="text ui-widget-content ui-corner-all">
        <label for="publisher">Publisher</label>
        <input type="text" name="publisher" id="publisher" placeholder="publisher" class="text ui-widget-content ui-corner-all">
        <label for="author">Author</label>
        <input type="text" name="author" id="author" placeholder="author" class="text ui-widget-content ui-corner-all">
        <label for="year">Year</label>
        <input type="text" name="year" id="year" placeholder="year" class="text ui-widget-content ui-corner-all">
        <label for="volume">Volume</label>
        <input type="text" name="volume" id="volume" placeholder="volume" class="text ui-widget-content ui-corner-all">
        <label for="cover">Cover</label>
        <input type="file" name="cover" id="cover" onchange="loadFile(event)" class="text ui-widget-content ui-corner-all " accept="image/png, image/gif, image/jpeg" >
  
        <!-- Allow form submission with keyboard without duplicating the dialog button -->
        <input type="submit" tabindex="-1" style="position:absolute; top:-1000px" onclick="TableSize();">   
      </fieldset>
    </form>
  </div>

</body>
</html>