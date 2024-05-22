<?php
    require_once('./includes/header.php');
?>
    <main>
       
        <hr>
        <h2 class="white">Tu información de perfil</h2>
        <hr>
        <section class="white">
            <p>Tu usuario es <?php echo $_SESSION['usuario'];?> </p>
            <p>Esta información la hemos recuperado usando las sesiones</p>
        </section>
    </main>
</body>
</html>