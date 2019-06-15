 

<?php 
@require_once 'config/config.php';
?>
<html>
    <head>
        <?php @require_once 'config/commonJS.php'; ?>		
    </head>
    
    <title>Mpande Technology</title>
    <body>
       <style>
       .Tfield{
width:300px;
border:1px solid #EFEDE9;
padding-left:6px;
font-size:100%;
height:30px;
}
.button{
width:68px;
border:0px solid;
background-color:#F0F0ED;
height:30px;
font-size:18px;
}
.button:hover{
background-color:blue;
color:black
}
       </style>
        <div id="wrap">
          
            <?php //@require_once 'menu/header.php'; ?>
            <div id="header">
                <h1 id="logo-text"><a href=".">Mpande Technologies</a></h1>
                <p id="slogan">For All Your IT & Telecoms Solutions</p>
                <div id="header-links">
                </div>
            </div>
            <!-- navigation -->	
            <?php //@require_once 'menu/menu.php'; ?>
            <!-- content-wrap starts here -->
            <div id="content-wrap">
                <div id="main">
                	<?php echo $_SESSION['Msg']; ?>
                    <form id="formSubmit" method="post" action="process/processLogin.php">
					<h1>Log in as Admin</h2>
                    <input type="hidden" name="type" value="login" />
                    <table class="tbl" width="700px">
                        <tr>
                            <td>User Name</td>
                            <td><input type="text" id="UserName" class="Tfield" class="validate[required]" name="UserName" /></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="password" id="Password" class="Tfield" class="validate[required]" name="Password" /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Login" class="button" name="submit" /></td>
                        </tr>
                    </table>
                    </form> 

						<form id="formSubmitt" method="post" action="process/processLogin.php"> 
						<h1>Log in as a student</h2>
                    <input type="hidden" name="type" value="studentLogin" />
                    <table class="tbl" width="700px">
                        <tr>
                            <td>UserName</td>
                            <td><input type="text" id="UserName" class="Tfield" class="validate[required]" name="UserName" /></td>
                        </tr>
                        <tr>
                            <td>password</td>
                            <td><input type="password" id="Password" class="Tfield" class="validate[required]" name="Password" /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td> <input type="submit" value="studentLogin" class="button" name="submit" /></td>
							 
                        </tr>
                    </table>
                        
                    <div class="clear"></div>
					</form>
                </div>
            <?php @require_once 'menu/sidemenu.php'; ?>	
            <!-- content-wrap ends here -->
            </div>
            <!--footer starts here-->
            <?php @require_once 'menu/footer.php'; ?>
            <!-- wrap ends here -->
        </div>
    </body>
</html>