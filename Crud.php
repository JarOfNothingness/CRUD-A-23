<?php
session_start(); // Start the session at the very top

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<?php include ('header.php'); ?>
<?php include ("../LoginRegisterAuthentication/connection.php"); ?>

<div class="box1">
    <a href="../Home/dashboard.php" class="btn btn-secondary">Back</a>
    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">ADD STUDENTS</button>
</div>

<!-- Filter and Search Form -->
<form method="GET" action="" class="mb-3">
    <div class="d-flex flex-wrap justify-content-center align-items-center">
        <div class="dropdown mb-2 mr-2">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo isset($_GET['school_level']) && $_GET['school_level'] ? $_GET['school_level'] : 'School Level'; ?>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="?school_level=SHS<?php echo isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : ''; ?>">SHS</a></li>
                <li><a class="dropdown-item" href="?school_level=JHS<?php echo isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : ''; ?>">JHS</a></li>
                <li><a class="dropdown-item" href="?school_level=">All Levels</a></li>
            </ul>
        </div>

        <div class="dropdown mb-2 mr-2">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="schoolYearDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo isset($_GET['school_year']) && $_GET['school_year'] ? $_GET['school_year'] : 'School Year'; ?>
            </button>
            <ul class="dropdown-menu" aria-labelledby="schoolYearDropdown">
                <li><a class="dropdown-item" href="?school_year=2023-2024<?php echo isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : ''; ?>">2023-2024</a></li>
                <li><a class="dropdown-item" href="?school_year=2022-2023<?php echo isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : ''; ?>">2022-2023</a></li>
                <li><a class="dropdown-item" href="?school_year=">All Years</a></li>
            </ul>
        </div>

        <div class="dropdown mb-2 mr-2">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="gradeDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo isset($_GET['grade']) && $_GET['grade'] ? $_GET['grade'] : 'Grade Level'; ?>
            </button>
            <ul class="dropdown-menu" aria-labelledby="gradeDropdown">
                <li><a class="dropdown-item" href="?grade=7th<?php echo isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : ''; ?>">7th</a></li>
                <li><a class="dropdown-item" href="?grade=8th<?php echo isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : ''; ?>">8th</a></li>
                <li><a class="dropdown-item" href="?grade=9th<?php echo isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : ''; ?>">9th</a></li>
                <li><a class="dropdown-item" href="?grade=10th<?php echo isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : ''; ?>">10th</a></li>
                <li><a class="dropdown-item" href="?grade=11th<?php echo isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : ''; ?>">11th</a></li>
                <li><a class="dropdown-item" href="?grade=12th<?php echo isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : ''; ?>">12th</a></li>
                <li><a class="dropdown-item" href="?grade=">All Grades</a></li>
            </ul>
        </div>

        <div class="dropdown mb-2 mr-2">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="sectionDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo isset($_GET['section']) && $_GET['section'] ? $_GET['section'] : 'Section'; ?>
            </button>
            <ul class="dropdown-menu" aria-labelledby="sectionDropdown">
                <li><a class="dropdown-item" href="?section=SectionA<?php echo isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : ''; ?>">Section A</a></li>
                <li><a class="dropdown-item" href="?section=SectionB<?php echo isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : ''; ?>">Section B</a></li>
                <li><a class="dropdown-item" href="?section=">All Sections</a></li>
            </ul>
        </div>

        <div class="dropdown mb-2 mr-2">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="genderDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo isset($_GET['gender']) && $_GET['gender'] ? $_GET['gender'] : 'Gender'; ?>
            </button>
            <ul class="dropdown-menu" aria-labelledby="genderDropdown">
                <li><a class="dropdown-item" href="?gender=Male<?php echo isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : ''; ?>">Male</a></li>
                <li><a class="dropdown-item" href="?gender=Female<?php echo isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : ''; ?>">Female</a></li>
                <li><a class="dropdown-item" href="?gender=">All Genders</a></li>
            </ul>
        </div>

        <div class="dropdown mb-2">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="subjectDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo isset($_GET['subject']) && $_GET['subject'] ? $_GET['subject'] : 'Subject'; ?>
            </button>
            <ul class="dropdown-menu" aria-labelledby="subjectDropdown">
                <li><a class="dropdown-item" href="?subject=Math<?php echo isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : ''; ?>">Math</a></li>
                <li><a class="dropdown-item" href="?subject=Science<?php echo isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : ''; ?>">Science</a></li>
                <li><a class="dropdown-item" href="?subject=English<?php echo isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : ''; ?>">English</a></li>
                <li><a class="dropdown-item" href="?subject=">All Subjects</a></li>
            </ul>
        </div>
    </div>
