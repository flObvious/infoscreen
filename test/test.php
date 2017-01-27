<?php
$someVar = 5;
?>

<script type="text/javascript">
    var javaScriptVar = "<?php echo $someVar; ?>";
    alert(javaScriptVar);
</script>
