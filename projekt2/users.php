<?php include "init.php" ?>
<?php include "head.php" ?>

<article>
    <h1>Bläddra i kontaktannonserna</h1>
    <p>Använd filter för att specifiera din sökning</p>
    <p>
        <!-- Formulär -->
        <form action="users.php" method="get">

        <!-- Radio buttons för sortering -->
        <label for="rich">Rika först</label>
        <input type="radio" name="sort" value="rich"><br>


        <label for="poor">Rika sist</label>
        <input type="radio" name="sort" value="poor"><br><br>

        <label for="pop">Populära först</label>
        <input type="radio" name="sort" value="pop"><br>

        <label for="notpop">Populära sist</label>
        <input type="radio" name="sort" value="notpop"><br><br>
            
        <!-- Dropdown för preference -->
        <label for="pref">Välj</label>

                <select name="pref">
                    <option value="1">Man</option>
                    <option value="2">Kvinna</option>
                    <option value="3">Annan</option>
                    <option value="4">Båda</option>
                    <option value="5">Allt</option>
                </select>

                <input type="submit" value="Filtrera">
        </form>
            
    </p>
    <?php include "fetch.php" ?>
</article>

<?php include "footer.php" ?>