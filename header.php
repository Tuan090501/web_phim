<div id="header">
  <div class="container">
    <h1 id="logo"><a href="?mod=home" title="Xem Phim">Xem phim</a></h1>
    <div id="search">
      <form method="post" action="?mod=search">
        <input type="text" autocomplete="off" name="kw" placeholder="Tìm phim..." class="keyword">
        <button type="submit" class="submit">
          <i class="search__icon fas fa-search"></i>
        </button>
      </form>
    </div>
    <div id="sign">
<!-- Van modified ↓↓ -->
<?php if(empty($_SESSION["username"])){?>
  <div class="login"><a rel="nofollow" id="log">Đăng nhập</a>
      <div class="login-form" id="login-form" style="display: none;">
        <form method="post" action="login.php">
          <div>
            <input type="text" placeholder="Tên đăng nhập" class="input username" name="username">
          </div>
          <div>
            <input type="password" placeholder="Mật khẩu" class="input password" name="password">
          </div>
          <div>
            <label class="remember">
              <input type="checkbox" checked="checked" class="checkbox" name="remember"> Remember
            </label>
          <button type="submit" class="submit" name="btn_login">Đăng nhập</button>
          </div>
        </form>
      </div>
  </div>
  <div class="links"><a class ="sign-up" rel="nofollow" href="register.php">Đăng ký</a></div>

<?php } else {?>
  <span type="text" class = "user">
    <i class="user-avatar-icon fas fa-user"></i>
    <span class="user-name"><?php echo $_SESSION["username"]?></span>
    


  <form method="post" action="" class = "user-right">
      <button id="logout" name="log_out">Đăng xuất</button>
      <a rel="nofollow" href="info_account.php" class = "manage-account">Quản lý tài khoản</a></div>
  </form>
<?php } ?>


</div>
</div>
</div>
    <script type="text/javascript">
      var x = document.getElementById("login-form");
      $('#log').on('click', function(){
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
      });
    </script>

    <?php
        if(isset($_POST["log_out"])){
            ?>
            <!-- <script>
            alert("ádfghjh");
            </script> -->
            <?php
            unset($_SESSION['username']);
            session_unset();
            session_destroy();
            header('Location:index.php');
        }
    ?>
<!-- Van modified ↑↑ -->
<div id="nav">
  <ul class="container menu">
    <li class="home"><a href="index.php" title=""></a></li>
    <?php
      $sql = 'select * from `nav-menu`';
      $query = mysqli_query($link,$sql);
      while($r=mysqli_fetch_assoc($query)){
    ?>
      <li class=""><a><?php echo $r['name']; ?></a>
        <ul class="sub-menu">
          <?php
            $handle = $r['handle'];
            $sql = 'select * from `'.$handle.'`';
            $query1 = mysqli_query($link,$sql);
            while($r1=mysqli_fetch_assoc($query1)){
          ?>
          <?php
            if ($handle == 'category' or $handle == 'nation') {
              echo '<li class=""><a href="?mod=list&type='.$handle.'&id='.$r1['id'].'">'.$r1['name'].'</a></li>';
            }
            else {
              echo '<li class=""><a href="?mod=list&type='.$handle.'&year='.$r1['year'].'">'.$r1['name'].'</a></li>';
            }
          ?>
          <?php
            }
          ?>
        </ul>
      </li>
    <?php
      }
    ?>
  </ul>
</div>
<div id="nav2">
  <div class="container">
    <h2 class="title">Xem phim online chất lượng cao</h2></div>
</div>
<style>
  
  #logout{
    min-width: 120px;
    outline: none;
    border: none;
    padding: 10px;
    text-align: center;
    cursor: pointer;
    line-height: 20px;
    transition: all .1s linear;
  }

  .manage-account{
    line-height: 20px;
    padding: 10px;
    color: black;
    transition: all .1s linear;
    
  }

  #logout:hover,
  .manage-account:hover{
    background-color: #ccc;
  }

  .user{
    line-height: 63px;
    cursor: pointer;
    position: relative;
  }

  .user-right{  
    display: flex;
    flex-direction: column;
    transform: scale(0);
    opacity: 0;
    position: absolute;
    top: 56px;
    right: 0;
    z-index: 100;
    background-color: white;
    transition: all .2s ease-in;
    transform-origin: 80% top;
  }

  .user-right::before{
    content: "";
    position: absolute;
    top: -10px;
    right: 12%;
    border-width: 0px 14px 10px 14px;
    border-style: solid;
    border-color: transparent transparent white transparent;
  }

  .user:hover .user-right{
    transform: scale(1);
    opacity: 1;
  }

  .user-avatar-icon{

  }
</style>

