<!DOCTYPE html>
<html>
<head>
  <title>More Field</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
    input[type=checkbox]
    {
      display: block;
      float: left;
    }
    #dynamic_field{
      width: 1200px;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2 align="center">Add Multiple Dynamic Field</h2>  
    <div class="form-group">
      <form name="add_name" method="post" action="<?php echo base_url('multiplefield/morefield');?>" enctype="multipart/form-data">

        <div class="table-responsive">  
          <table class="table table-responsive table-bordered " id="dynamic_field">  
            <tr>  
              <td><input type="text" name="addname[]" placeholder="Enter your Name" class="form-control name_list" />
              </td>
              <td>
                <input type="number" name="contact[]" placeholder="Enter your Contact no." class="form-control name_list" />
              </td>
              <td> <select name="state[]" class="form-control name_list">
                <option value="volvo">select State..</option>
                <option value="odisha">Odisha</option>
                <option value="up">UP</option>
                <option value="mumbai">Mumbai</option>
                <option value="delhi">Delhi</option>
              </select>
            </td> 
            <td>
              <input type="checkbox" name="check[]" value="check" >check<br>
              <input type="checkbox" name="check[]" value="check1">check1<br/>
              <input type="checkbox" name="check[]" value="check2"> check2
            </td>
            <td class="form-control name_list " style="margin-top:7px;">
              <input type="radio" id="male" name="gender[]" value="male">
              <label for="male" style="color:grey;">Male</label><br>
              <input type="radio" id="female" name="gender[]" value="female" style="margin-left:0px;"  >
              <label for="female" style="color:grey;">Female</label> 
            </td>
            <td>
              <input type="file" name="image[]" class="form-control name_list" multiple=""/>
            </td>
            <td> <button type="button" name="add" id="add" class="btn btn-success">Add More</button> </td>
          </tr>

        </table>  
        <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />  
      </div>

    </form>  
  </div> 
</div>

<script type="text/javascript">
  $(document).ready(function(){      
    var i=1;  

    $('#add').click(function(){  
     i++;  
     $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="addname[]" placeholder="Enter your Name" class="form-control name_list"/></td><td><input type="number" name="contact[]" placeholder="Enter your Contact no." class="form-control name_list" /></td>  <td> <select name="state[]" class="form-control name_list"><option value="volvo">select State..</option> <option value="odisha">Odisha</option><option value="up">UP</option><option value="mumbai">Mumbai</option><option value="delhi">Delhi</option></select></td><td>     <input type="checkbox" name="check[]" value="check" >check<br><input type="checkbox" name="check[]" value="check1">check1<br/><input type="checkbox" name="check[]" value="check2"> check2</td><td class="form-control name_list " style="margin-top:7px;height:35px;"><input type="radio" id="male" name="gender[]" value="male" <?php echo set_radio("gender","male"); ?> ><label for="male" style="color:grey;">Male</label><input type="radio" id="female" name="gender[]" value="female" <?php echo set_radio("gender","female"); ?> style="margin-left:8px;" ><label for="female" style="color:grey;">Female</label></td><td><input type="file" name="image[]"  class="form-control name_list" multiple=" " multiple=""/></td> <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
   });

    $(document).on('click', '.btn_remove', function(){  
     var button_id = $(this).attr("id");   
     $('#row'+button_id+'').remove();  
   });  

  });  
</script>
</body>
</html>