</form>


    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Search by Learners Name" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
        <div class="input-group-append">
            <input type="submit" class="btn btn-primary" value="Search">
        </div>
    </div>
</form>

<table class="table table-hover table-bordered table-striped">
    <thead>
    <tr>
            <th>ID</th>
            <th>Learners Name</th>
            <th>Section</th>
            <th>Grade</th>
            <th>School Level</th>
            <th>Region</th>
            <th>Division</th>
            <th>School ID</th>
            <th>School Year</th>
            <th>Gender</th>
            <th>Subject</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $school_level = isset($_GET['school_level']) ? $_GET['school_level'] : '';
        $school_year = isset($_GET['school_year']) ? $_GET['school_year'] : '';
        $grade = isset($_GET['grade']) ? $_GET['grade'] : '';
        $section = isset($_GET['section']) ? $_GET['section'] : '';
        $gender = isset($_GET['gender']) ? $_GET['gender'] : '';
        $subject = isset($_GET['subject']) ? $_GET['subject'] : '';

        $query = "SELECT * FROM students WHERE 1=1";

        if ($search) {
            $query .= " AND learners_name LIKE '%$search%'";
        }
        if ($school_level) {
            $query .= " AND school_level = '$school_level'";
        }
        if ($school_year) {
            $query .= " AND school_year = '$school_year'";
        }
        if ($grade) {
            $query .= " AND grade = '$grade'";
        }
        if ($section) {
            $query .= " AND section = '$section'";
        }
        if ($gender) {
            $query .= " AND gender = '$gender'";
        }
        if ($subject) {
            $query .= " AND subject = '$subject'";
        }

        $query .= " ORDER BY id DESC";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query failed: " . mysqli_error($connection));
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                 <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['learners_name']; ?></td>
                    <td><?php echo $row['section']; ?></td>
                    <td><?php echo $row['grade']; ?></td>
                    <td><?php echo $row['school_level']; ?></td>
                    <td><?php echo $row['region']; ?></td>
                    <td><?php echo $row['division']; ?></td>
                    <td><?php echo $row['school_id']; ?></td>
                    <td><?php echo $row['school_year']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['subject']; ?></td>
                    <td>
                        <a href="updatepage1.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a>
                        <a href="deletepage1.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirmDelete();">Delete</a>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>

<script>
function confirmDelete() {
    return confirm("Are you sure you want to delete this?");
}
</script>

<?php
if (isset($_GET['message'])) {
    echo "<h6>" . $_GET['message'] . "</h6>";
}

if (isset($_GET['insert_msg'])) {
    echo "<h6>" . $_GET['insert_msg'] . "</h6>";
}

if (isset($_GET['update_msg'])) {
    echo "<h6>" . $_GET['update_msg'] . "</h6>";
}

if (isset($_GET['delete_msg'])) {
    echo "<h6>" . $_GET['delete_msg'] . "</h6>";
}
?>

<form action="insert_data.php" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Students</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="learners_name">Learners Name</label>
                        <input type="text" name="learners_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="region">Region</label>
                        <input type="text" name="region" class="form-control">
                    </div>
            
                    <div class="form-group">
                        <label for="division">Division</label>
                        <input type="text" name="division" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="school_id">School ID</label>
                        <input type="text" name="school_id" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="school_year">School Year</label>
                        <input type="text" name="school_year" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="grade">Grade Level</label>
                        <select name="grade" id="grade" class="form-control" onchange="updateSchoolLevel()">
                            <option value="7th">7th</option>
                            <option value="8th">8th</option>
                            <option value="9th">9th</option>
                            <option value="10th">10th</option>
                            <option value="11th">11th</option>
                            <option value="12th">12th</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="school_level_display">School Level</label>
                        <select id="school_level_display" class="form-control" disabled>
                            <option value="SHS">SHS</option>
                            <option value="JHS">JHS</option>
                        </select>
                    </div>
                    <input type="hidden" name="school_level" id="school_level_hidden">
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" name="subject" class="form-control">
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="add_students" value="ADD">
                </div>
            </div>
        </div>
    </div>
</form>

<?php include ('footer.php'); ?>
