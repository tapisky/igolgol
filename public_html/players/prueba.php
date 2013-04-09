<html>
<head>
<script type="text/javascript">
  function progress() {
   if (document.images["bar"].width < 125) {
    document.images["bar"].width += 1;
    document.images["bar"].height = 12;
   } else {
    clearInterval(ID);
   }
  }
 
var ID;
window.onload = function() {
  ID = setInterval("progress();", 5);
}
</script>
</head>
<body>
<img src="../images/graphics/elements/progress.png" name="bar" width=1 height=1/>
</body>
</html>