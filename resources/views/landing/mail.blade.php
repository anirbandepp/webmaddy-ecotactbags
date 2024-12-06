<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecotact Landing Page</title>
    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
    <table>
        <tr>
            <td>Utm Medium</td>
            <td>{{ $data['Utm_medium'] }}</td>
        </tr>
        <tr>
            <td>Name</td>
            <td>{{ $data['name'] }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{ $data['email'] }}</td>
        </tr>
        <tr>
            <td>Company</td>
            <td>{{ $data['companyName'] }}</td>
        </tr>
        <tr>
            <td>Products</td>
            <td>{{ $data['products'] }}</td>
        </tr>
        <tr>
            <td>Country</td>
            <td>{{ $data['country'] }}</td>
        </tr>
        <tr>
            <td>Message</td>
            <td>{{ $data['message'] }}</td>
        </tr>
    </table>
</body>
</html>