<?php
include ("top.php");
include ("header.php");
include ("nav.php");
?>
        
    
            <h1>Snowfall Data</h1>
            <p>Many ski resorts on the East Coast try to lure in tourists by boasting about key 
                features such as number of trails, numbers of lifts, snowmaking capacity, and after-party events.  
            </p>
            <p>Another thing many of the East Coast resorts brag about is annual snowfall.  Stowe, for example, says
                that they get about 200 inches annually.  The following data array, below, shows the amount of snow
                various mountains across the country got last year.  A picture of each mountain is listed, which will take 
                you directly to the mountain's website.  The name of the mountain as well as snowfall, in inches, are
                listed below the picture.</p>
            <p>I would also like to point out that this year, 2015, is projected to be a record year
                for East Coast resorts such as Stowe, Jay Peak, and Cannon.  Stowe's base depths are currently deeper
                than Alta, as of March 1, 2015.
            </p>
            <figure>
                <img src="imageedit_2_2004663318.gif" title="Stowe Summit" alt="Photo I took at Stowe Summit"/>
                <figcaption>Transparent Image</figcaption>
            </figure>
            <h2>2014 Snowfall in Inches for Various Mountains</h2>
            
                                <?php
                /* Sample code to open a plain text file */
//open a file
                $debug = false;

                if (isset($_GET["debug"])) {
                    $debug = true;
                }

                $myFileName = "snowfall";

                $fileExt = ".csv";

                $filename = $myFileName . $fileExt;

                if ($debug)
                    print "\n\n<p>filename is " . $filename;

                $file = fopen($filename, "r");

                /* the variable $file will be empty or false if the file does not open */
                if ($file) {
                    if ($debug)
                        print "<p>File Opened</p>\n";
                }
//read and close the file
                /* the variable $file will be empty or false if the file does not open */
                if ($file) {

                    if ($debug)
                        print "<p>Begin reading data into an array.</p>\n";

                    /* This reads the first row, which in our case is the column headers */
                    $headers = fgetcsv($file);

                    if ($debug) {
                        print "<p>Finished reading headers.</p>\n";
                        print "<p>My header array<p><pre> ";
                        print_r($headers);
                        print "</pre></p>";
                    }
                    /* the while (similar to a for loop) loop keeps executing until we reach 
                     * the end of the file at which point it stops. the resulting variable 
                     * $records is an array with all our data.
                     */
                    while (!feof($file)) {
                        $records[] = fgetcsv($file);
                    }

                    //closes the file
                    fclose($file);

                    if ($debug) {
                        print "<p>Finished reading data. File closed.</p>\n";
                        print "<p>My data array<p><pre> ";
                        print_r($records);
                        print "</pre></p>";
                    }
                    // ends if file was opened
                } ?> 
            <div>
                <table>
                <tr>
                    <td></td>
                    <td><u>Mountain</u></td>
                    <td><u>Inches</u></td>
                </tr>
                <?php
                //display the data
                foreach ($records as $oneRecord): ?> 
                <tr>
                    <td><?php echo $oneRecord[1]; ?></td>
                    <td><?php echo $oneRecord[2]; ?></td>
                    <td><?php echo $oneRecord[3]; ?></td>
                    
                </tr>
                
                <!--
                    if ($oneRecord[0] != "") {  //the eof would be a "" 
                        print "<br/>";
                        print "\n\t";
                        //print out values
                        print '<a href="' . $oneRecord[4] . '" target="_blank" ' . '>';
                        print '<img src="' . $oneRecord[5] . '" alt="' . $oneRecord[2] . '">';
                        print '</a>';
                        print '<span class="userID">' . $oneRecord[1] . '</span>';
                        print '<br/>';
                        print '<span class="description">' . $oneRecord[2] . '</span>';
                        print '<br/>';
                        print '<span class="snowfall">' . $oneRecord[3] . '<br/>' . '</span>';
                        print "\n\t";
                     *
                     */-->
                    
                
                <?php endforeach; ?>
                </table> 
            </div>
                <?php
                if ($debug)
                    print "<p>End of processing.</p>\n";
                include ("footer.php");
                ?>
           
    </body>
    </html>

