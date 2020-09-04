</div>
<?php if (isset($_SESSION['user']) && $_GET['url'] != 'postAdd') {?>
    <button class="btn btn-outline-primary my-2 my-sm-0 mx-2"
            type="button"
            style="position:absolute;bottom:20px; right:20px;"
            onclick="location.href='/OnlineAdvisor/postAdd'">
        +
    </button>
    <?php
}
?>
</body>
</html>