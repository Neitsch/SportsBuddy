<?php
include("views/header.php");
include("classes/Form.php");

//debugin
print_r($_POST);
?>

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
               <h2>FORM</h2>
                <form action="#"  method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text"class="form-control"  name="username" placeholder="Your name" id="username">
                    </div>
                    <div class="form-group">
                        <label for="venue">Venue</label>
                        <input type="text"class="form-control" name="venue" placeholder="The location" id="venue">
                    </div>
                    <div class="dropdown">
                        <select id="sports" name="sports">
                            <?php Form::selection();?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="submit" class="btn-default">
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
