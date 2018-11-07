<?php
$xml = simplexml_load_file("http://rss.sueddeutsche.de/app/service/rss/alles/index.rss?output=rss");
$namespaces = $xml->getNameSpaces(true);
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8"/>
    <style>
        h2{
            color: black;
            font-size: larger;
            font-family: 'IBM Plex Sans', sans-serif;
        }
        p{
            color: black:
            font-size: medium;
            font-family: 'IBM Plex Serif', serif;
            position: center;

        }
        #news{
            margin: auto;
            width: 50%;
            border-bottom: 1px solid;
            background-color: lightgrey;
        }
    </style>
</head>
<body>
<form action="" method="get" id="news">

    <p>Suchfeld:
        <input type="text" name="suche">
    </p>

    <p>
        <input type="submit" value="Suchen">
    </p>

</form>
<?php
$search = $_GET['suche'];
foreach ($xml->channel->item as $item){
    print '<div id="news">';
    if (strpos(strtolower($item->title->__toString()),strtolower($search)) !== false){
        print '<h2>'.$item->title.'</h2>';
        print '<p>'.$item->description;'</p>';
    }
    print '</div>';
}
?>
