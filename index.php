<?php
$uris = [  
  //['label' => '', 'uri' => '', 'tags' => []],
  //EXAMPLE:
  ['label' => 'Google', 'uri' => 'http://www.google.com', 'tags' => ['google','searcher','find']],
];
?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">

    <title>LINKHUB</title>
  </head>
  <body>
<div class="container">    
    <h1 align="center">LINKHUB</h1>
    <div class="row">                                                                        
      <table class="table table-striped" id="mainTable">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Label</th>
            <th scope="col">Uri</th>
            <th scope="col">Tags</th>            
          </tr>
        </thead>
        <tbody>
          <?php foreach ($uris as $uri) { ?>
          <tr>          
            <td><b><a href="<?php echo $uri['uri']; ?>" target="_blank"><?php echo $uri['label']; ?></a></b></td>
            <td><a href="<?php echo $uri['uri']; ?>" target="_blank"><?php echo $uri['uri']; ?></a></td>
            <td><?php foreach ($uri['tags'] as $tag) { echo '<a href="javascript:search(\''.$tag.'\')"><span class="badge badge-dark">#'.$tag.'</span></a> '; } ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>      
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    
    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>    
    <script>
      function search(t) {
        $('#mainTable_filter input').val(t);
        $('#mainTable_filter input').keyup();
        $('#mainTable_filter input').focus();
      }            
      $(document).ready( function () {
          $('#mainTable').DataTable();
          $('#mainTable_filter input').focus();
          $('#mainTable_filter').append(' <button type="button" id="clear" class="btn btn-danger">X</button>');

          $('#clear').on('click', function(e) {
            $('#mainTable_filter input').val('');
            $('#mainTable_filter input').keyup(); 
            $('#mainTable_filter input').focus();
          });

          $('#mainTable_filter input').on('click', function (e) {
            $('#mainTable_filter input').select();
          });
      } );
  </script>
  </body>
</html>