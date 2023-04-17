<!-- here we will put all the functions that interact with the assignments table -->
<?php
function get_assignments_by_course($courseID) //Read all the assignments of a course if an id is provided or return all the assignment in the db 
{
    global $db;
    if ($courseID) {
        $query = 'SELECT A.ID,A.Description,C.courseName from assignments A LEFT JOIN courses C ON A.courseID=C.courseID WHERE A.courseID= :courseID ORDER BY A.ID ';
        $statement = $db->prepare($query);
        $statement->bindValue(":courseID", $courseID);
    } else {
        $query = 'SELECT A.ID,A.Description,C.courseName from assignments A LEFT JOIN courses C ON A.courseID=C.courseID ORDER BY C.courseID ';
        $statement = $db->prepare($query);
    }


    $statement->execute();
    $assignments = $statement->fetchAll();
    $statement->closeCursor();
    return $assignments;
}
function delete_assignment($assignment_id)
{
    global $db;
    $query = 'DELETE FROM assignments WHERE ID= :assign_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":assign_id", $assignment_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_assignment($description, $course_id)
{
    global $db;
    $query = 'INSERT INTO assignments (Description,courseID) VALUES (:descr,:courseID)';
    $statement = $db->prepare($query);
    $statement->bindValue(":descr", $description);
    $statement->bindValue(":courseID", $course_id);
    $statement->execute();
    $statement->closeCursor();
}
