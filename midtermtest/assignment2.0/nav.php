<nav>
    <div>
        <ol>
        <?php
        /* This sets the current page to not be a link. Repeat this if block for
         *  each menu item */
        if ($path_parts['filename'] == "index") {
            print '<li class="activePage">Home</li>';
        } else {
            print '<li><a href="index.php">Home</a></li>';
        }
        
        /* example of repeating */ 
        if ($path_parts['filename'] == "stowe") {
            print '<li class="activePage">Stowe</li>';
        } else {
            print '<li><a href="stowe.php">Stowe</a></li>';
        }
        if ($path_parts['filename'] == "mountwashington") {
            print '<li class="activePage">Mount Washington</li>';
        } else {
            print '<li><a href="mountwashington.php">Mount Washington</a></li>';
        }
        if ($path_parts['filename'] == "data") {
            print '<li class="activePage">Data</li>';
        } else {
            print '<li><a href="data.php">Data</a></li>';
        }
        ?>    
        </ol>
    </div>
</nav>

