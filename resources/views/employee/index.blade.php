<!DOCTYPE html>
<html>
<head>
	<title>API Data Table</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}
		th, td {
			text-align: left;
			padding: 8px;
			border: 1px solid black;
		}
		th {
			background-color: #0c7dd4;
			color: white;
		}
		tr:nth-child(even) {
			background-color: #f2f2f2;
		}
	</style>
</head>
<body>
	<h1>Employee Data</h1>
	<table id="data-table">
		<thead>
			<tr>
				<th>Employee Number</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Extension</th>
				<th>Email</th>
				<th>Reporter</th>
			</tr>
		</thead>
		<tbody></tbody>
	</table>

	<script>
		$(document).ready(function() {
			$.ajax({
				url: "{{ route('employees') }}",
				type: "GET",
				dataType: "json",
				success: function(data) {
					$.each(data.data, function(i, user) {
						var row = "<tr>" +
							"<td>" + user.employeeNumber + "</td>" +
							"<td>" + user.firstName + "</td>" +
							"<td>" + user.lastName + "</td>" +
							"<td>" + user.extension + "</td>" +
							"<td>" + user.email + "</td>" +
							"<td>" + user.reportToFirstName +' '+user.reportToLastName + "</td>" +
						"</tr>";
						$("#data-table tbody").append(row);
					});
				},
				error: function(xhr, status, error) {
					alert("Something went wrong!");
				}
			});
		});
	</script>
</body>
</html>
