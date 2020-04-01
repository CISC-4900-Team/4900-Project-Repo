<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="patient_lookup.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
    <script src="patient_lookup.js"></script>
    <title>Patient_Lookup</title>
</head>
<body>
<!-- navBar -->
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
             <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-nav-demo" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
            <a href="#" class="navbar-brand" ><i class="fas fa-prescription"></i>Equinox</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-nav-demo">
            <ul class="nav navbar-nav">
                <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
                <li><a href="#"><i class="fas fa-question-circle"></i>Help</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><i class="fas fa-user-plus"></i>New Patient</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <h4>Patient Lookup</h4>
    <table class = "table table-striped table bordered table-hover" id = "table_id">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Patient ID</th>
            </tr>
        </thead>
        <tfoot>
        <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Patient ID</th>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <td>Andy</td>
                <td>Henry</td>
                <td>23022607</td>
            </tr>
            <tr>
                <td>Andy</td>
                <td>Henry</td>
                <td>23022607</td>
            </tr>
        </tbody>
    </table>
</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
</html>