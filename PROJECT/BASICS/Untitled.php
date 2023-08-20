<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>
</head>

<body>
<table width="414" height="500" border="1">
  <tr>
    <td width="78">Name:</td>
    <td width="324"><form id="form1" name="form1" method="post" action="">
      <input name="textfield" type="text" id="textfield" size="36" />
    </form></td>
  </tr>
  <tr>
    <td>Gender</td>
    <td><form id="form2" name="form2" method="post" action="">
      <p>
        <label>
          <input type="radio" name="RadioGroup1" value="male" id="RadioGroup1_0" />
          Male</label>
        <br />
        <label>
          <input type="radio" name="RadioGroup1" value="female" id="RadioGroup1_1" />
          Female</label>
        <br />
        <label>
          <input type="radio" name="RadioGroup1" value="others" id="RadioGroup1_2" />
          Others</label>
        <br />
      </p>
    </form></td>
  </tr>
  <tr>
    <td>Contact</td>
    <td><form id="form3" name="form3" method="post" action="">
      <input name="textfield2" type="text" id="textfield2" size="36" />
    </form></td>
  </tr>
  <tr>
    <td>Address</td>
    <td><form id="form4" name="form4" method="post" action="">
      <textarea name="textarea" id="textarea" cols="21" rows="5"></textarea>
    </form></td>
  </tr>
  <tr>
    <td height="36">District</td>
    <td><form id="form5" name="form5" method="post" action="">
      <select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)">
        <option>Ernakulam</option>
        <option>Kottayam</option>
        <option>Trivandrum</option>
      </select>
    </form></td>
  </tr>
  <tr>
    <td>Mark1</td>
    <td><form id="form6" name="form6" method="post" action="">
      <input name="textfield3" type="text" id="textfield3" size="36" />
    </form></td>
  </tr>
  <tr>
    <td>Mark2</td>
    <td><form id="form7" name="form7" method="post" action="">
      <input name="textfield4" type="text" id="textfield4" size="36" />
    </form></td>
  </tr>
  <tr>
    <td height="35">Mark3</td>
    <td><form id="form9" name="form9" method="post" action="">
      <input name="textfield6" type="text" id="textfield6" size="36" />
    </form></td>
  </tr>
  <tr>
    <td height="35" colspan="2"><form id="form8" name="form8" method="post" action="">
      <input type="submit" name="Submit" id="button" value="Submit" />
    </form></td>
  </tr>
</table>
</body>
</html>
