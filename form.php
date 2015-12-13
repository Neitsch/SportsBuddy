<?php
include("views/header.php");
include("classes/Form.php");

//debugin
print_r($_POST);
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
    $(function() {
        $( "#datepicker" ).datepicker();
    });
</script>

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
               <h2>FORM</h2>
                <form action="#"  method="POST">
                    <div class="form-group">
                        <label for="venue">Venue</label>
                        <input type="text"class="form-control" name="venue" placeholder="The location" id="venue">
                    </div>
                    <div class="form-group">
                        <label for="sports">Choose a sports:</label>

                        <select id="sports" class="form-control" name="sports">
                            <?php Form::selection();?>
                        </select>
                    </div>
                    <div class="form-group">
                        <h2>Choose your </h2>
                        <label class="radio-inline"><input type="radio" name="beginer">Beginer</label>
                        <label class="radio-inline"><input type="radio" name="optradio">Amateur</label>
                        <label class="radio-inline"><input type="radio" name="optradio">Pro</label>
                    </div>
                    <!-- Date picker -->
                    <table>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="datepicker">Choose the date:</label>
                                    <input type="text"class="form-control" id="datepicker">
                                </div>
                            </td>
                        </tr>
                        <tr>

                        </tr>
                    </table>
                    <div class="form-group">
                        <input type="submit" name="submit" value="submit" class=" btn btn-default">
                    </div>

                </form>
            </div>
        </div>
    </div>

<script>

    var form = document.getElementsByTagName("form")[0];

    form.addEventListener("submit", function(e){
        var username = document.getElementById("username");
        var venue = document.getElementById("venue");
        var sports = document.getElementById("sports");

        var arr = [username, venue];
        resetColor(arr);

        if(validationInputs(arr) && validationDropDownMenu(sports)){
            //
        }else{
            //stop form from submitting to server
            e.preventDefault();
        }
    }, false);


    function resetColor(arr){
        var numOfElements = arr.length;
        for(var i = 0; i < numOfElements; i++){
            if((arr[i].value.trim() != "") && (arr[i].style.borderColor = "red")){
                arr[i].style.borderColor = "#D0D0D0";
            }
        }
    }

    function validationDropDownMenu(el){
        var selection = el.options[el.selectedIndex];
        if(selection.selectedIndex == 0){
            return false;
        }
        return true;
    }

    function validationInputs(arr){
        var numOfElements = arr.length;
        var okay = true;
        for(var i = 0; i < numOfElements; i++){
            console.log(arr[i]);
            if(arr[i].value.trim() == ""){
                arr[i].style.borderColor = "red";
                okay= false;
            }
        }
        return okay;
    }

</script>

<?php include("views/footer.php"); ?>
