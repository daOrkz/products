<?php

function renderSelect($id){
  return '
<div class="form-select" >
<form id="changeStatus" class="form-select" action="../services/changeStatus.php">
  <select class="select" name="status" id="">
    <option class="select-item" value="user">User</option>
    <option class="select-item" value="admin" >Admin</option>
  </select>' . "<input name='id' value={$id} type='hidden'>" .
' <button class="select-btn" type="submit">Change status</button>
</form>
</div> ';
}

?>

<!-- 
<div class="form-select" >
  <form id="changeStatus" class="form-select" action="../services/changeStatus.php">
    <select class="select" name="status" id="changeStatus">
      <option class="select-item" value="user">User</option>
      <option class="select-item" value="admin" >Admin</option>
    </select>
    <input name="poi" id="" value="ololollll" type="hidden">
    <<button class="select-btn" type="submit">Select</button> 
   </form>
</div> -->


