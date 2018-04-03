{* Smarty *}

{include file="header.tpl"}
<!-- ?php include $this->config[ 'dirs' ][ 'fp_templates' ] . 'header.php'; ? -->

<div>
 <!-- Included content view starts here-->
{include file=$contentView} 
     <!-- ?php include $contentView; ? -->
 <!-- Included content view ends here-->
</div>
{include file="footer.tpl"}
<!-- ?php include $this->config[ 'dirs' ][ 'fp_templates' ] . 'footer.php'; ? -->
