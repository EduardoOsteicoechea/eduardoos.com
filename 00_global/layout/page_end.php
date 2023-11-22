<?php 
    include 'footer.php';
    function print_page_end($indexFolder)
    {
        $component = 
        '
                </main> 
                '.print_footer( $indexFolder ).'
            </body>
        </html>
        '; 
        return $component;
    };
?>