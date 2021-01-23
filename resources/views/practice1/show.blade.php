<!DOCTPE html>
<html>
<head>
<title>View Student Records</title>
</head>
<body>
<table border = "1">
<tr>
<td>Id</td>
<td>First Name</td>
<td>Last Name</td>
<td>Email</td>
</tr>
@foreach ($d as $user)
<tr>
<td>{{ $user->id }}</td>
<td>{{ $user->name }}</td>
<td>{{ $user->lastname }}</td>
<td>{{ $user->email }}</td>
</tr>
@endforeach
</table>
</body>
</html>