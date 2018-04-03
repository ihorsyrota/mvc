{* Smarty *}

<div class="p50l">
 <h3><font color="#880000">Дані про заявку</font></h3>
 <br />
 <div class="form-group">
  <label>Прізвище та ім'я</label>
  <input class="form-control" name="user_name" type="text" value="{$data.resUsername}" READONLY>
 </div>
 <div class="form-group">
  <label>Ідентифікатор користувача</label> 
  <input class="form-control" name="ntlm" type="text" value="{$data.resNTLM}" READONLY>
 </div>
 <div class="form-group">
  <label>Ім'я комп'ютера <font color="#ccc">&nbsp; / &nbsp;</font> IP адреса</label>
  <input class="form-control" name="computer_name" type="text" value="{$data.resCompName}" READONLY>
 </div>
 <div class="form-group">
  <label>Тип розблокування</label>
  <input class="form-control" type="text" name="unlockType" value="{$data.resType}" READONLY>
 </div>
 <div class="form-group">
  <label>Термін</label>
  <input class="form-control" type="text" name="unlockPeriod" value="Тимчасово" READONLY>
 </div>
 <div class="form-group">
  <label>Причина розблокування</label>
  <textarea class="form-control" rows="9" name="reason" READONLY >{$data.resReason}</textarea>
 </div>
 <div class="form-group">
  <a href="{$hostName}{$data.goBack}">Повернутись</a>
 </div>
</div>
<div class="p50r">
 <h3><font color="#880000">Параметри опрацювання заявки</font></h3>
 <br />
 <div class="form-group">
  <label>Дата і час подачі заявки</label>
  <input class="form-control" name="requestDate" type="text" value="{$data.resDate}" READONLY>
 </div>
 <div class="form-group">
  <label>Безпосередній керівник</label> 
  <input class="form-control" name="checker" type="text" value="{$data.resCheckername}" READONLY>
 </div>
 <div class="form-group">
  <label>Стан опрацювання</label> 
  <input class="form-control" name="checkerState" type="text" value="{$data.empty}" READONLY>
 </div>
 <div class="form-group">
  <label>Спеціаліст Служби безпеки</label> 
  <input class="form-control" name="secChecker" type="text" value="{$data.resSecCheckername}" READONLY>
 </div>
 <div class="form-group">
  <label>Стан опрацювання</label> 
  <input class="form-control" name="secCheckerState" type="text" value="{$data.empty}" READONLY>
 </div>
 <div class="form-group">
  <label>Спеціаліст ІТ-безпеки</label> 
  <input class="form-control" name="mainChecker" type="text" value="{$data.resMainCheckername}" READONLY>
 </div>
 <div class="form-group">
  <label>Стан опрацювання</label> 
  <input class="form-control" name="mainCheckerState" type="text" value="{$data.empty}" READONLY>
 </div>
</div>
