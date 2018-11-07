<?php
$xml = simplexml_load_file("http://rss.sueddeutsche.de/app/service/rss/alles/index.rss?output=rss");
$namespaces = $xml->getNameSpaces(true);
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>
<body>
    <form action="" method="get">
        <input type="text" name="suche" placeholder="Search..">
        <input type="submit" value="Suchen">
    </form>
<?php
$search = $_GET['suche'];
foreach ($xml->channel->item as $item){

    print '<div id="news">';
    if ((strpos(strtolower($item->title->__toString()),strtolower($search)) !== false) || !isset($search) ) {
        print '<h2>'.$item->title.'</h2>';
        print '<p>'.$item->description;'</p>';
    }
    print '</div>';
}
?>
