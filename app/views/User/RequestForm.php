{* Smarty *}

<form action="{$hostName}/user/request" method="POST" onsubmit="javascript:return TestSubmitForm(this);">
 <div class="p50l">
  <div class="form-group">
   <label><font color="red">*</font> Причина розблокування</label>
   <textarea class="form-control" rows="9" id="reason" name="reason" onfocus="javascript:TextOnFocus();"></textarea>
   <div id="error_form" class="form-group has-error">
    <label class="control-label" for="inputError">Мінімальна кількість символів: 10</label>
   </div>
  </div>
  <div class="form-group">
   <label><font color="red">*</font> Тип розблокування</label>
   <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input id="foType1" name="foType" type="radio" value="З флешки на ПК"> З флешки на ПК
   <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input id="foType2" name="foType" type="radio" value="З ПК на флешку"> З ПК на флешку
   <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input id="foType3" name="foType" type="radio" value="Обмін між флешкою та ПК"> Обмін між флешкою та ПК
  </div>
  <div class="form-group">
   <p></p>
   <input id="submit" name="submit" type="submit" value="Надіслати запит &rarr;" class="btn btn-success">
  </div>
 </div>
 <div class="p50r">
  <div class="form-group">
   <label>Прізвище та ім'я</label>
   <!--<%
   Set oRs=objConn.Execute("SELECT AD_Users.guid, AD_Users.Name FROM AD_Users WHERE AD_Users.ntlm='"&lUser&"'")-->
   <input class="form-control"  id="user_name" name="user_name" type="text" value="{$data.userName}" READONLY>
  </div>
  <div class="form-group">
   <label>Ідентифікатор користувача</label> 
   <input class="form-control" id="ntlm" name="ntlm" type="text" value="{$data.userLogin}" READONLY>
  </div>
  <div class="form-group">
   <label>Ім'я комп'ютера <font color="#ccc">&nbsp; / &nbsp;</font> IP адреса</label>
   <input class="form-control" id="computer_name" name="computer_name" type="text" value="" READONLY>
   <input id="ip_address" name="ip_address" type="hidden" value="{$data.sIP}" >
  </div>
  <div class="form-group">
   <label>Термін</label>
   <input class="form-control" type="text" value="Тимчасово" READONLY>
   <input id="period" name="period" type="hidden" value="1">
  </div>
 </div>
</form>
<script type="text/javascript">
    //alert(ax);
    if (ax)
    {
        document.getElementById("computer_name").value = ax.ComputerName;
    } else
    {
        document.getElementById("computer_name").value = "{$data.sIP}";
    }
</script>
