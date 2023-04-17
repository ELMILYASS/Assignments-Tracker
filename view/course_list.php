<?php include('view/header.php') ?>
<h1>Course List</h1>
<div class="courses">
    <?php
    if ($courses) {
        foreach ($courses as $course) { ?>
            <div class="course">
                <p><?= $course['courseName'] ?></p>
                <form action="." method="post">
                    <input type="hidden" name="action" value="delete_course">
                    <input type="hidden" name="course_id" value='<?= $course['courseID'] ?>'>
                    <button>❌</button>
                </form>
            </div>
    <?php }
    } else {
        echo "<p>There are no courses yet </p>";
    } ?>


</div>
<div class="addcourse">
    <h1>Add Course</h1>
    <form action="." method="post">
        <input type="hidden" name="action" value="add_course">
        <input type="text" placeholder="Name" name="course_name" require>
        <button>Add</button>
    </form>

</div>

<p><a href=".?action=list_assignments">View/Add Assignments</a></p>
<?php include('view/footer.php') ?>