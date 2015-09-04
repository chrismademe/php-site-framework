
<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyAeP_G3ffklPHmkCIdhkVGq0GtzhusHHls"></script>
<script src="<?php assets_dir() ?>/js/vendor.js"></script>
<script src="<?php assets_dir() ?>/js/main.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded",function(){cookieChoices.showCookieConsentBar("This website use cookies to give you the best experience.","OK","Learn more","http://www.allaboutcookies.org")});
var $buoop = {c:2};
function $buo_f(){
 var e = document.createElement("script");
 e.src = "//browser-update.org/update.min.js";
 document.body.appendChild(e);
};
try {document.addEventListener("DOMContentLoaded", $buo_f,false)}
catch(e){window.attachEvent("onload", $buo_f)}
</script>

<?php if ( is_localhost() ): ?>
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
<?php endif; ?>

</body>
</html>
