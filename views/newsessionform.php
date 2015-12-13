<script>
    $(function() {
        $( "#sessiondatetime" ).datepicker();
    });

</script>
<h3>Create a Session</h3>
<form class="form-horizontal" action='postActivity.php' method='post'>
  <div class="form-group">
    <label for="sportcat" class="col-sm-2 control-label">Sport</label>
    <div class="col-sm-4">
      <select class="form-control" name="sport">
      <?php $val = $m->sports->sport->find();
      foreach($val as $doc) {
        echo "<option value=".$doc['internal'].">".$doc['name']."</option>";
      }
     ?>
    </select>
    </div>
  </div>
  <div class="form-group">
    <label for="sessiondatetime" class="col-sm-2 control-label">Date and Time</label>
    <div class="col-sm-4">
      YYYY-MM-DD HH:MM:SS

      <input name"dateandtime" type="text" class="form-control" id="sessiondatetime" placeholder="YYYY-MM-DD HH:MM:SS">
    </div>
  </div>
  <div class="form-group">
    <label for="skilllevel" class="col-sm-2 control-label">Skill Level</label>
    <div class="col-sm-4">
      <select id="skilllevel" class="form-control" name="skilllevel">
        <option>Any Skill Level</option>
        <option>Beginner</option>
        <option>Amateur</option>
        <option>Pro</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="opponentgender" class="col-sm-2 control-label">SportMate Gender</label>
    <div class="col-sm-4">
      <select id="opponentgender" class="form-control" name="opponentgender">
        <option>Any</option>
        <option>Female</option>
        <option>Male</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="venue" class="col-sm-2 control-label">Venue</label>
    <div class="col-sm-4">
      <select id="venue" class="form-control" name="venue">
        <option value="activityroom">Activity Room</option>
        <option value="option">Bouldering Room</option>
        <option value="option">Climbing Centre</option>
        <option value="option">Desso Hall</option>
        <option value="option">Main Hall</option>
        <option value="option">Squash Court</option>
        <option value="option">Studio</option>
        <option value="option">Astro Pitch</option>
        <option value="option">Athletic Track</option>
        <option value="option">Dance Studio</option>
        <option value="option">Games Hall</option>
        <option value="option">Tennis Court</option>
        <option value="option">Other...</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="sessiondescription" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-4">
      <textarea id="sessiondescription" class="form-control" rows="3" name="sessiondescription"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-4">
      Please ensure that you have the appropriate sports membership, provide details of equipment required and if there are any other additional costs.
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-4">
      <button id="submitnewsessionbtn" type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>
