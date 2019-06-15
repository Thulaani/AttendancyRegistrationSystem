<?php
require_once 'config/config.php';
require_once 'config/session.php'; 
require_once 'class/dbclass.php';
require_once 'class/EmpRegister.php';

$emp = new EmpRegister();
$EmpID = $_REQUEST['EmpID'];
if($EmpID != NULL){
    $result = $emp->get($EmpID);
    if($result == NULL){
        $EmpID = '';
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <?php require_once 'config/commonJS.php'; ?>
        <script>
             $(document).ready(function(){
                   $( "#EmpBirthdate" ).datepicker({
                        dateFormat: 'yy-mm-dd',
                        showOn: "button",
			buttonImage: "images/calendar.gif",
			buttonImageOnly: true,
                        changeMonth: true,
                        changeYear: true,
                        yearRange: "-30"
                   });
              });
        </script>
        <script>
            window.onload = menuSelect('menuEmployee');
        </script>
    </head>
<title>Mpande Technology</title>
    <body>
        <!-- wrap starts here -->
        <div id="wrap">

            <!--header -->
            <?php @require_once 'menu/header.php'; ?>

            <!-- navigation -->	
            <?php @require_once 'menu/menu.php'; ?>

            <!-- content-wrap starts here -->
            <div id="content-wrap">
                <div id="main">				
                    <?php echo $_SESSION['Msg']; ?>
                    <form id="formSubmit" method="post" action="process/processEmpRegister.php">
            <input type="hidden" name="type" value="<?php echo $EmpID == '' ? 'Add' : 'Update'; ?>"/>
            <input type="hidden" name="EmpID" value="<?php echo $EmpID; ?>"/>
            <center>
            <table class="tbl" width="500px">
			
                <tr>
                    <td><b>Name</b></td>
                    <td><input type="text" class="validate[required]" name="EmpName" id="EmpName" value="<?php echo $result[0]['EmpName'];?>"/>
					</td>
                </tr>
                <tr>
                    <td><b>Address</b></td>
                    <td><textarea rows="5" cols="30" class="validate[required]" name="EmpAddress" id="EmpAddress" >
					<?php echo $result[0]['EmpAddress'];?></textarea></td>
                </tr>
                <tr>
				
                    <td><b>Mobile</b></td>
                    <td><input class="validate[required,minSize[5],custom[integer]]" type="text" class="validate[required]" 
					name="EmpMobile" id="EmpMobile" value="<?php echo $result[0]['EmpMobile'];?>"/></td>
                </tr>
                <tr>
                    <td><b>Email</b></td>
                    <td><input type="text" class="validate[required,custom[email]]" name="EmpEmail" id="EmpEmail" value=
					"<?php echo $result[0]['EmpEmail'];?>"/></td>
                </tr>
                <tr>
                    <td><b>Joining Date</b></td>
                    <td><input type="text" class="validate[required]" readonly name="EmpBirthdate" id="EmpBirthdate" value="
					<?php echo $result[0]['EmpBirthdate'];?>"/></td>
                </tr>
                <tr>
                    <td><b>Emp Group</b></td>
                    <td><select name="EmpGroup" id="EmpGroup">
                            <option value="1" <?php echo $result[0]['EmpGroup'] == '1' ? 'selected' : ''; ?> >1</option>
                            <option value="2" <?php echo $result[0]['EmpGroup'] == '2' ? 'selected' : ''; ?> >2</option>
                            <option value="3" <?php echo $result[0]['EmpGroup'] == '3' ? 'selected' : ''; ?> >3</option>
                              </select>
                    </td>
                </tr>
                <tr>
                    <td><b>Tech Class</b></td>
                    <td>
                        <select name="EmpTechnology" id="EmpTechnology">
                            <option value="PhP" <?php echo $result[0]['EmpTechnology'] == 'PhP' ? 'selected' : ''; ?> >Programming</option>
                            <option value="WebDevelopment" <?php echo $result[0]['EmpTechnology'] == 'WebDevelopment' ? 'selected' : ''; ?> >
							Web Development</option>
                                </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" id="" value="<?php echo $EmpID == '' ? 'Register' : 'Update'; ?>"/></td>
                </tr>
            </table>
            </center>
        </form>
                    <div class="clear"></div>
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
