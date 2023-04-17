<?php include("header.php"); ?>

<header>
    <h1>Assignment</h1>
    <form action="." method="get">
        <input type='hidden' name='action' value='list_assignments'>
        <select name="course_id" required>

            <option value="0"> View All</option>
            <?php
            foreach ($courses as $course) {
                if ($course_id == $course['courseID']) {
                    echo "<option value='$course[courseID]' selected>$course[courseName]</option>";
                } else {
                    echo "<option value='$course[courseID]'>$course[courseName]</option>";
                }
            } ?>

        </select>
        <button>Search</button>
    </form>

</header>
<section>
    <?php
    if ($assignments) {

        foreach ($assignments as $assign) {
            echo  "<div class=assignment> ";
            if (!$course_id) echo "  <p class='courseName'>$assign[courseName] </p>";
            echo  "<p class='description'>$assign[Description]</p> 
                    </div> ";
            echo "
                
                
                <div >
                <form action='.' method='post'>
                    <input type='hidden' name='action' value='delete_assignment'>
                    <input type='hidden' name='course_id' value='$course_id'>
                    <input type='hidden' name='assignment_id' value='$assign[ID]'>
                    <button >❌</button>
                </form>
            </div>
                
                ";
        }
    } else {
        if ($course_id) {
            echo "<p>No assignments exist for this course yet.</p>";
        } else {
            echo "<p>No assignments exist yet.</p>";
        }
    }

    ?>
</section>
<section>
    <h1>Add assignment</h1>
    <form action="." method="post">
        <input type="hidden" name="action" value="add_assignment">
        <label for="cn">Course Name:</label>
        <select id="cn" name="course_id">
            <option>Please select</option>
            <?php
            foreach ($courses as $course) {
                echo "<option value='$course[courseID]'>$course[courseName]</option>";
            }
            ?>
        </select>
        <label for="desc">Description</label>
        <input id="desc" type="text" placeholder="Description" name="description" maxlength="120">
        <button>Add</button>
    </form>

</section>

<p><a href=".?action=list_courses">View/Edit Courses</a></p>

<?php include("footer.php"); ?>