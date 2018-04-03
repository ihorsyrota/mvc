{* Smarty *}

<table align="center">
 <tbody>
  <tr>
   <td>
    <br><br><br><br><br>
    <h3><font color="#880000">На даний момент в системі існує не відпрацьований запит по доступу до USB від Вашого імені.</font></h3>
    <br><br><br><br>
    <table border="0" cellpadding="5" cellspacing="0" width="100%" style="border-bottom:dashed 2px #dddddd;">
     <tbody>
      <tr class="header"><td>н/п</td><td>Прізвище, ім'я</td><td>Ідентифікатор користувача</td><td>Ім'я комп'ютера</td><td>Причина</td><td>Термін</td></tr>
      {foreach from=$data item=row}
          <tr><td><a href="{$hostName}/request/user/{$row.resID}">{$row.resID}</a>
          </td><td>{$row.resUsername}
          </td><td>{$row.resNTLM}
          </td><td>{$row.resCompName}
          </td><td>{$row.resReason}
          </td><td>{$row.resType}</td></tr>
      {/foreach}
     </tbody>
    </table>
    <br><br><br>
    <div style="width:800px;">
     <script type="text/javascript">
         function mesiqg8(theyear, themonth, theday, thehour, themin, thesec)
         {
             yr = theyear;
             mo = themonth;
             da = theday;
             hr = thehour;
             min = themin;
             sec = thesec
         }
         mesiqg8(, , , , , )
                 var occasion = ""
         var message_on_occasion = "Порт заблоковано"
         var countdownwidth = '800px'
         var countdownbgcolor = 'transparent'
         var opentags = '<div style="color:#000000;font-weight:bold;">countdown / залишилось: '
         var closetags = '</div>'
         var montharray = new Array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec")
         var crosscount = ''

         function tes3qqxk() {
             if (document.layers)
                 document.countdownnsmain.visibility = "show"
             else if (document.all || document.getElementById)
                 crosscount = document.getElementById && !document.all ? document.getElementById("countdownie")
                         : countdownie
             countdown()
         }
         if (document.all || document.getElementById)
             document.write('<span id="countdownie" style="width:' + countdownwidth + '; background-color:' + countdownbgcolor + '"></span>')
         window.onload = tes3qqxk
         function countdown() {
             var today = new Date()
             var todayy = today.getYear()
             if (todayy < 1000)
                 todayy += 1900
             var todaym = today.getMonth()
             var todayd = today.getDate()
             var todayh = today.getHours()
             var todaymin = today.getMinutes()
             var todaysec = today.getSeconds()
             var todaystring = montharray[todaym] + " " + todayd + ", " + todayy + " " + todayh + ":" + todaymin + ":" + todaysec
             futurestring = montharray[mo - 1] + " " + da + ", " + yr + " " + hr + ":" + min + ":" + sec
             dd = Date.parse(futurestring) - Date.parse(todaystring)
             dday = Math.floor(dd / (60 * 60 * 1000 * 24) * 1)
             dhour = Math.floor((dd % (60 * 60 * 1000 * 24)) / (60 * 60 * 1000) * 1)
             dmin = Math.floor(((dd % (60 * 60 * 1000 * 24)) % (60 * 60 * 1000)) / (60 * 1000) * 1)
             dsec = Math.floor((((dd % (60 * 60 * 1000 * 24)) % (60 * 60 * 1000)) % (60 * 1000)) / 1000 * 1)
             if (dday <= 0 && dhour <= 0 && dmin <= 0 && dsec <= 1 && todayd == da) {
                 if (document.layers) {
                     document.countdownnsmain.document.countdownnssub.document.write(opentags + message_on_occasion + closetags)
                     document.countdownnsmain.document.countdownnssub.document.close()
                 } else if (document.all || document.getElementById)
                     crosscount.innerHTML = opentags + message_on_occasion + closetags
                 return
             } else if (dday <= -1) {
                 if (document.layers) {
                     document.countdownnsmain.document.countdownnssub.document.write(opentags + "Reset Countdown" + closetags)
                     document.countdownnsmain.document.countdownnssub.document.close()
                 } else if (document.all || document.getElementById)
                     crosscount.innerHTML = opentags + "Please Check Countdown " + closetags
                 return
             } else {
                 if (document.layers) {
                     document.countdownnsmain.document.countdownnssub.document.write(opentags + '<font style="font-size:21px;color:#ff0000;">' + dhour + '</font> hours / годин, <font style="font-size:21px;color:#ff0000;">' + dmin + '</font> minutes / хвилин, <font style="font-size:21px;color:#ff0000;">' + dsec + '</font> seconds / секунд')
                     document.countdownnsmain.document.countdownnssub.document.close()
                 } else if (document.all || document.getElementById)
                     crosscount.innerHTML = opentags + '<font style="font-size:21px;color:#ff0000;">' + dhour + '</font> hours / годин, <font style="font-size:21px;color:#ff0000;">' + dmin + '</font> minutes / хвилин, <font style="font-size:21px;color:#ff0000;">' + dsec + '</font> seconds / секунд'
             }
             setTimeout("countdown()", 1000)
         }
     </script>
    </div>
   </td>
  </tr>
 </tbody>
</table>
