{* Smarty *}
{foreach from=$data item="row"}
<tr{$row.style}><td><a href="{$hostName}/request/console/{$row.id}">{$row.id}</a></td>
 <td>{$row.Name}</td><td>{$row.itilium_id}</td>
 <td>{$row.ntlm}</td><td>{$row.inserttimestamplog}</td>
 <td>{$row.computer_name}</td><td>{$row.comments}</td>
 <td>Тимчасово</td><td>{$row.DateDiff}</td><td>{$row.status}</td>
 <td>{$row.manager}</td><td>{$row.security}</td>
 <td>{$row.it_security}</td></tr>
{/foreach}