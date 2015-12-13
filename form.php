<?php
include("views/header.php");
include("classes/Form.php");
include("classes/Clock.php");

//debugin
print_r($_POST);
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<!-- time picker-->
<script src="datepicker/js/bootstrap-timepicker.js"></script>
<link rel="stylesheet" href="datepicker/css/timepicker.css"/>

<script>
    $(function() {
        $( "#datepicker" ).datepicker();
    });

    $(function() {
        $( "#timepicker1").timepicker();
    });

    $(function() {
        $( "#timepicker2").timepicker();
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
                        <label for="sports">Choose a sport:</label>

                        <select id="sports" class="form-control" name="sports">
                            <?php Form::selection();?>
                        </select>
                    </div>
                    <div class="form-group">
                        <h2>Choose your skill level:</h2>
                        <label class="radio-inline"><input checked="checked" type="radio" name="level" value="amateur">Amateur</label>
                        <label class="radio-inline"><input type="radio" name="level" value="standard">Standard</label>
                        <label class="radio-inline"><input type="radio" name="level" value="pro">Pro</label>
                    </div>
                    <!-- Date picker -->
                    <table>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="datepicker">Choose the date:</label>
                                    <input type="text" name="date" class="form-control" id="datepicker">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="timepicker1">Start:</label>
                                    <div class="input-group bootstrap-timepicker timepicker">
                                        <input id="timepicker1"  name="start" type="text" class="form-control input-small">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label for="timepicker2" style="margin-left: 20px">End:</label>
                                    <div style="margin-left: 20px" class="input-group bootstrap-timepicker timepicker">
                                        <input id="timepicker2" name="end" type="text" class="form-control input-small">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                    </div>
                                </div>
                            </td>
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
        var venue = document.getElementById("venue");
        var sports = document.getElementById("sports");
        var datepicker = document.getElementById("datepicker");
        var level = document.getElementById("level");
        var start = document.getElementById("timepicker1");
        var end = document.getElementById("timepicker2");

        var arr = [venue, datepicker, start, end];
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
