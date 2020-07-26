/**
 * Created by ubuntu on 11/9/17.
 */
<script>
function resize() {
    var n = $("body").width() / 45 + "pt";
    $("h1").css('fontSize', n);
}
$(window).on("resize", resize);
$(document).ready(resize);
</script>