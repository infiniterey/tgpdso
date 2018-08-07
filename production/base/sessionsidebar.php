<div class="profile clearfix">
  <div class="profile_pic">
    <img class="img-circle img1 profile_img" src="images/user.png">
  </div>
  <div class="profile_info">
    <a style="font-size: 14px; color: white"><b>Magandang Araw!</b></a>
    <a style="color: white; font-size: 13px;"><b><?php echo $_SESSION['firstname']; ?></b></a> - <a style="color: white; font-size: 13px;"><b><?php echo $_SESSION['usertype']; ?></b></a>
    <br>
    <br>
    <?php
    $usertype1 = $_SESSION['usertype'];
    if($usertype1 == 'secretary' || $usertype1 == 'Secretary')
    {
      ?>
        <a style="color: white" name="profile" id="profile" href="profileSecretary.php"><u>Profile</u></a>
      <?php
    }
    else {
      ?>
        <a style="color: white" name="profile" id="profile" href="profile.php"><u>Profile</u></a>
        <?php
    }
    ?>
    &nbsp;
    <button class="astext" type="submit" style="color: lightgreen" name="logout" id="logout"><u>Logout</u></button>
    <div class="clearfix"></div>
  </div>
</div>
