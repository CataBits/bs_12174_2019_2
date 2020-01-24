<?php

// Tratamento do JavaScript da página
if ($js != "") {
    $js = "<script src=\"{$js}\"></script>\n";
} else {
    $js = null;
}

?>

</main>

<footer class="footer">
    <a class="footer-home" href="index.php"><i class="fas fa-home"></i></a>
    <div class="copyright">
        &copy; Copyright 2020 André Luferat.
    </div>
    <a class="footer-topo" href="#topo"><i class="fas fa-arrow-alt-circle-up"></i></a>
</footer>

</div>    

<script src="js/jquery.min.js"></script>
<!-- <script src="js/global.js"></script> -->
<?php echo $js ?>
</body>
</html>