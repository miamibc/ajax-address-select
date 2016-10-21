<!DOCTYPE html>
<html>
<head>

  <title>Ajax address select example</title>
  <meta name="title" content="" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <style type="text/css">
    body { padding: 5% 0 0; font-family: Verdana, sans-serif; }
    form { text-align: center; }
  </style>


</head>
<body>

<form action="post.php" method="post">
<label for="main">New address: </label>
<select name="main">
  <option>-- Please select --</option>
  <option>Estonia</option>
  <option>Russia</option>
  <option>Latvia</option>
  <option>Lithuania</option>
</select>

  <input type="submit" value="Look what we have">
</form>

<script src="jquery-3.1.1.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(function($){

    $('body').on('change','select', function(){

      // remove all selects after clicked, we don't need them
      $(this).nextAll('select').remove();

      var key = $(this).val();

      // create new select
      $('<select><option>...</option></select>')
        // put attributes and disable it
        .attr({id:key, name:key, disabled:"disabled"})
        // insert this node right after clicked item
        .insertAfter(this)
        // load options, last param is callback
        .load( "ajax.php", {"key":key}, function(msg, status){
          // activate, if we have any data loaded,
          if (status == 'success') { $(this).removeAttr("disabled"); }
          // otherwise we can remove this select, or hide it
          else if (status == 'nocontent') { $(this).remove(); }
          else { console.log(status); }
        })
    });

  });
</script>
</body>
</html>
