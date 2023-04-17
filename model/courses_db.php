<!-- here we will put all the functions that interact with the courses table -->
<?php

function get_courses()
{
    global $db;
    $query = 'SELECT * FROM courses ORDER BY courseID';
    $statement = $db->prepare($query);
    $statement->execute();
    $courses = $statement->fetchAll();
    $statement->closeCursor();
    return $courses;
}

function get_course_name($courseID)
{

    if (!$courseID) {
        return "All courses ";
    }
    global $db;
    $query = "SELECT * FROM courses WHERE courseID=:courseid";
    $statement = $db->prepare($query);
    $statement->bindValue(":courseid", $courseID);
    $statement->execute();
    $course = $statement->fetch();
    $statement->closeCursor();
    $courseName = $course["courseName"];
    return $courseName;
}


function delete_course($courseID)
{

    global $db;
    $query = 'DELETE FROM courses WHERE courseID=:course_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":course_id", $courseID);
    $statement->execute();
    $statement->closeCursor();
}

function add_course($courseName)
{
    global $db;
    $query = 'INSERT INTO courses (courseName) VALUES (:course_name)';
    $statement = $db->prepare($query);
    $statement->bindValue(":course_name", $courseName);
    $statement->execute();
    $statement->closeCursor();
}
