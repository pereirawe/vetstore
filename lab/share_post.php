<?php
    $url= "https://" . $_SERVER["HTTP_HOST"]. $_SERVER["REQUEST_URI"];
    
    $url_opt= str_replace ( ':', '%3A', $url );
    $url_opt= str_replace ( '/', '%2F', $url );
    
    $title = "Prueba de Share a Post";
    $title_opt= str_replace ( ' ', '%20', $url );

?>
<h1>Compartir</h1>

    <ul>
        <li>
            <a href="https://www.facebook.com/sharer.php?u=<?php echo $url_opt; ?>&t=<?php echo $title_opt; ?>" target="_blank">
                Facebook
            </a>
        </li>
        <li>
            <a href="https://twitter.com/intent/tweet?text=<?php echo $title; ?>&url=<?php echo $url_opt; ?>" target="_blank">
                Twitter
            </a>
        </li>
        <li>
            <a href="https://plus.google.com/share?url=<?php echo $url_opt; ?>">
                Google Plus
            </a>
        </li>
        <li>
            <a href="https://www.linkedin.com/cws/share?token&isFramed=false&url=<?php echo $url_opt; ?>">
                LinkedIn
            </a>
        </li>
    </ul>