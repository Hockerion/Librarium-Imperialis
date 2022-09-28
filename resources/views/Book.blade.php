<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Dialog - Modal form</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <style>
    label, input { display:block; }
    input.text { margin-bottom:12px; width:95%; padding: .4em; }
    fieldset { padding:0; border:0; margin-top:25px; }
    h1 { font-size: 1.2em; margin: .6em 0; }
    div#books-contain { width: 350px; margin: 20px 0; }
    div#books-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#books-contain table td, div#books-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
    .ui-dialog .ui-state-error { padding: .3em; }
    .validateTips { border: 1px solid transparent; padding: 0.3em; }
  </style>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
  $( function() {
    var dialog, form,
 
      // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
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
      valid = valid && checkLength( Cover, "Cover", 5, 16 );
 
      valid = valid && checkRegexp( Name, /^[a-z]([0-9a-z_\s])+$/i, "Bookname may consist of a-z, 0-9, underscores, spaces and must begin with a letter." );
      valid = valid && checkRegexp( Publisher, /^[a-z]([0-9a-z_\s])+$/i, "publisher may consist of a-z, 0-9, underscores, spaces and must begin with a letter." );
      valid = valid && checkRegexp( Author, /^([0-9a-zA-Z])+$/, "author field may consist of a-z, 0-9, underscores, spaces and must begin with a letter." );
      valid = valid && checkRegexp( Year, /^([0-9a-z_\s])+$/i, "year may consist of 0-9" );
      valid = valid && checkRegexp( Volume, /^[a-z]([0-9A-Z_\s])+$/i, "volume field only allow : a-z 0-9" );
      valid = valid && checkRegexp( Cover, /^([0-9a-zA-Z])+$/, "cover field only allow : a-z 0-9" );
 
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
  </script>
</head>
<body>
 
<div id="dialog-form" title="Add a Book">
  <p class="validateTips">All form fields are required.</p>
 
  <form method="POST" action="">
    <fieldset>
      <label for="name">Name</label>
      <input type="text" name="name" id="name" value="Hockey Badcas" class="text ui-widget-content ui-corner-all">
      <label for="publisher">Publisher</label>
      <input type="text" name="publisher" id="publisher" value="Casiple Publishing" class="text ui-widget-content ui-corner-all">
      <label for="author">Author</label>
      <input type="text" name="author" id="author" value="Hockey" class="text ui-widget-content ui-corner-all">
      <label for="year">Year</label>
      <input type="text" name="year" id="year" value="2000" class="text ui-widget-content ui-corner-all">
      <label for="volume">Volume</label>
      <input type="text" name="volume" id="volume" value="III" class="text ui-widget-content ui-corner-all">
      <label for="cover">Cover</label>
      <input type="text" name="cover" id="cover" value="awesome.png" class="text ui-widget-content ui-corner-all">

      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
    </fieldset>
  </form>
</div>
 
<div>
  <?php

$con = mysqli_connect('localhost', 'root', '', 'librarium-imperialis');


if (!$con)
  die("Connection failed!" . mysqli_connect_error());
else 
  echo "Successfully connected to the database =>"


if(isset($_POST['submit']))
{
$Name = $_POST['Name'];
$Username = $_POST['Username'];
$Password = $_POST['Password'];
echo "Contact Records Acquired";
}
// database insert SQL code
$sql = "INSERT INTO `tbl_contact` (`BOOK_ID`, `Name`, `Username`, `Password`) VALUES ('0', '$Name', '$Username', '$Password')";

// insert in database 
$rs = mysqli_query($con, $sql);
if($rs)
{
  echo "Contact Records Inserted";
}

?>
</div>
 
<div id="books-contain" class="ui-widget">
  <h1>Existing Books:</h1>
  <table id="books" class="ui-widget ui-widget-content">
    <thead>
      <tr class="ui-widget-header ">
        <th>Name</th>
        <th>Publisher</th>
        <th>Author</th>
        <th>Year</th>
        <th>Volume</th>
        <th>Cover</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Hockey Casbad</td>
        <td>Casiple Publishing inc.</td>
        <td>Hockey</td>
        <td>2000</td>
        <td>III</td>
        <td>Awesome.png</td>
      </tr>
    </tbody>
  </table>
</div>
<button id="add-book">Add a Book</button>
 
 
</body>
</html>