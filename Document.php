<?php
/**
 * Created by PhpStorm.
 * User: Thomas
 * Date: 25.10.2017
 * Time: 15:24
 */
include 'Doc.php';
include 'SchoolClass.php';
include 'Subject.php';

include 'mysql.php';

if (strcasecmp(@$_GET['m'], "getclasses") == 0) {
    $sql = "SELECT * FROM classes";
    $result = $conn->query($sql);
    $classes = array();

    if ($result->num_rows > 0) {
        $counter = 0;
        while ($row = $result->fetch_assoc()) {
            $classes[$counter] = new SchoolClass($row["id"], $row["name"]);
            $counter++;
        }
    } else {
        echo "0 results";
    }
    echo json_encode((array)$classes, JSON_PRETTY_PRINT);

} else if (strcasecmp(@$_GET['m'], "getsubjects") == 0) {
    $class = @$_GET['class'];
    $sql = "SELECT * FROM subjects WHERE class_id=" . (int)$class;
    $result = $conn->query($sql);
    $subjects = array();

    if ($result->num_rows > 0) {
        $counter = 0;
        while ($row = $result->fetch_assoc()) {
            $subjects[$counter] = new Subject($row["id"], $row["name"], $row["class_id"]);
            $counter++;
        }
    } else {
        echo "0 results";
    }
    echo json_encode((array)$subjects, JSON_PRETTY_PRINT);
} else if (strcasecmp(@$_GET['m'], "getdocuments") == 0) {
    $subject = @$_GET['subject'];
    $sql = "SELECT * FROM documents WHERE subject_id=" . (int)$subject;
    $result = $conn->query($sql);
    $subjects = array();

    if ($result->num_rows > 0) {
        $counter = 0;
        while ($row = $result->fetch_assoc()) {
            $subjects[$counter] = new Doc($row["id"], $row['name'], $row["subject_id"], $row["url"]);
            $counter++;
        }
    } else {
        echo "0 results";
    }
    echo json_encode((array)$subjects, JSON_PRETTY_PRINT);
} else if (strcasecmp(@$_GET['m'], "getdocument") == 0) {
    $id = @$_GET["id"];
    if ($id != null || $id != "") {
        $sql = "SELECT * FROM documents WHERE id=" . (int)$id . ";";
        $result = $conn->query($sql);
        $url = "";

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $url = $row["url"];
            }
        } else {
            echo "0 results";
        }
        $conn->close();

        echo $url;
    }
}else if(strcasecmp(@$_GET['m'], "adddocument") == 0) {
}else if(strcasecmp(@$_GET['m'], "adddocument") == 0) {
}else if(strcasecmp(@$_GET['m'], "uploaddocument") == 0) {
    $url = @$_GET['url'];
    $name = @$_GET['name'];
    $subject = @$_GET['subject'];
}
else {
    echo "<h1>Halo i bims 1 PHP Datei</h1>";
}

