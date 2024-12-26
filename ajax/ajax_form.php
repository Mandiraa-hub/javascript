<?php
try{
    $connect = new mysqli('localhost','root','','db_pkmc_2079_sl');
    $selectquery = "select * from semesters";
    $result = $connect->query($selectquery);
    $semesters = [];
   if ($result->num_rows > 0) {
        while ($semester= $result->fetch_assoc()) {
            array_push($semesters,$semester);
        }
    }
   }catch(Exection $ex){
    die('Error:' . $ex->getMessage());
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropdown Ajax</title>
</head>
<body>
    <h1>AJAX</h1>
    <form action="">
        <label for="semester_id">Semester</label>
        <select name="semester_id" id="semester_id">
            <option value="">Select Semester</option>
            <?php foreach ($semesters as $key => $semester) { ?>
                <option value="<?php echo $semester['id'] ?>"><?php echo $semester['title'] ?></option>
            <?php } ?>
        </select>
        <br />
        <label for="subject_id">Subjects</label>
        <select name="subject_id" id="subject_id">
            <option value="">Select Subject</option>
        </select>
    </form>
    <script>
        let sembox = document.getElementById('semester_id');
        sembox.addEventListener('change',() => {
            let semid = sembox.value;
            let data = new FormData();
            data.append('semester_id',semid);
            let xhttp = new XMLHttpRequest();
            xhttp.open('POST','get_subject.php',true);
            xhttp.send(data);

            xhttp.onreadystatechange = function(){
                if (this.status == 200 && this.readyState == 4) {
                    document.getElementById('subject_id').innerHTML = this.responseText;
                }
            }
        });
    </script>
</body>
</html>
