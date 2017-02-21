    </div><!--/container-->
</div><!--/gp-page-->

<footer class="gb-footer">
    <p>&copy; <?= date("Y")?> Guest book by <a href="https://github.com/fczs">@fczs</a></p>
</footer>

<?php
if ($users->isUser()) {
    include(TEMPLATE_DIR . '/modal/message.php');
    include(TEMPLATE_DIR . '/modal/success.php');
} else {
    include(TEMPLATE_DIR . '/modal/login.php');
    include(TEMPLATE_DIR . '/modal/register.php');
    include(TEMPLATE_DIR . '/modal/terms.php');
}

if ($users->isAdmin()) {
    include(TEMPLATE_DIR . '/modal/delete.php');
    include(TEMPLATE_DIR . '/modal/error.php');
}
?>

<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="/template/js/main.js"></script>

</body>
</html>